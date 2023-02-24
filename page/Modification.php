<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Site de vêtement</title>

    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="../style/styleVetement.css">


    <script src="https://kit.fontawesome.com/814ded4c7d.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include("../Fonction/navBar.php");
    ?>

    <div class="titre">
        <h1>Modification d'un article</h1>
    </div>

    <?php
    session_start();

    //connexion à la bd
    include('../Fonction/config.php');

    // Si $_POST['idArticle'] rempli
    if (!empty($_POST['id'])) {
        $IdArticle = $_SESSION['idArticle'] = $_POST['id'];
        // Si vide
    } else {
        $IdArticle = $_SESSION['idArticle'];
    }

    $sql = "SELECT *
            FROM articles
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$IdArticle]);

    $row = $stmt->fetch();

    // Définitions des variables
    $artVetement = $row['vetement'];
    $artMarque = $row['marque'];
    $artPrix = $row['prix'];
    $artReduction = $row['reduction'];

    $artImage = $row['image'];

    $artDescription = $row['description'];
    $artPossede = $row['possede'];

    $err = "null";
    $val = "null";

    include('../Fonction/modifiTrait.php');

    ?>

    <form action="Modification.php" method="POST">

        <div class="container overflow-hidden">
            <div class="row gx-5 justify-content-center espace6">
                <?php if ($err != "null") {
                    echo '<div class="col-4 erreur">';
                    echo $err;
                    echo '</div>';
                } else if ($val != "null") {
                    echo '<div class="col-4 valide">';
                    echo $val;
                    echo '</div>';
                } ?>
            </div>

            <div class="row gx-5 justify-content-center espace6">
                <!-- Image -->
                <div class="col-3 text-center">
                    <img class="image rounded bordure" src="<?php echo '../imageVetement/' . $artImage . '' ?>" alt="<?php $artImage ?>">
                </div>

                <div class="col-9">


                    <div class="row gx-5 align-items-center espace6">
                        <div class="col">
                            <label for="inputNom" class="form-label">Marque :</label>
                            <?php
                            include('../Fonction/selectionMarque2.php');
                            ?>
                        </div>

                        <div class="col">
                            <label for="inputNom" class="form-label">Type de vêtement :</label>
                            <?php
                            include('../Fonction/selectionVetement2.php');
                            ?>
                        </div>
                    </div>

                    <div class="row gx-5 align-items-center espace6">
                        <div class="col">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" maxlength="5" value="<?php echo $artPrix; ?>" require>
                        </div>

                        <div class="col">
                            <label for="reduction" class="form-label">Réduction</label>
                            <input type="number" step="0.01" class="form-control" id="reduction" name="reduction" maxlength="5" <?php
                                                                                                                                if ($artReduction == -1) {
                                                                                                                                    echo 'placeholder="Aucune promotion"';
                                                                                                                                } else {
                                                                                                                                    echo 'value="' . $artReduction . '"';
                                                                                                                                } ?>>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row gx-5 espace6">
                            <div class="col-9">
                                <label for="nomImage" class="form-label">Image</label>
                                <input class="form-control" type="file" name="nomImage" id="nomImage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center espace6">
                <div class="col-8">
                    <div class="espace6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" <?php
                                                                                                    if ($artDescription == "") {
                                                                                                        echo 'placeholder="Aucune description"';
                                                                                                    } else {
                                                                                                    } ?>value="<?php echo $artDescription; ?>"><?php echo $artDescription; ?></textarea>
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

                                    <input type="radio" id="oui" name="possedeArticle" value="1" <?php if ($artPossede == 1) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                                    <label for="oui">Oui</label>

                                    <input type="radio" id="non" name="possedeArticle" value="0" <?php if ($artPossede == 0) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
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