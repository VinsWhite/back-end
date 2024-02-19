const urlApi = 'http://localhost/back-end/S3L4/wordpress/wp-json/wp/v2/';
const accessToken = 'apiKey111';

if (document.location.pathname == '/index.html') {
    // Eseguiamo il get per prelevare i posts con una chiamata ajax
    fetch(urlApi + 'posts')
        .then(response => response.json())
        .then(json => createPosts(json))
}

/* document.addEventListener('DOMContentLoaded', function() {
    if (document.location.pathname == '/register.html') {
    // Funzione per registrare un nuovo utente
    let registerUser = (userData) => {
        let createUserUrl = `${urlApi}users`;

        // Esegui la richiesta AJAX POST per creare un nuovo utente
        fetch(urlApi, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData) // Converti l'oggetto userData in formato JSON e lo invii come corpo della richiesta
        })
        .then(response => {
            if (response.ok) {
                // Utente creato con successo
                console.log('Utente creato con successo');
                // Effettua altre azioni, come reindirizzare l'utente a una pagina di conferma o eseguire altre operazioni
            } else {
                // Gestisci eventuali errori
                console.error('Errore durante la creazione dell\'utente');
            }
        })
        .catch(error => {
            console.error('Errore durante la richiesta AJAX POST:', error);
        });
    }

    // Evento di invio del form di registrazione
    document.querySelector('#registerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evita il comportamento di default del form

        // Recupera i dati dal form di registrazione
        let formData = {
            username: `${document.querySelector('#exampleInputName').value} ${document.querySelector('#exampleInputSurName').value}`,
            email: document.querySelector('#exampleInputEmail1').value,
            password: document.querySelector('#exampleInputPassword1').value
        };

        // Registra il nuovo utente utilizzando i dati del form
        registerUser(formData);
    });
}
}); */




// Funzione per la creazione dei posts
let createPosts = (posts) => {
    console.log(posts); //visualizziamo in console i posts

    // Creazione dei post dinamicamente 
    posts.forEach(post => {
        // Creazione della main card
        let card = document.createElement('div');
        card.className = 'card my-4';

        // Creazione dell'header
        let cardHeader = document.createElement('div');
        cardHeader.className = "card-header";
        cardHeader.innerText = '';

        // Creazione del corpo della card 
        let cardBody = document.createElement('div');
        cardBody.className = "card-body";

        // Creazione del titolo da inserire nell'header
        let title = document.createElement('h5');
        title.className = "card-title";
        title.innerText = post.title.rendered;

        // Creazione del testo da inserire nel body della card
        let excerpt = document.createElement('div');
        excerpt.className = "card-text";
        excerpt.innerHTML = post.excerpt.rendered;
        
        // Creazione del contenitore delle due icone per modificare e aggiornare 
        let divIcons = document.createElement('div');
        divIcons.className = 'd-flex justify-content-end';

        // Creazione dell'icona per l'eliminazione 
        let iconDelete = document.createElement('i');
        iconDelete.className = "fas fa-trash-alt ms-2";
        iconDelete.setAttribute('data-post-id', post.id); // Assegna l'ID del post come attributo personalizzato

        // Creazione dell'icona per l'aggiornamento
        let iconUpdate = document.createElement('i');
        iconUpdate.className = 'fa fa-pen ms-2';

        // Eseguiamo le operazioni per appendere gli elementi
        cardHeader.appendChild(title);
        cardBody.appendChild(excerpt);
        divIcons.appendChild(iconUpdate);
        divIcons.appendChild(iconDelete);
        cardBody.appendChild(divIcons);

        card.appendChild(cardHeader);
        card.appendChild(cardBody);

        // Infine appendiamo la card principale alla classe da noi scelta per la visualizzazione dei post
        document.querySelector('.container.posts').appendChild(card);

        iconDelete.addEventListener('click', deletePost);
    });
}


// Funzione per eliminare i posts
let deletePost = (event) => {
    // Recupera l'ID del post dall'attributo data-post-id dell'elemento iconDelete cliccato
    let postId = event.target.getAttribute('data-post-id');

    // Costruisci l'URL API per eliminare il post
    let deleteUrl = `${urlApi}posts/${postId}`;

    // Esegui la richiesta AJAX DELETE
    fetch(deleteUrl, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            // Aggiungi eventuali header necessari, come ad esempio autorizzazione, ecc.
        }
    })
    .then(response => {
        if (response.ok) {
            // Rimuovi la card del post eliminato dalla visualizzazione
            let card = event.target.closest('.card');
            card.remove();
        } else {
            // Gestisci eventuali errori
            console.error('Errore durante l\'eliminazione del post');
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta AJAX DELETE:', error);
    });
}
