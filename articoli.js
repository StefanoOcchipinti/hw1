console.log("Script aperto correttamente!!");

let elementi;

fetch('./visualizzaArticoli.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    credentials: 'same-origin'
})
    .then(response => response.json())
    .then(data => {
        elementi = data;
        console.log('Elementi ricevuti: ', data);
        let presentazione = `
        <h1>Ecco tutti gli articoli disponibili, dagli un occhio!</h1>
        <div class="caricaArticoli">
            ${generaElementi(data)}
        </div>
        `;

        let presentazioneContainer = document.querySelector("#container-articoli");
        presentazioneContainer.innerHTML = presentazione;

        // Aggiungere Event Listener dopo aver aggiunto elementi al DOM
        attachEventListeners();
    })
    .catch((error) => {
        console.error('Errore: ', error);
    });

function generaElementi(elementi) {
    let articoli = '';
    elementi.forEach(element => {
        let elementoArticoli = `
        <div class="elementoArticoli">
            <div class="immagine">
                <img src="${element.ImmagineArticolo}" class="img-elemento">
            </div>
            <div class="caratteristiche">
                <h2>${element.NomeArticolo}</h2>
                <p>Colore: <strong>${element.ColoreArticolo}</strong></p>
                <p>Prezzo: <strong>${element.PrezzoArticolo}€</strong></p>
                <button class="add-to-wish" data-id="${element.IDArticolo}"><img src="heart.png" alt=""></button>
                <button class="add-to-cart" data-id="${element.IDArticolo}"><img src="add-to-basket.png" alt=""></button>
            </div>
        </div>
        `;

        articoli += elementoArticoli;
    });

    return articoli;
}

function attachEventListeners() {
    document.querySelectorAll('.add-to-wish').forEach(function (button) {
        button.addEventListener('click', function () {
            var articoloId = this.getAttribute('data-id');
            var buttonImage = this.querySelector('img');
            var isAdded = buttonImage.src.includes('cuorePieno.png');

            var xhr = new XMLHttpRequest();
            var url = isAdded ? "remove_from_wishlist.php" : "add_to_wishlist.php";
            var successMessage = isAdded ? "Articolo rimosso dalla wishlist" : "Articolo aggiunto alla wishlist";
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Cambia l'immagine del pulsante cliccato
                    buttonImage.src = isAdded ? 'heart.png' : 'cuorePieno.png';
                    alert(successMessage);
                }
            };
            xhr.send("articolo_id=" + articoloId);
        });
    });
}
