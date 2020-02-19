<?php
    include './fonctionnalites/isAuthenticate.php';
    include './fonctionnalites/connectDB.php';

    
    if(array_key_exists("ID", $_GET)){
        $utilisateurID = $_GET['ID'];
    }
    else{
        header('Location: ./dashboard.php');
        exit;
    }
    

    $sql = "SELECT UtilisateurID , UtilisateurAdmin , UtilisateurNom , UtilisateurUsername , UtilisateurImgUrl , UtilisateurDescription FROM utilisateur WHERE UtilisateurID = '$utilisateurID'";
    $resultat = $db->query($sql);


    if( $resultat->fetchColumn()  < 1){
        header('Location: ./dashboard.php');
        exit;
    }
    $resultat = $db->query($sql);
    $utilisateur = $resultat->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <title><?php echo $utilisateur[0]['UtilisateurUsername']?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/profil.css">
</head>

<body>

    <div class="container">
       <?php include './fonctionnalites/showHeader.php' ?>

       <section class="contenu">
            <h2>Profil de <?php echo $utilisateur[0]['UtilisateurUsername'] ?></h2>
           
           <div id="profil">
                <br>
           
                <img id="imgProfil" src="<?php echo $utilisateur[0]['UtilisateurImgUrl']?>">
                <p> Nom : <?php echo ucfirst($utilisateur[0]['UtilisateurNom']) ?> </p>
                <p>Description</p>
                <textarea id="description" readonly ><?php echo $utilisateur[0]['UtilisateurDescription']?> </textarea>
                <br>
                <br>
               
           </div>
          

       </section>
    </div>
    <script src="./js/app.js"></script>
</body>   