//Barra ricerca
function apriBarraRicerca(event){
    const image= event.currentTarget;
    const barra_chiusa = document.querySelector('nav');
    const barra_aperta = document.querySelector('nav2');
    barra_chiusa.classList.add('hidden');
    barra_aperta.classList.remove('hidden');
}

const cerca= document.getElementById('logo-ricerca');
cerca.addEventListener('click', apriBarraRicerca);


function chiudiBarraRicerca(event){
    const image= event.currentTarget;
    const barra_chiusa = document.querySelector('nav');
    const barra_aperta = document.querySelector('nav2');
    barra_aperta.classList.add('hidden');
    barra_chiusa.classList.remove('hidden');
}

const chiudi= document.getElementById('exit');
chiudi.addEventListener('click', chiudiBarraRicerca);

// Apertura modale
function apriModale(event) {
    const image = event.currentTarget;
    let modChiusa = document.getElementById('modal-view');
    modChiusa.classList.remove('hidden');
    document.body.classList.add('no-scroll');
}

const imgAccount = document.getElementById('logo-account');
imgAccount.addEventListener('click', apriModale);



//Chiusura modale
function chiudiModale(event) {
    const image = event.currentTarget;
    let modAperta = document.getElementById('modal-view');
    modAperta.classList.add('hidden');
    document.body.classList.remove('no-scroll');
}

const exitModale = document.getElementById('modal-exit');
exitModale.addEventListener('click', chiudiModale);


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