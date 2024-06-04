<!DOCTYPE html>
<html>

<head>
    <title>Wishlist - Ninesquared</title>
    <link rel="icon" href="ninesquared-icon-menu1-1.png" type="image/png">
    <link rel="stylesheet" href="wishlist.css" />
    <script src="wishlist.js?v=1" defer></script>
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
        <div id="container-articoli-wishlist">
            <h1>La tua wishlist:</h1>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>

</body>

</html>