$(document).ready(function() {
    $('#contenu').css('display', 'none');
    $('#contenu').fadeIn(1000);
    $('body').toggleClass('bgColor');
    
    $( "#filesHref" ).click(function() {
        event.preventDefault();
        newLocation = "./applications/upload/index.php"
        $('#contenu').fadeOut(1000, newpage);
    });

    $( "#messagesHref" ).click(function() {
        event.preventDefault();
        newLocation = "./applications/chat/index.php"
        $('#contenu').fadeOut(1000, newpage);
    });
    
    $( "#gestionHref" ).click(function() {
        event.preventDefault();
        newLocation =  "./applications/gestion/index.php"
        $('#contenu').fadeOut(1000, newpage);
    });
    
    function newpage() {
        window.location = newLocation;
    }

})