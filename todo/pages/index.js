const form = document.querySelector('#formCreate');
form.addEventListener('submit', event => {
    event.preventDefault();

    const title = form.querySelector('#title').value;
    const description = form.querySelector('#description').value;

    const data = new FormData();
    data.append('title', title);
    data.append('description', description);

    fetch('/todo/actions.php', {
        method: 'POST',
        body: data
    })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                pageTodo();
            }
        });
});