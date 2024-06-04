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