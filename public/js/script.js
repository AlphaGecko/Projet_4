// loading screen 


// front espace administrateur

const addButton = $('#add_button');
const listButton = $('#list_button');

const addContainer = $('#add_container'); 
const listContainer = $('#list_container');

addButton.click(function() { 
    addContainer.css({ 'opacity': 1, 'z-index': 100, 'position' : 'relative', 'visibility' : 'visible' });
    listContainer.css({ 'opacity': 0, 'z-index': 0, 'position' : 'absolute', 'visibility' : 'hidden' });
});

listButton.click(function() { 
    addContainer.css({ 'opacity': 0, 'z-index': 0, 'position' : 'absolute', 'visibility' : 'hidden' });
    listContainer.css({ 'opacity': 1, 'z-index': 100, 'position' : 'relative', 'visibility' : 'visible' });
});

// Confirmation d'un effacement par l'admin

const deleteButton = $('.delete_button');
const deleteComment = $('.delete_comment')

deleteButton.click(function() {
    let deleteValidation = confirm('Êtes vous sûr de vouloir supprimer le billet ? Cette action est irréversible.');
    if (deleteValidation === false) {
        event.preventDefault();
    }
});

deleteComment.click(function() {
    let deleteCommentValidation = confirm('Êtes vous sûr de vouloir supprimer ce commentaire ? Cette action est irréversible.');
    if (deleteCommentValidation === false) {
        event.preventDefault();
    }
});

// Gestion du nombre max de caractères d'un commentaire utilisateur 









