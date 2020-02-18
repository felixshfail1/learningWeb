<?php 
       include '../../fonctionnalites/isAuthenticate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <title>Felix Noiseux | Gestion</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <div class="container">
       <?php include '../../fonctionnalites/showHeader.php' ?>

       <section class="contenu">
            <h2>Profil</h2>
           
           <div id="profil">
               <br>
               <div class="alert alert-warning alert-dismissible fade show" role="alert" id="divAlerte">
                    Profil sauvegardé !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closeBtn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" id="formulaire">
                    <img id="imgProfil">
                    <br><br>
                    <input type="text" id="imgUrl" name="imgUrl">
                    <br>
                    <p>Description</p>
                    <textarea id="description" name="description"> </textarea>
                    <br><br>
                    <button type="submit" id="submitButton">Sauvegarder</button>
                    <br><br>
                </form>
           </div>
           <h2 id="h2GererMembres">Gérer membres</h2>

           <div id="membres">
           <?php 
            $db = new PDO('mysql:host=localhost;dbname=felixnoiseuxcom;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

            //Savoir si utilisateur courant est Admin
            $username = $_SESSION['username'];
            $resultat = $db->query("SELECT * FROM utilisateur WHERE UtilisateurUsername = '$username'");
            $currentUser = $resultat->fetchAll();
            $estAdmin = $currentUser[0]["UtilisateurAdmin"];

            //Requete et Affichage membres
            $resultat = $db->query("SELECT * FROM utilisateur");
            $membres = $resultat->fetchAll();

            for($i = 0; $i < count($membres); $i++){
                if($membres[$i]["UtilisateurUsername"] == $username){
                    continue;
                }
                ?>
                <div id="membre">
                    <span>Nom utilisateur : </span>
                    <input type="hidden" id="id" value="<?php echo $membres[$i]["UtilisateurID"] ?>"/>
                    <?php 
                        echo $membres[$i]["UtilisateurNom"];
                    ?>
                    <span>Nom connection : </span>
                    <?php 
                        echo $membres[$i]["UtilisateurUsername"];
                    ?>
                    
                    <?php if($estAdmin == 1){ ?>
                        <input type="button" value="Supprimer"/>
                    <?php } ?>
                </div>
                <?php 
            }
       
            //var_dump($membres);
           ?>
           </div>
           <h2 id="h2InscrireMembre">Inscrire membre</h2>
           <div id="nouveauMembre">
               <br>
                <form method="POST">
                    <div class="alert alert-warning" role="alert" id="alertBoxInscription">
                        This is a warning alert—check it out!
                    </div>
                    <div class="form-group">
                        <label >Nom (Civil)</label>
                        <input type="text" id="nomInscri" class="form-control" placeholder="Entrer le nom">
                    </div>
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" id="usernameInscri" class="form-control" placeholder="Entrer le username">
                    </div>
                    <div class="form-group">
                        <label >Mot de passe</label>
                        <input type="password" id="password" class="form-control" placeholder="Entrer le mot de passe">
                    </div>
                    <div class="form-group">
                        <label >Confirmation mot de passe</label>
                        <input type="password" id="repassword" class="form-control" placeholder="Confirmer le mot de passe">
                    </div>
                    <div class="form-group" id="submitDiv">
                        <br>
                        <button type="button" id="btnInscrire" class="btn btn-secondary btn-sm">Inscrire !</button>
                    </div>   
                </form>
                <br>
           </div>
           
           <br><br>
       </section>
    </div>
    <script src="./js/app.js"></script>
</body>   