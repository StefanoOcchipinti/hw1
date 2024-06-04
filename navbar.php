<!DOCTYPE html>

<body>

    <head>
        <link rel="stylesheet" href="navbar.css" />
        <script src="navbar.js" defer></script>
    </head>
    <div id="upper-bar">
        <h3 class="scrolling-text">SPEDIZIONE GRATUITA PER ORDINI > 50€</h3>
    </div>
    <div id="lower-bar">
        <a id="ita" href="*">ITA</a>
        <a id="eng" href="*">ENG</a>
        <a id="servizio-clienti" href="*">Servizio clienti</a>
        <img id="trustpilot" src="https://ninesquared.team/wp-content/uploads/2024/01/trustpilot-2.png" />
        <img id="fb-ig" src="Screenshot 2024-03-21 170338.png" />
    </div>

    <nav>
        <img id="logo-nav" src="https://ninesquared.team/wp-content/uploads/2023/02/ninesquared-logo-400.png" />
        <div class="tendina1">
            <h3 id="box1">Chi siamo</h3>
            <div class="contenuto-tendina1">
                <h4>Ninesquared</h4>
                <a href="*">La nostra storia</a><br />
                <a href="*">For the World</a><br />
                <a href="*">I progetti che sosteniamo</a>
            </div>
        </div>

        <div class="tendina2">
            <h3 id="box2">Shop</h3>
            <div class="contenuto-tendina2">
                <div class="t2">
                    <h4 href="*">Lifestyle</h4>
                    <a href="*">T-shirt</a><br />
                    <a href="*">T-shirt con grafiche</a><br />
                    <a href="*">Felpe</a><br />
                    <a href="*">Felpe con grafiche</a><br />
                    <a href="*">Pantaloncini</a><br />
                    <a href="*">Pantaloni</a><br />
                    <a href="*">Giacche</a>
                </div>
                <div class="t2">
                    <h4 href="*">Performance</h4>
                    <a href="*">T-shirt</a><br />
                    <a href="*">Polo</a><br />
                    <a href="*">Felpe</a><br />
                    <a href="*">Pantaloncini</a><br />
                    <a href="*">Pantaloni e leggins</a><br />
                </div>
                <div class="t2">
                    <h4 href="*">Accessori</h4>
                    <a href="*">Ginocchiere</a><br />
                    <a href="*">Gomitiere</a><br />
                    <a href="*">Manicotti</a><br />
                    <a href="*">Borse</a><br />
                    <a href="*">Calze</a><br />
                    <a href="*">Cappelli</a><br />
                    <a href="*">Borracce</a><br />
                    <a href="*">Tape</a><br />
                    <a href="*">Idee regalo</a>
                </div>
                <div class="t2">
                    <h4 href="*">Beach volley</h4>
                    <a href="*">Canottiere e top</a><br />
                    <a href="*">Short Slip e Culotte</a><br />
                    <a href="*">Apparel</a>
                </div>
            </div>
        </div>

        <h3 id="box3" href="*">Teamwear</h3>
        <img id="logo-ricerca" src="logo-ricerca.png">
        <img id="logo-account" src="Account-PNG-Image.png">
    </nav>

    <nav2 class="hidden">
        <input class="box-ricerca" type="text" placeholder="Cerca...">
        <img id="logo-ricerca2" src="logo-ricerca.png">
        <img id="exit" src="close.png">
    </nav2>



    <div id="modal-view" class="hidden">
        <form id="login" method="POST" action="">
            <img id="modal-exit" src="close.png">
            <h2>Accedi</h2>
            <label for="username">Nome utente*</label><br />
            <input class="box-text" type="text" name="username"><br />
            <label for="password">Password*</label><br />
            <input class="box-text" type="password" name="password"><br />
            <?php
            if (!empty($messaggio_credenziali)) {
                echo $messaggio_credenziali;
            }
            ?>
            <input type="submit" class="button-login" value="ACCEDI"><br />

            <p>Non sei ancora registrato? </p>
            <a href="registrazione.php" id="button-register">REGISTRATI ORA!</a>
        </form>

    </div>
</body>