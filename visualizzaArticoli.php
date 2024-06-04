<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
$connessione = new mysqli("localhost", "root", "", "hw1-db");

if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}

$query = $connessione->prepare("SELECT * FROM articoli");
$query->execute();
$result = $query->get_result();

$data = [];

if ($result->num_rows > 0) {
    while ($riga = $result->fetch_assoc()) {
        $data[] = [
            'IDArticolo' => $riga['IDArticolo'],
            'NomeArticolo' => $riga['NomeArticolo'],
            'ColoreArticolo' => $riga['ColoreArticolo'],
            'PrezzoArticolo' => $riga['PrezzoArticolo'],
            'ImmagineArticolo' => $riga['ImmagineArticolo']
        ];
    }
}

echo json_encode($data);

$query->close();
$connessione->close();
?>
