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