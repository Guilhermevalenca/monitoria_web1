function execute() {
    const div = document.querySelector('#showMessage');
    const h1 = document.createElement('h1');
    h1.textContent = 'Seja bem vindo a nossa pagina';

    div.appendChild(h1);

    const buttonExecute = document.querySelector('#buttonExecute');
    buttonExecute.remove();
}

function getList() {
    fetch('')
}