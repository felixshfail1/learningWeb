<?php 
  //Nom de la page actuelle
  $url = $_SERVER["REQUEST_URI"]; 
  $array = explode("/", $url);
  $pageCourante = end($array);

  //Est Connecte
  $estConnecte = false;
  if(isset($_SESSION['username'])){
      $estConnecte = true;
  }

  if(isset($_POST['precedent'])){
    $arrayDir = $array;
    array_pop($arrayDir); //pop current page

    if( end($arrayDir) == "administration"){
      header('Location: /FelixNoiseuxCom/administration/dashboard.php');
    }
    else{
      array_pop($arrayDir); //pop current directory
      $newLocation = end($arrayDir);
      header('Location: /FelixNoiseuxCom/administration/'.$newLocation);
    }

  }
  else if(isset($_POST['deconnexion'])){
    session_destroy();
    header('Location: /FelixNoiseuxCom/administration/index.php');
  }
    
?>
<nav class="navbar navbar-light bg-light" style="border-radius : 6px; margin-top : 0.2em">

            <a class="navbar-brand" href="#">
                <img src="https://coreui.io/docs/assets/brand/bootstrap-solid.svg" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                Felix Noiseux
            </a>

            <?php if($estConnecte) {?>
            <form class="form-inline" action="" method="POST">
            <?php if($pageCourante != "dashboard.php"){ ?>
            <button type="submit" class="btn btn-default btn-sm" id="btnPrecedent" name="precedent">Precedent</button>
            <?php }?>
            <button type="submit" class="btn btn-default btn-sm" id="btnDeconnexion" name="deconnexion">Deconnexion</button>
            </form>
            <?php }?>
       
</nav>
<br><br>