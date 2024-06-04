<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$nome = $_SESSION['nome'];
$cognome = $_SESSION['cognome'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nuovaPassword']) && isset($_POST['confermaPassword'])) {
        $nuovaPassword = $_POST['nuovaPassword'];
        $confermaPassword = $_POST['confermaPassword'];

        if ($nuovaPassword === $confermaPassword) {

            $connessione = mysqli_connect("localhost", "root", "", "hw1-db");

            if (!$connessione) {
                die("Connessione fallita: " . mysqli_connect_error());
            }

            $query = "UPDATE utenti SET Password='$nuovaPassword' WHERE NomeUtente='$username'";
            mysqli_close($connessione);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dettagli Account - Ninesquared</title>
    <link rel="icon" href="ninesquared-icon-menu1-1.png" type="image/png">
    <link rel="stylesheet" href="dettagliAccount.css" />
    <script src="dettagliAccount.js?v=1" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <?php require_once 'navbarLogged.html'; ?>

    <div id="container">
        <div id="left-flex">
            <h3><strong>IL MIO ACCOUNT</strong></h3>
            <a href="hw1-Bacheca.php">Bacheca</a></br>
            <a href="*">Ordini</a></br>
            <a href="*">Indirizzi</a></br>
            <a href="*">Metodi di pagamento</a></br>
            <a href="dettagliAccount.php">Dettagli account</a></br>
            <a href="wishlist.php">Wishlist</a></br>
            <a href="homePage.php">Torna alla home</a>
        </div>
        <div id="dettagli">
            <div id="datiUtente">
                <div id="titolo">
                    <img src="Account-PNG-Image.png" id="imgAccount">
                    <h1>Dettagli account</h1>
                </div>
                <h3>Nome:</h3>
                <div class="dati"><?php echo htmlspecialchars($nome); ?></div>
                <h3>Cognome:</h3>
                <div class="dati"><?php echo htmlspecialchars($cognome); ?></div>
                <h3>Email:</h3>
                <div class="dati"><?php echo htmlspecialchars($email); ?></div>
                <h3>Username:</h3>
                <div class="dati"><?php echo htmlspecialchars($username); ?></div>
            </div>

            <form id="cambioPassword" method="POST" action="">
                <h2>MODIFICA PASSWORD</h2>
                <p>Qui puoi cambiare la tua password, lascia i campi in bianco se non hai bisogno di cambiare password.</p>
                <div class="password-container">
                    <label for="nuovaPassword">Nuova Password:</label>
                    <input type="password" id="nuovaPassword" name="nuovaPassword" class="password-input" placeholder="Inserisci la nuova password...">
                </div>
                <div class="password-container">
                    <label for="confermaPassword">Conferma Password:</label>
                    <input type="password" id="confermaPassword" name="confermaPassword" class="password-input" placeholder="Conferma la nuova password...">
                </div>
                <div id="errorePasswordUguali"></div>
                <div id="erroreCaratteristichePassword"></div>
                <button type="submit" class="submit-button">Cambia Password</button>
            </form>

        </div>
    </div>

    <?php require_once 'footer.php'; ?>

</body>

</html>