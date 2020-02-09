<?php

    session_start();

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom', 'root', '');
        $sql = "SELECT * FROM utilisateur WHERE utilisateurUsername = '$username'";
        $result = $db->prepare($sql);
        $result->execute();

        if($result->rowCount() > 0)
        {
            $data = $result->fetchAll();
            if(password_verify($_POST['password'], $data[0]["UtilisateurPassword"]))
            {
                echo "Connecte";
                $_SESSION['username'] = $username;
                header("Location: ../dashboard.php");
                exit;
            }
            else //Mauvais mot de passe
            {
                header("Location: ../index.php?error=true");
                exit;
            }
        }
        else //Mauvais nom utilisateur
        {
            header("Location: ../index.php?error=true");
            exit;
            //Cree un enregistrement
            //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //$sql = "INSERT INTO utilisateur (UtilisateurNom, UtilisateurUsername, UtilisateurPassword) VALUES ('test','$username','$password')";
            //$req = $db->prepare($sql);
            //$req->execute();
            //echo "Fait";
        }
    }

?>