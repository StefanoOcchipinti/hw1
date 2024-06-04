<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $connessione = mysqli_connect("localhost", "root", "", "hw1-db");

    if (!$connessione) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    // Recuperare l'ID dell'utente dal database
    $stmt = $connessione->prepare("SELECT ID FROM utenti WHERE NomeUtente = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($utente_id);
    $stmt->fetch();
    $stmt->close();

    if (!$utente_id) {
        die("Errore: utente non trovato.");
    }

    $articolo_id = $_POST['articolo_id'];

    // Aggiungere l'articolo alla wishlist
    $stmt = $connessione->prepare("INSERT INTO wishlist (user_id, article_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $utente_id, $articolo_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Articolo aggiunto con successo";
    } else {
        echo "Errore nell'aggiunta dell'articolo";
    }

    $stmt->close();
}

$connessione->close();
?>
