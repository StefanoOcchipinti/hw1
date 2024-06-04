<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: homePage.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connessione = mysqli_connect("localhost", "root", "", "hw1-db");

    if (!$connessione) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($connessione, $_POST['username']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    $query = "SELECT * FROM utenti WHERE NomeUtente='$username' AND Password='$password'";
    $risultato = mysqli_query($connessione, $query);

    if (mysqli_num_rows($risultato) > 0) {
        $utente = mysqli_fetch_assoc($risultato);
        $_SESSION['id'] = $utente['ID'];
        $_SESSION['nome'] = $utente['Nome'];
        $_SESSION['cognome'] = $utente['Cognome'];
        $_SESSION['username'] = $utente['NomeUtente'];
        $_SESSION['email'] = $utente['Email'];

        header('Location: homePage.php');
        exit;
    } else {
        $messaggio_credenziali = 'Credenziali non valide.';
    }

    mysqli_close($connessione);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">
    <link rel="icon" href="ninesquared-icon-menu1-1.png" type="image/png">
    <title>Ninesquared</title>
    <link rel="stylesheet" href="hw1-xampp.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <?php require 'navbar.php'; ?>

    <header>
        <div class="header-content">
            <h1 id="header-text"><strong>The new volleyball standard</strong></h1>
            <button class="pulsante-header" type="button">
                <h4>SCOPRI LA COLLEZIONE</h4>
            </button>
        </div>
        <img id="img-header" src="home-2023-11.jpg">
    </header>

    <section>
        <div class="Manicotti">
            <h1><strong>Manicotti</strong></h1>
            <div class="pulsante-manicotti">
                <h4>SCOPRI</h4>
            </div>
        </div>
        <div class="Ginocchiere">
            <h1><strong>Ginocchiere</strong></h1>
            <div class="pulsante-ginocchiere">
                <h4>SCOPRI</h4>
            </div>
        </div>
    </section>

    <article>
        <div class="art1">
            <img class="img-art" src="ninesquared-slide-black-fr-M.jpg">
            <h2>Nine | Felpa girocollo | Slide</h2>
            <h4>Nero</h4>
            <h3>45,00€</h3>
        </div>
        <div class="art2">
            <img class="img-art" src="ninesquared-ace-U-01-black.jpg">
            <h2>Nine | Manicotti – BigNine 1</h2>
            <h4>Nero</h4>
            <h3>25,00€</h3>
        </div>
        <div class="art3">
            <img class="img-art" src="ninesquared-presser2-red-fr-M.jpg">
            <h2>Nine | Polo | Presser 2</h2>
            <h4>Rosso</h4>
            <h3>35,00€</h3>
        </div>
        <div class="art4">
            <img class="img-art" src="ninesquared-velo-pants-blue-navy-fr-U.jpg">
            <h2>Nine | Pantaloni | Velo</h2>
            <h4>Blu Navy</h4>
            <h3>49,00€</h3>
        </div>
        <div class="art5">
            <img class="img-art" src="ninesquared-quick2-red-fr-U.jpg">
            <h2>Nine | Pantaloncini | Quick 2</h2>
            <h4>Rosso</h4>
            <h3>19,00€</h3>
        </div>
        <div class="art6">
            <img class="img-art" src="ninesquared-shield-black-fr-U.jpg">
            <h2>Nine | Ginocchiere | Shield</h2>
            <h4>Nero</h4>
            <h3>15,00€</h3>
        </div>
    </article>

    <div id="container-articoli"></div>

    <div id="mostraAltro">
        <img src="down-arrow.png" alt="" id="viewMore">
        <h3>Vedi altri articoli...</h3>
    </div>

    <section2>
        <div id="sec-sx">
            <h1><strong>Teamwear</strong></h1>
            <button type="button" class="pulsante-teamwear">
                <h4>SCOPRI</h4>
            </button>
        </div>
        <div id="sec-dx">
            <img id="teamwear-img" src="banner-teamwear-img-560x350.png">
        </div>
    </section2>

    <div id="APIcontainer">
        <!--API Youtube-->
        <div id="player"></div>

        <!--API Spotify-->
        <div class="container-APISpotify">
            <form action="" id="form-spotify">
                <h2>Scopri nuova musica da ascoltare durante i tuoi allenamenti!</h2>
                <input type="hidden" id='hidden_token'>

                <label for="Genre">Scegli il genere:</label>
                <select name="" id="select_genre">
                    <option>Scegli...</option>
                </select>

                <label for="Genre">Scegli la playlists:</label>
                <select name="" id="select_playlist">
                    <option>Scegli...</option>
                </select>

                <button type="submit" id="btn_submit">Cerca</button>
            </form>
            <div class="risultato">
                <div class="song-list"></div>
                <div id="song-detail"></div>
            </div>
        </div>
        <!--Fine API-->
    </div>

    <?php require_once 'footer.php'; ?>
    <script src="hw1-xampp.js" defer></script>
</body>

</html>