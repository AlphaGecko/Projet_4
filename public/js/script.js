// loading screen 

window.onload = function(){ 
    $('#main').css({'opacity': 1});
    $('#loader').css({'opacity': 0});
};


// front espace administrateur

const addButton = $('#add_button');
const listButton = $('#list_button');

const addContainer = $('#add_container'); 
const listContainer = $('#list_container');

addButton.click(function() { 
    addContainer.css({'z-index': 100, 'position' : 'relative'});
    addContainer.fadeIn(1000);

    listContainer.css({ 'display' : 'none', 'z-index': 0, 'position' : 'absolute'});
});

listButton.click(function() { 
    listContainer.css({'z-index': 100, 'position' : 'relative'});
    listContainer.fadeIn(1000);

    addContainer.css({'display' : 'none', 'z-index': 0, 'position' : 'absolute'});
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




