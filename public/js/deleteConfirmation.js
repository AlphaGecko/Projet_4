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