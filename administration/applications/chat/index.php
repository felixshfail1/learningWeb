<?php 
       include '../../fonctionnalites/isAuthenticate.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Felix Noiseux | Chat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
    <?php include '../../fonctionnalites/showHeader.php' ?>
        <section class="chat">
            <h1 style="margin-top : -1em">Chat</h1>
            <br>
            <div class="messages">
             
            </div>
            <div class="user-inputs">
                <form action="" method="post">
                    <input type="hidden" name="author" id="author" value="<?php echo $_SESSION['username']?>">
                    <input type="text" id="content" name="content" placeholder="Écrivez votre message ici">
                    <button type="submit" id="submitButton">Envoyer !</button>
                </form>
            </div>
            </section>
    </div>

    <script src="./js/app.js"></script>
</body>
</html>