let elementi;

fetch('./visualizzaWishlist.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    }
})
    .then(response => response.json())
    .then(data => {
        elementi = data;
        console.log('Elementi ricevuti: ', data);
        let presentazione = `
        <div class="caricaWishlist">
            ${generaElementi(data)}
        </div>
        `;

        let presentazioneContainer = document.querySelector("#container-articoli-wishlist");
        presentazioneContainer.insertAdjacentHTML('beforeend', presentazione);

        // Aggiungi event listener ai pulsanti di rimozione
        document.querySelectorAll('.remove').forEach(function(button) {
            button.addEventListener('click', function() {
                var articoloId = this.getAttribute('data-id');
                var div = this.closest('.elementoWishlist');
                
                // Effettuare la richiesta AJAX per rimuovere l'articolo
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "remove_from_wishlist.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Rimuovere l'elemento dalla lista se la richiesta ha avuto successo
                            div.remove();
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    }
                };
                xhr.send("articolo_id=" + articoloId);
            });
        });
    })
    .catch((error) => {
        console.error('Errore: ', error);
    });

function generaElementi(elementi) {
    let wishlist = '';
    elementi.forEach(element => {
        let elementoWishlist = `
        <div class="elementoWishlist">
            <div class="immagine">
                <img src="${element.ImmagineArticolo}" class="img-elemento">
            </div>
            <div class="caratteristiche">
                <h2>${element.NomeArticolo}</h2>
                <p>Colore: <strong>${element.ColoreArticolo}</strong></p>
                <p>Prezzo: <strong>${element.PrezzoArticolo}€</strong></p>
                <button class="remove" data-id="${element.IDArticolo}">Rimuovi</button>
            </div>
        </div>
        `;

        wishlist += elementoWishlist;
    });

    return wishlist;
}
