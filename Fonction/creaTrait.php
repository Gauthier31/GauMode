<?php

// Déclaration variable de test
$marqueOK = false;
$vetementOK = false;
$prixOK = false;
$reducOK = false;
$imageOK = false;
$possedeOK = false;

$affichage = false;

$err = "null";
$valide = "null";

$marque;
$vetement;
$prix;
$reduction;
$image;
$description;
$possede;


if (!empty($_POST['affichage']) && $_POST['affichage'] == 1) {

    $affichage = true;

    // Test de marque
    if (!empty($_POST['marque']) && $_POST('marque') != "Tout") {
        $marque = $_POST['marque'];
        $marqueOK = true;
    } else {
        $err = "marque";
    }

    // Test de vetement
    if (!empty($_POST['vetement']) && $_POST('vetement') != "Tout") {
        $vetement = $_POST['vetement'];
        $vetementOK = true;
    } else {
        $err = "vetement";
    }

    // Test de prix
    if (!empty($_POST['prix']) && $_POST['prix'] > 0) {
        $prix = $_POST['prix'];
        $prixOK = true;
    } else {
        $err = "prix";
    }

    // Test de reduction
    if (
        (!empty($_POST['reduction']) && $err != "prix"
            && $_POST['reduction'] > 0 && $_POST['reduction'] < $_POST['prix']) || $_POST['reduc'] == -1.00
    ) {
        $reduction = $_POST['reduction'];
        $reducOK = true;
    } else {
        $reduction = -1.00;
    }

    // Test de image
    if (!empty($_POST['image'])) {
        $image = $_POST['image'];
        $imageOK = true;
    } else {
        $err = "image";
    }

    // Test de description
    $description = $_POST['description'];

    // Test de possede
    if (!empty($_POST['possede'])) {
        $possede = $_POST['possede'];
        $possedeOK = true;
    } else {
        $err = "possede";
    }

    if ($err == "null") {

        $sql = "INSERT INTO articles(`vetement`, `marque`, `prix`, 
        `reduction`, `image`, `description`, `possede`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$vetement, $marque, $prix, $reduction, $image, $description, $possede]);

        $data = $stmt->fetch();
        $data = $stmt->rowCount();

        if ($data == 1) {
            $valide = "valide";
        }
    }
}
