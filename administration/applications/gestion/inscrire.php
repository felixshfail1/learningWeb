<?php
 include '../../fonctionnalites/isAuthenticate.php';
 $db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $nom = $_POST['nom'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //Verifier si l'utilsateur existe deja
    $sql = "SELECT UtilisateurUsername FROM utilisateur WHERE UtilisateurUsername = '$username'";
    $result = $db->prepare($sql);
    $result->execute();
    if($result->rowCount() > 0){
        echo json_encode(["status" => "error", "message" => "Utilisateur deja existant"]);
        return;
    }
    else{
        $sql = "INSERT INTO utilisateur (UtilisateurNom, UtilisateurUsername, UtilisateurPassword) VALUES ('$nom','$username','$password')";
        $req = $db->prepare($sql);
        $req->execute();
        echo json_encode(["status" => "succes", "message" => "Utilisateur créé"]);
    }


?>