<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$connessione = mysqli_connect("localhost", "root", "", "hw1-db");

if (!$connessione) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$query = $connessione->prepare("SELECT a.IDArticolo, a.NomeArticolo, a.ColoreArticolo, a.PrezzoArticolo, a.ImmagineArticolo 
                                FROM wishlist w 
                                JOIN articoli a ON w.article_id = a.IDArticolo 
                                JOIN utenti u ON w.user_id = u.ID 
                                WHERE u.NomeUtente = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
    $data = [];
    while ($riga = $result->fetch_assoc()) {
        $temp = [];
        $temp['IDArticolo'] = $riga['IDArticolo'];
        $temp['NomeArticolo'] = $riga['NomeArticolo'];
        $temp['ColoreArticolo'] = $riga['ColoreArticolo'];
        $temp['PrezzoArticolo'] = $riga['PrezzoArticolo'];
        $temp['ImmagineArticolo'] = $riga['ImmagineArticolo'];
        array_push($data, $temp);
    }
    echo json_encode($data);
} else {
    echo json_encode([]);
}

$query->close();
$connessione->close();
?>
