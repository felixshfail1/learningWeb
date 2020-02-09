
var divAlerte = document.getElementById("divAlerte")
divAlerte.style.display = "none"

function upload(){

    console.log("Upload")
    var fileUpload = document.getElementById("file-upload")
    var message = ""

    if('files' in fileUpload){
        if(fileUpload.files.length == 0){
            message = "Selectionne bien un fichier"
        }
        else if (fileUpload.files.length > 1){
            message = "1 Fichier à la fois seulement"
        }
        else{
            var file = fileUpload.files[0]
            if ('name' in file) {
                message += "name: " + file.name + "\n<br>";
              }
              if ('size' in file) {
                message += "size: " + file.size + " bytes \n <br>";
              }
        }
    }
    else {
        if (x.value == "") {
          txt += "Select one or more files.";
        } else {
          txt += "The files property is not supported by your browser!";
          txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
        }
      }
    //var node = document.createElement("p");                 // Create a <li> node
    var textnode = document.createTextNode(message);         // Create a text node
    divAlerte.appendChild(textnode);                              // Append the text to <li>
    //divAlerte.appendChild(node);     // Append <li> to <ul> with id="myList"
    divAlerte.style.display = "block"
}