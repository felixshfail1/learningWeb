<?php 
 include '../../fonctionnalites/isAuthenticate.php';
 $db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

//Savoir si utilisateur courant est Admin
$username = $_SESSION['username'];
$resultat = $db->query("SELECT UtilisateurAdmin FROM utilisateur WHERE UtilisateurUsername = '$username'");
$currentUser = $resultat->fetchAll();
$estAdmin = $currentUser[0]["UtilisateurAdmin"];

function getMembres(){
    global $db;
    $resultat = $db->query("SELECT UtilisateurNom, UtilisateurID, UtilisateurUsername FROM utilisateur");
    $membres = $resultat->fetchAll();

    for($i = 0; $i < count($membres); $i++){
        if($membres[$i]["UtilisateurUsername"] == $username){
            unset($membres[$i]);
        }
    }
    echo json_encode($membres);
}
?>