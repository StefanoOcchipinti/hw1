document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const usernameInput = document.getElementById('username');
    const usernameMessage = document.getElementById('username-message');
    const password = document.getElementById('password');
    const erroreCaratteristichePassword = document.getElementById('erroreCaratteristichePassword');

    function controlloCaratteristichePassword() {
        if (password.value.length < 10 || !/[!@#$%^&*(),.?":{}|<>]/.test(password.value) || !/\d/.test(password.value)) {
            erroreCaratteristichePassword.textContent = 'La password deve contenere almeno 10 caratteri, di cui almeno un carattere speciale (!@#$%^&*(),.?":{}|<>) e un numero!';
            return false;
        } else {
            erroreCaratteristichePassword.textContent = '';
            return true;
        }
    }

    usernameInput.addEventListener('input', async function () {
        const username = usernameInput.value;

        if (username.length > 0) {
            const response = await fetch('checkUsername.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'username=' + encodeURIComponent(username)
            });

            const data = await response.json();

            if (data.status === 'error') {
                usernameMessage.textContent = data.message;
                usernameMessage.style.color = 'red';
            } else {
                usernameMessage.textContent = data.message;
                usernameMessage.style.color = 'green';
            }
        } else {
            usernameMessage.textContent = '';
        }
    });

    form.addEventListener('submit', function(event) {
        const caratteristichePasswordValide = controlloCaratteristichePassword();

        if (!caratteristichePasswordValide) {
            event.preventDefault();
        }else{
            alert("Registrazione avvenuta con successo! Accedi al tuo account per iniziare la tua esperienza!");
        }
    });
});
