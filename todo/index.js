function pageCreateTodo() {
    fetch('/todo/pages/create.php')
        .then(response => response.text())
        .then(html => {
            app.innerHTML = html;
        })
    let existScript = document.querySelector('.scriptPages');
    console.log(existScript);
    if(existScript === null) {
        const scripts = document.createElement('script');
        scripts.src = '/todo/pages/index.js';
        scripts.classList.add('scriptPages');
        app.appendChild(scripts);
    }
}

