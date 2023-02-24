<?php
if (!empty($_GET["recherche"])) {
    $recherche = htmlspecialchars('%' . $_GET["recherche"] . '%') ?: '%';
} else {
    $recherche = "";
}


//modification bd
if ($recherche == "") {
    $sql1 = "SELECT idUtilisateur, Nom, Prenom, Adresse1, Ville, Cp, Telephone, Identifiant, AdresseMail
                FROM utilisateurs
                WHERE status = 1
                ORDER BY Nom, Prenom DESC";
    $stmt = $pdo->prepare($sql1);
    $stmt->execute([]);
} else {
    $sql2 = "SELECT *
            FROM utilisateurs
            WHERE status = 1 AND (Nom LIKE :recherche1 OR Prenom LIKE :recherche2 OR Adresse1 LIKE :recherche3 OR Ville LIKE :recherche4 OR Cp LIKE :recherche5
                                OR Telephone LIKE :recherche6 OR Identifiant LIKE :recherche7 OR AdresseMail LIKE :recherche8) 
            ORDER BY Nom, Prenom DESC";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([
        'recherche1' => $recherche, 'recherche2' => $recherche, 'recherche3' => $recherche, 'recherche4' => $recherche, 'recherche5' => $recherche,
        'recherche6' => $recherche, 'recherche7' => $recherche, 'recherche8' => $recherche
    ]);
}
