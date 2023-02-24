<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Site de vêtement</title>

    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="style/styleVetement.css">


    <script src="https://kit.fontawesome.com/814ded4c7d.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php

    session_start();

    //connexion à la bd
    include('Fonction/config.php');

    //Remise à zéro 
    if (!empty($_GET['reset']) && $_GET['reset'] == "reset") {
        unset($_GET);
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand nom" href="../index.php">Vêtement</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="page/Modification.php">Modification</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="page/Creation.php">Ajout</a>
                    </li>

                </ul>
                <label class="profil">
                    <a class="nav-link active" href="page/Profil.php"><i class="fas fa-user-alt logoBlanc"> Profil</i></a>
                </label>
            </div>
        </div>
    </nav>

    <div class="titre">
        <h1>Index</h1>
    </div>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>