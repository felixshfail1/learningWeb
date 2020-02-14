$(document).ready(function() {
  $('.wrapper').css('display', 'none');
  $('#btnPrecedent').css('display', 'none');

  $('.wrapper').fadeIn(1000);
  $('#btnPrecedent').fadeIn(1000);
  $('body').toggleClass('bgColor');

  var input = $('#fileUpload');
  input.replaceWith(input.val('').clone(true));
})

function upload(){
    $("#uploadForm").submit();
}

closeButton = document.getElementById("closeBtn");
closeButton.onclick = function(){
  this.parentNode.style.display = 'none';
  var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
  window.history.pushState({path:newurl},'',newurl);
}