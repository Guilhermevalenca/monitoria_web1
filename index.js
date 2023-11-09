const app = document.querySelector('#app');

function pageTodo() {
    fetch('/todo/')
        .then(response => response.text())
        .then(html => {
            app.innerHTML = html;
        });
}
pageTodo();



const imports = document.createElement('script');

imports.src = '/todo/index.js';
app.appendChild(imports);


