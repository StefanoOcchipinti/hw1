console.log('JavaScript caricato correttamente');

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('cambioPassword');
    const nuovaPassword = document.getElementById('nuovaPassword');
    const confermaPassword = document.getElementById('confermaPassword');
    const errorePasswordUguali = document.getElementById('errorePasswordUguali');
    const erroreCaratteristichePassword = document.getElementById('erroreCaratteristichePassword');

    function controlloPasswordUguali(event) {
        console.log('Controllo password uguali eseguito');
        console.log('Nuova Password:', nuovaPassword.value);
        console.log('Conferma Password:', confermaPassword.value);
        if (nuovaPassword.value !== confermaPassword.value) {
            errorePasswordUguali.textContent = 'Le password non corrispondono!';
            return false;
        } else {
            errorePasswordUguali.textContent = '';
            return true;
        }
    }

    function controlloCaratteristichePassword(event) {
        console.log('Controllo caratteristiche password eseguito');
        console.log('Nuova Password:', nuovaPassword.value);
        if (nuovaPassword.value.length < 10 || !/[!@#$%^&*(),.?":{}|<>]/.test(nuovaPassword.value) || !/\d/.test(nuovaPassword.value)) {
            erroreCaratteristichePassword.textContent = 'La password deve contenere almeno 10 caratteri, di cui almeno un carattere speciale (!@#$%^&*(),.?":{}|<>) e un numero!';
            return false;
        } else {
            erroreCaratteristichePassword.textContent = '';
            return true;
        }
    }

    form.addEventListener('submit', function(event) {
        const passwordUgualiValide = controlloPasswordUguali(event);
        const caratteristichePasswordValide = controlloCaratteristichePassword(event);

        if (passwordUgualiValide && caratteristichePasswordValide) {
            alert('Password cambiata correttamente!');
        } else {
            event.preventDefault();
        }
    });
});