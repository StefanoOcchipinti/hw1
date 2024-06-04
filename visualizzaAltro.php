<?php
$connessione = mysqli_connect("localhost", "root", "", "hw1-db");

if (!$connessione) {
    die("Connessione fallita: " . mysqli_connect_error());
}

$query = $connessione->prepare("SELECT * FROM articoli");
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
