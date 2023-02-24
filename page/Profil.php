<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=" utf-8" />
    <title>Site de vêtement</title>

    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../Style/styleVetement.css">


    <script src="https://kit.fontawesome.com/814ded4c7d.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php

    session_start();

    //connexion à la bd
    include('../Fonction/config.php');

    include('../Fonction/navBar.php');
    ?>

    <!-- Remise à zéro -->
    <?php
    if (!empty($_POST['reset']) && $_POST['reset'] == "reset") {
        unset($_POST);
    }
    ?>

    <div class="titre">
        <h1>Profil</h1>
    </div>

    <!-- barre de recherche -->
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- colonne vide pour rapetir la barre de recherche -->
            <div class="col-md-2"></div>

            <div class="col-md-8 espace1">
                <form class="form-inline" action="Profil.php" method="POST">
                    <fieldset>
                        <div class="input-group">
                            <input id="recherche" name="recherche" type="recherche" class="form-control" <?php
                                                                                                            // Affiche le paramètre mis par l'utilisateur 
                                                                                                            if (!empty($_GE_POSTT['recherche'])) {
                                                                                                                echo 'value="' . $_POST['recherche'] . '"';
                                                                                                            } else {
                                                                                                                echo 'placeholder="Rechercher un article"';
                                                                                                            } ?> aria-label="Saisie de la recherche">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search logoBlanc"></i>
                                </button>

                                <div class="form-check aDroite">
                                    <input class="form-check-input" type="checkbox" value="reset" name="reset" id="reset">
                                    <label class="form-check-label" for="reset">
                                        Reset
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>


                    <div class="row justify-content-md-center">
                        <div class="col-3 espace4">
                            <?php
                            include('../Fonction/selectionMarque.php');
                            ?>
                        </div>

                        <div class="col-1"></div>

                        <div class="col-3 espace5">
                            <label for="Prix" class="form-label"><u>Prix :</u></label>
                            <br />
                            <p class="aGauche">1 €</p>
                            <p class="aDroite">200 €</p>
                            <input type="range" name="prix" id="prix" class="form-range" min="1" max="200" <?php
                                                                                                            // Affiche le paramètre mis par l'utilisateur 
                                                                                                            if (!empty($_POST['prix'])) {
                                                                                                                echo 'value="' . $_POST['prix'] . '"';
                                                                                                            } else {
                                                                                                                echo 'value="200"';
                                                                                                            }
                                                                                                            ?>>

                            <p class="centrer">entre 0 - <?php if (!empty($_POST['prix'])) {
                                                                echo $_POST['prix'];
                                                            } ?> €
                            </p>
                        </div>

                        <div class="col-1">
                        </div>

                        <div class="col-3 espace4">
                            <?php
                            include('../Fonction/selectionVetement.php');
                            ?>
                        </div>
                    </div>

                </form>

                <div>
                    <h1>Explication logo</h1>
                    <i class="fas fa-crown logoBlack"></i> : Je possèdent.<br />
                    <i class="fas fa-shopping-cart logoBlack"></i> : Je souhaite acheter.<br />
                </div>

                <div class="espace1 centrer2">
                    Nombre d'article trouvé : ?.
                </div>
            </div>

            <!-- colonne vide pour rapetir la barre de recherche -->
            <div class="col-md-2"></div>
        </div>
    </div>

    <div class="contener-fluid">
        <div class="row">

            <div class="col-1"></div>

            <div class="col-10">
                <div class="contener-fluid">
                    <div class="row justify-content-md-center">
                        <?php
                        include('../Fonction/afficherVetement.php');
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>

        </div>
    </div>

</body>

</html>