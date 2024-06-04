<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connessione = mysqli_connect("localhost", "root", "", "hw1-db");

    if (!$connessione) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    $nome = mysqli_real_escape_string($connessione, $_POST["nome"]);
    $cognome = mysqli_real_escape_string($connessione, $_POST["cognome"]);
    $email = mysqli_real_escape_string($connessione, $_POST["email"]);
    $username = mysqli_real_escape_string($connessione, $_POST["username"]);
    $password = mysqli_real_escape_string($connessione, $_POST["password"]);

    $query = "INSERT INTO utenti (NomeUtente, Password, Nome, Cognome, Email) VALUES ('$username', '$password', '$nome', '$cognome', '$email')";

    if ($connessione->query($query) === true) {
        header("Location: index.php");
        exit;
    } else {
        echo "Errore nella registrazione: " . $connessione->error;
    }

    $connessione->close();
}
?>


<!DOCTYPE html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="registrazione.css" />
    <script src="registrazione.js?v=1" defer></script>
    <title>Registrazione - Ninesquared</title>
    <link rel="icon" href="ninesquared-icon-menu1-1.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <a href="index.php" id="btn-home">
        <div>
            <h2>Torna alla home</h2>
        </div>
    </a>
    <div class="registration-form">
        <h2>ENTRA A FAR PARTE DELLA FAMIGLIA NINESQUARED!</h2>
        <form action="" method="POST" id="registration-form">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Inserisci il tuo nome...">

            <label for="cognome">Cognome</label>
            <input type="text" id="cognome" name="cognome" placeholder="Inserisci il tuo cognome..." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Inserisci la tua email..." required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Scegli il tuo username..." required>
            <div id="username-message"></div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Scegli la tua password..." required>
            <div id="erroreCaratteristichePassword"></div>

            <button type="submit">Registrati</button>
        </form>
    </div>
</body>