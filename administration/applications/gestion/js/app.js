$(document).ready(function() {
    $('.contenu').css('display', 'none');
    $('#btnPrecedent').css('display', 'none');
    $('#divAlerte').hide();
    $('#membres').hide();
    $('#nouveauMembre').hide();
    $("#alertBoxInscription").hide();

    $('.contenu').fadeIn(1000);
    $('#btnPrecedent').fadeIn(1000);
    $('body').toggleClass('bgColor');
});

var divAlerte = document.getElementById("divAlerte");
var divAlerteBtn = document.getElementById("closeBtn");
var btn = document.getElementById("submitButton");
var btnRemoveMembre = document.getElementById("removeButton");
var btnAfficherInscription = document.getElementById("h2InscrireMembre");
var btnAfficherMembres = document.getElementById("h2GererMembres");
var btnInscrire = document.getElementById("btnInscrire");

function getPathFromUrl(url) {
  return url.split("?")[0];
}

function reccupererProfil(){
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("GET", "profileSettings.php");
  
    // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
    requeteAjax.onload = function(){
      const resultat = JSON.parse(requeteAjax.responseText);
     
      const imgUrl = resultat[0].UtilisateurImgUrl;
      const description = resultat[0].UtilisateurDescription;
      
      imgUrlClean = getPathFromUrl(imgUrl);
      imgUrlClean += "?" + new Date().getTime();

      document.getElementById("imgProfil").src = imgUrlClean;
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
      reccupererProfil();
    }
  
    $('#divAlerte').show(1000);

    requeteAjax.send(data);
}
function inscrireMembre(){
  event.preventDefault();

  const nom = document.querySelector('#nomInscri');
  const username = document.querySelector('#usernameInscri');
  const password = document.querySelector('#password');
  const repassword = document.querySelector('#repassword');

  if(password.value != repassword.value){
    $("#alertBoxInscription").text("Les mots de passes ne correspondent pas");
    $("#alertBoxInscription").show(1000);
    return;
  }

  const data = new FormData();
  data.append('nom', nom.value);
  data.append('username', username.value);
  data.append('password', password.value);

  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open('POST', 'inscrire.php');

  requeteAjax.onload = function(){
    const resultat = JSON.parse(requeteAjax.responseText);
    if(resultat.status == "error"){
      $("#alertBoxInscription").text("Nom d'utilisateur deja existant");
      $("#alertBoxInscription").show(1000);
    } else if(resultat.status == "succes"){
      $("#alertBoxInscription").text("Inscription reussi");
      $("#alertBoxInscription").show(1000);
    }
  }

  requeteAjax.send(data);
}
function supprimerMembre(idMembre){
  event.preventDefault();

  const data = new FormData();
  data.append('ID', idMembre);

  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open('POST', 'supprimerMembre.php');

  requeteAjax.onload = function(){
    const resultat = JSON.parse(requeteAjax.responseText);
    if(resultat.status == "error"){
      alert("erreur")
    } else if(resultat.status == "succes"){
      alert("succes");
    }
  }

  requeteAjax.send(data);
}
function closeDivAlerte(){
    $('#divAlerte').hide(1000);
}
function afficherInscription(){
  $('#nouveauMembre').toggle(3000);
}
function afficherMembres(){
  $('#membres').toggle(3000);
}
btn.addEventListener("click",sauvegarder);
divAlerteBtn.addEventListener("click", closeDivAlerte);
btnAfficherInscription.addEventListener("click", afficherInscription);
btnAfficherMembres.addEventListener("click",afficherMembres);
btnInscrire.addEventListener("click", inscrireMembre);
btnRemoveMembre.addEventListener("click", supprimerMembre);
reccupererProfil();