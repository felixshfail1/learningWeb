<?php 
    include '../../fonctionnalites/isAuthenticate.php';

    $isUploaded = false;

    if(isset($_FILES['fichier'])){
        $errors = array();
        $file_name = $_FILES['fichier']['name'];
        $file_size = $_FILES['fichier']['size'];
        $file_tmp = $_FILES['fichier']['tmp_name'];
        $file_type = $_FILES['fichier']['type'];
        
        $splitString = explode('.',$file_name);
        $file_ext = strtolower(end($splitString));
        
        $extensions = array("jpeg","jpg","png","txt");

        if(!(in_array($file_ext,$extensions))){
            $errors[] = "Mauvais extension";
        }

        if($file_size > 2097152){
            $errors[] = "Maximum 2MB";
        }

        if(empty($errors)){
       
            move_uploaded_file($file_tmp,"./uploadedFiles/".$file_name);
            $isUploaded = true;
           header('Location: ./index.php?isUploaded=true');
        }
        else{
            echo "erreur";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Felix Noiseux | Upload</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <div class="container">
       <?php include '../../fonctionnalites/showHeader.php' ?>

        <div class="wrapper">

        <?php if(isset($_GET['isUploaded'])) {
                 if($_GET['isUploaded'] == true){?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="divAlerte">
            Le fichier a bien été télécharger
             <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="closeBtn">
               <span aria-hidden="true">&times;</span>
             </button>
        </div>
        <?php }
                } ?>
            <div class="container-fluid">

                <h1>Télécharger un fichier</h1>
                <form action="" method="POST" enctype="multipart/form-data" id="uploadForm">
                    <div class="upload-container">
                        <div class="border-container">
                            <div class="icons fa-4x">
                                <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                                <i class="fas fa-file-pdf" data-fa-transform="shrink-3 down-2 right-6 rotate-45"></i>
                            </div>
                            <input type="file" id="file-upload" onchange="upload()" name="fichier">
                            <p>Drag and drop files here, or
                                <a href="" id="file-browser">browse</a> your computer.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="./js/app.js"></script>
 <script>
  //  $("#file-upload").css("opacity", "0");

    $(function(){
        $("#file-browser").on('click', function(e){
            e.preventDefault();
            $("#file-upload:hidden").trigger('click');
        });
    });

</script>
</body>


</html>