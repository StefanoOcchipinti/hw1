<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $connessione = new mysqli("localhost", "root", "", "hw1-db");

    if ($connessione->connect_error) {
        die("Connessione fallita: " . $connessione->connect_error);
    }

    // Recuperare l'ID dell'utente dal database
    $stmt = $connessione->prepare("SELECT ID FROM utenti WHERE NomeUtente = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($utente_id);
    $stmt->fetch();
    $stmt->close();

    if (!$utente_id) {
        echo json_encode(['success' => false, 'message' => 'Errore: utente non trovato.']);
        exit;
    }

    $articolo_id = $_POST['articolo_id'];

    // Rimuovere l'articolo dalla wishlist
    $stmt = $connessione->prepare("DELETE FROM wishlist WHERE user_id = ? AND article_id = ?");
    $stmt->bind_param("ii", $utente_id, $articolo_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Articolo rimosso con successo']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Errore nella rimozione dell\'articolo']);
    }

    $stmt->close();
    $connessione->close();
}

?>
