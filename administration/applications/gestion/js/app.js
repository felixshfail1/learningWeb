$(document).ready(function() {
    $('.contenu').css('display', 'none');
    $('#btnPrecedent').css('display', 'none');
    $('#divAlerte').hide();

    $('.contenu').fadeIn(1000);
    $('#btnPrecedent').fadeIn(1000);
    $('body').toggleClass('bgColor');
});

var divAlerte = document.getElementById("divAlerte");
var divAlerteBtn = document.getElementById("closeBtn");
var btn = document.getElementById("submitButton");



function reccupererProfil(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "profileSettings.php");
  
    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    requeteAjax.onload = function(){
      const resultat = JSON.parse(requeteAjax.responseText);
     
      const imgUrl = resultat[0].UtilisateurImgUrl;
      const description = resultat[0].UtilisateurDescription;
      
      document.getElementById("imgProfil").remove();
      var node = document.createElement("img");
      node.id = "imgProfil";
      node.src = imgUrl;
      document.getElementById("formulaire").insertAdjacentElement('afterbegin', node);
    

      document.getElementById("imgUrl").value = imgUrl;
      document.getElementById("description").value = description;
      
    }

    requeteAjax.send();
}
function sauvegarder(){
    event.preventDefault();

    
    // 2. Elle doit récupérer les données du formulaire
    const description = document.querySelector('#description');
    const imgUrl = document.querySelector('#imgUrl');
  
    // 3. Elle doit conditionner les données
    const data = new FormData();
    data.append('description', description.value);
    data.append('imgUrl', imgUrl.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'profileSettings.php?task=sauvegarder');
    
    requeteAjax.onload = function(){
      content.value = '';
      content.focus();
      reccupererProfil();
    }
  
    $('#divAlerte').show(1000);

    requeteAjax.send(data);
}

function closeDivAlerte(){
    $('#divAlerte').hide(1000);
}

btn.addEventListener("click",sauvegarder);
divAlerteBtn.addEventListener("click", closeDivAlerte);

reccupererProfil();