<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connessione = mysqli_connect("localhost", "root", "", "hw1-db");

    $username = mysqli_real_escape_string($connessione, $_POST["username"]);
    
    $query = "SELECT * FROM utenti WHERE NomeUtente='$username'";
    $risultato = mysqli_query($connessione, $query);

    if (mysqli_num_rows($risultato) > 0) {
        echo json_encode(["status" => "error", "message" => "Il nome utente è già in uso."]);
    } else {
        echo json_encode(["status" => "success", "message" => "Il nome utente è disponibile."]);
    }

    $connessione->close();
}
?>
