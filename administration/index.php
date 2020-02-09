<?php 
       session_start();
       if(isset($_SESSION['username']))
       {
           header('Location: ./dashboard.php');
       }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Felix Noiseux | Administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="container">

        
        <?php include 'fonctionnalites/showHeader.php'?>

        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <form method="POST" action="fonctionnalites/authenticate.php">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Administration</h3>
                        </div>
                        <div class="panel-body">
                            <?php if(isset($_GET['error'])){
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Erreur</strong> Ton nom d\'utilisateur ou mot de passe sont incorrecte.
                                <button type="button" onclick="this.parentNode.style.display = \'none\';" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>';
                                }  ?>
                            <form accept-charset="UTF-8" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Utilisateur" name="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Connexion" name="submit">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>