<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="image/LogoSite.PNG">
    <title>Site de vêtement</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../style/styleVetement.css">


    <script src="https://kit.fontawesome.com/814ded4c7d.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include("../Fonction/navBar.php");
    ?>

    <div class="titre">
        <h1>Création d'un article</h1>
    </div>

    <?php
    session_start();

    // Connexion à la bd
    include('../Fonction/config.php');

    // Ajout a la BD
    include('../Fonction/creaTrait.php');

    ?>

    <form action="CreationArticles.php" method="POST">

        <div class="container overflow-hidden">
            <div class="row gx-5 justify-content-center espace6">
                <?php if ($err != "null") {
                    echo '<div class="col-4 erreur">';
                    echo 'Problème de création';
                    echo '</div>';
                } else if ($valide != "null") {
                    echo '<div class="col-4 valide">';
                    echo 'Ajout effectué dans la base de données';
                    echo '</div>';
                } ?>
            </div>

            <div class="row gx-5 justify-content-center espace6">
                <!-- Image -->
                <div class="col-3 text-center image bordure2">
                    <img class="image rounded" <?php if ($imageOK) {
                                                    echo 'src="../imageVetement/"' . $image;
                                                    echo 'alt="' . $image . '"';
                                                } ?>>
                    photo
                </div>

                <div class="col-9">


                    <div class="row gx-5 align-items-center espace6">
                        <div class="col">
                            <label for="marque" class="form-label">Marque :</label>
                            <?php
                            include('../Fonction/selectionMarque.php');
                            ?>
                        </div>

                        <div class="col">
                            <label for="vetement" class="form-label">Type de vêtement :</label>
                            <?php
                            include('../Fonction/selectionVetement.php');
                            ?>
                        </div>
                    </div>

                    <div class="row gx-5 align-items-center espace6">

                        <div class="col">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" step="0.01" class="form-control <?php if ($affichage) {
                                                                                        if ($prixOK) {
                                                                                            echo 'is-valid';
                                                                                        } else {
                                                                                            echo 'is-invalid';
                                                                                        }
                                                                                    }
                                                                                    ?>" id="prix" name="prix" maxlength="5" value="<?php if ($affichage && $prixOK) {
                                                                                                                                        echo $prix;
                                                                                                                                    } ?>" require>
                        </div>

                        <div class="col">
                            <label for="reduction" class="form-label">Réduction</label>
                            <input type="number" step="0.01" class="form-control <?php if ($affichage) {
                                                                                        if ($reducOK) {
                                                                                            echo 'is-valid';
                                                                                        } else {
                                                                                            echo 'is-invalid';
                                                                                        }
                                                                                    }
                                                                                    ?>" id="reduction" name="reduction" maxlength="5" value="<?php if ($affichage && $reducOK) {
                                                                                                                                                    echo $reduction;
                                                                                                                                                } ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="row gx-5 espace6">
                            <div class="col-9">
                                <label for="nomImage" class="form-label">Image</label>
                                <input class="form-control" type="file" name="nomImage" id="nomImage" value="<?php if ($affichage && $imageOK) {
                                                                                                                    echo $image;
                                                                                                                } ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center espace6">
                <div class="col-8">
                    <div class="espace6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" value="<?php if ($affichage && $description) {
                                                                                                                echo $description;
                                                                                                            } ?>"></textarea>
                    </div>
                </div>

                <div class="col-4">
                    <div class="row justify-content-center espace6">

                        <div class="col centrer2">
                            <div class="form-check form-switch">
                                <!--
                                <input class="form-check-input" type="checkbox" role="switch" name="possedeArticle" id="possedeArticle" <?php /* if ($artPossede == 1) {
                                                                                                                                            echo 'checked value="1"';
                                                                                                                                        } else {
                                                                                                                                            echo 'value="0"';
                                                                                                                                        } */ ?>>
                                <label class="form-check-label" for="possedeArticle">Avez vous cet article.</label>
                                                                                                                                    -->
                                <div>
                                    Avez vous cet article :
                                    <input type="radio" id="oui" name="possedeArticle" value="1">
                                    <label for="oui">Oui</label>

                                    <input type="radio" id="non" name="possedeArticle" value="0">
                                    <label for="non">Non</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center espace6">
                        <div class="col-2">
                            <input type="texte" hidden name="affichage" value="1">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </form>

</body>

</html>