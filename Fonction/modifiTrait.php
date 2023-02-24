<?php

if (!empty($_POST['affichage'])) {

    // Select
    $artVetement = $_POST['vetement'];
    $artMarque = $_POST['marque'];


    // Prix
    if (!empty($_POST['prix']) && $_POST['prix'] > 0) {
        $artPrix = $_POST['prix'];
    } else {
        $err = "Le prix est incorrecte";
    }

    if (!empty($_POST['reduction']) && $_POST['reduction'] > 0 && $_POST['reduction'] < $artPrix) {
        $artReduction = $_POST['reduction'];
    } else {
        $artReduction = -1;
    }


    $artDescription = $_POST['description'];


    if ($_POST['possedeArticle'] == "1") {
        $artPossede = 1;
    } else {
        $artPossede = 0;
    }

    $IdArticle = $_SESSION['idArticle'];

    $sql2 = "UPDATE articles 
            SET vetement = ?, marque = ?, prix = ?,
                reduction = ?, description = ?, possede = ? 
            WHERE id = ?";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([$artVetement, $artMarque, $artPrix, $artReduction, $artDescription, $artPossede, $IdArticle]);

    $count = $stmt->rowCount();

    if ($count == 1) {
        $val = "L'article a bien été modifier";
    }
}
