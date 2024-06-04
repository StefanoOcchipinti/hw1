//Bottone newsletter
function messaggioNewsletter(event){
    const bottone = event.currentTarget;
    let nuovoMessaggio = document.createElement('h5');
    nuovoMessaggio.textContent = 'Richiesta inviata!';
    let container = document.getElementById('dx-cf');
    container.appendChild(nuovoMessaggio);
    bottone.removeEventListener('click', messaggioNewsletter);
}

const bottoneNewsletter = document.getElementById('bottone-invia');
bottoneNewsletter.addEventListener('click', messaggioNewsletter);