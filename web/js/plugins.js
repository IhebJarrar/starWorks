$('.chips').material_chip();

$('.chips-placeholder').material_chip({
    placeholder: 'Add Email',
    secondaryPlaceholder: '+Tag your Team ',
});


//chips.add is a methode provided by the plugin  ya binome this check http://materializecss.com/chips.html

$('.chips').on('chip.add', function(e, chip){

     console.log("chips added !");

     //we can test here if the input is an email by using regular expressions or we test it in the backend .


});

    // we can  send the tags with ajax