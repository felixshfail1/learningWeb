var filesHref = document.querySelector('#filesHref')
var messagesHref = document.querySelector('#messagesHref')
var gestionHref = document.querySelector('#gestionHref')

filesHref.addEventListener('click', function() {
    location.href = "./applications/upload/index.php"
})

messagesHref.addEventListener('click', function() {
    location.href = "./applications/chat/index.html"
})

gestionHref.addEventListener('click', function() {
    location.href = "./applications/gestion/index.html"
})