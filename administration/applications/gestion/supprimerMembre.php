<?php
 include '../../fonctionnalites/isAuthenticate.php';
 
 try
 {

 $db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $ID = $_POST['ID'];

    $sql = "DELETE FROM utilisateur WHERE UtilisateurID='$ID'";
    $db->exec($sql);
    echo json_encode(["status" => "succes", "message" => "Utilisateur supprime"]);
 }
 catch(PDOException $e)
    {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }