<?php 

 include '../../fonctionnalites/isAuthenticate.php';

$db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
$task = "list";

if(array_key_exists("task", $_GET)){
  $task = $_GET['task'];
}

if($task == "sauvegarder"){
  sauvegarderProfil();
} else {
  recupererProfil();
}

function sauvegarderProfil(){
       //Varibles utilise
       global $db;
       $username = $_SESSION['username'];
       $imgUrl = $_POST['imgUrl'];
       $description = $_POST['description'];

       $sql = "UPDATE utilisateur SET UtilisateurImgUrl=?, UtilisateurDescription=? WHERE UtilisateurUsername = '$username'";
       $requete = $db->prepare($sql);
       $requete->execute([$imgUrl, $description]);

       echo json_encode(["status" => "success"]);
}

function recupererProfil(){
       //Varibles utilise
       global $db;
       $username = $_SESSION['username'];
       $resultat = $db->query("SELECT UtilisateurImgUrl , UtilisateurDescription  FROM utilisateur WHERE UtilisateurUsername = '$username'");
       $currentUser = $resultat->fetchAll();
       
       echo json_encode($currentUser);
}


?>

