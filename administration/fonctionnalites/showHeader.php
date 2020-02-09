<?php 
  
  //Est Connecte
  $estConnecte = false;
  if(isset($_SESSION['username'])){
      $estConnecte = true;
  }

  //Filtre demande. Deconnexion ou Precent
  if(isset($_POST['precedent'])){
    echo "precendent";
  }
  else if(isset($_POST['deconnexion'])){
    session_destroy();
    header('Location: /FelixNoiseuxCom/administration/index.php');
  }

  //Nom de la page actuelle
  $url = $_SERVER["REQUEST_URI"]; 
  $array = explode("/", $url);
  $pageCourante = end($array);  
?>
<nav class="navbar navbar-light bg-light">

            <a class="navbar-brand" href="#">
                <img src="https://coreui.io/docs/assets/brand/bootstrap-solid.svg" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                Felix Noiseux
            </a>

            <?php if($estConnecte) {?>
            <form class="form-inline" action="" method="POST">
            <?php if($pageCourante != "dashboard.php"){ ?>
            <button type="submit" class="btn btn-default btn-sm" name="precedent">Precedent</button>
            <?php }?>
            <button type="submit" class="btn btn-default btn-sm" name="deconnexion">Deconnexion</button>
            </form>
            <?php }?>
       
</nav>
<br><br>