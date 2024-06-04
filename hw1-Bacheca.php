<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">
        <title>Bacheca - Ninesquared</title>
        <link rel="icon" href="ninesquared-icon-menu1-1.png" type="image/png">
        <link rel="stylesheet" href="hw1-Bacheca.css"/>
        <script src="hw1-Bacheca.js" defer></script>
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
            <div id="right-flex">
                <h1>BACHECA</h1>
                <h2>Benvenuto, <?php echo htmlspecialchars($username); ?>!</h2>
                <p>Dalla bacheca del tuo account puoi visualizzare i tuoi ordini recenti, gestire i tuoi indirizzi di spedizione e fatturazione e modificare la password e i dettagli dell'account.</p>
                <div class="buttons">
                    <div id="up-btns">
                        <a href="*" class="left-btn">
                            <img src="package.png" class="img-btn">
                            <h3>ORDINI</h3>
                        </a>
                        <a href="*" class="cntr-btn">
                            <img src="download.png" class="img-btn" alt="">
                            <h3>DOWNLOAD</h3>
                        </a>
                        <a href="*" class="rght-btn">
                            <img src="location.png" class="img-btn" alt="">
                            <h3>INDIRIZZI</h3>
                        </a>
                    </div>
                    <div id="low-btns">
                        <a href="dettagliAccount.php" class="left-btn">
                            <img src="Account-PNG-Image.png" class="img-btn" alt="">
                            <h3>DETTAGLI ACCOUNT</h3>
                        </a>
                        <a href="wishlist.php" class="cntr-btn">
                            <img src="heart.png" class="img-btn" alt="">
                            <h3>WISHLIST</h3>
                        </a>
                        <a href="logout.php" class="rght-btn">
                            <img src="logout.png" class="img-btn" alt="">
                            <h3>LOGOUT</h3>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>

        <?php require_once 'footer.php'; ?>

    </body>
</html>