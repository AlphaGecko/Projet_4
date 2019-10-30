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

const deleteButton = $('.delete_button');

deleteButton.click(function() {
    let deleteValidation = confirm('Êtes vous sûr de vouloir supprimer le billet ?');
    if (deleteValidation === false) {
        event.preventDefault();
    }
});