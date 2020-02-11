$(document).ready(function() {
    $('.contenu').css('display', 'none');
    $('#btnPrecedent').css('display', 'none');

    $('.contenu').fadeIn(1000);
    $('#btnPrecedent').fadeIn(1000);
    $('body').toggleClass('bgColor');
});