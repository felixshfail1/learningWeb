<?php 
    include 'fonctionnalites/isAuthenticate.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Felix Noiseux | Administration</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/dashboard.css">


</head>

<body>
    <div class="container">

        <?php include 'fonctionnalites/showHeader.php'?>
        
        <h1>Dashboard</h1>
        <br>
        <div class="card-deck">
            <div class="card" id="filesHref">
            <i class="fa fa-file"></i>
            <br>
                    <h5 class="card-title">Fichiers</h5>
              
            </div>
            <div class="card" id="messagesHref">
           <i class="fa fa-comment"></i>
           <br>
                    <h5 class="card-title">Messages</h5>
                
            </div>
            <div class="card" id="gestionHref">
            <i class="fa fa-cogs"></i>
            <br>
                    <h5 class="card-title">Gestion</h5>
               
            
            </div>
        </div>
    </div>
    <script src="./js/app.js"></script>

</body>

</html>