<?php
//connexion à la bd
include('Config.php');

// barre de recherche
if (!empty($_GET["recherche"])) {
    $recherche = htmlspecialchars('%' . $_GET["recherche"] . '%') ?: '%';
} else {
    $recherche = "";
}

// select marque
if (!empty($_GET["marque"]) && $_GET["marque"] != "Tout") {
    $choixMarque = $_GET["marque"];
} else {
    $choixMarque = '%';
}

// range prix
if (!empty($_GET["prix"])) {
    $choixPrix = $_GET["prix"];
} else {
    $choixPrix = 200;
}

// select vetement
if (!empty($_GET["vetement"]) && $_GET["vetement"] != "Tout") {
    $choixVetement = $_GET["vetement"];
} else {
    $choixVetement = '%';
}

/*
echo ' - ';
echo $recherche . ' - ';
echo $choixMarque . ' - ';
echo $choixVetement . ' - ';

echo $choixPrix;
//echo gettype($choixPrix);
*/

//Recherche dans la BD
if ($recherche == "") {
    $sql1 = "SELECT *
            FROM articles
            WHERE marque LIKE ? AND vetement LIKE ? AND prix <= ?";
    $stmt = $pdo->prepare($sql1);
    $stmt->execute([$choixMarque, $choixVetement, $choixPrix]);
} else {
    $sql2 = "SELECT *
            FROM articles
            WHERE description LIKE ? AND marque LIKE ? AND vetement LIKE ? AND prix <= ?";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([$recherche, $choixMarque, $choixVetement, $choixPrix]);
}

while ($row = $stmt->fetch()) {

    $Id = $row['id'];
    $Vetement = $row['vetement'];
    $Marque = $row['marque'];
    $Prix = $row['prix'];
    $Reduc = $row['reduction'];
    $Image = $row['image'];
    $Description = $row['description'];
    $Possede = $row['possede'];
?>


    <div class="bloc">
        <!-- Image -->
        <div class="col-12 text-center">
            <img class="image rounded" src="<?php echo '../imageVetement/' . $Image . '' ?>" alt="<?php $Image ?>">
        </div>

        <!-- Description -->
        <hr />
        <p class="col-12 description">Description : <?php if ($Description == "") {
                                                        echo 'Aucune description';
                                                    } else if (strlen($Description) > 60) {
                                                        echo substr($Description, 0, 60) . ' ...';
                                                    } else {
                                                        echo $Description;
                                                    } ?>
        </p>

        <div class="col">
            <p>Prix : <?php if ($Reduc > 0) {
                            echo '<strike>' . $Prix . '</strike>';
                            echo '<font class="logoPromo"> ' . $Reduc . ' €</font>';
                        } else {
                            echo $Prix . ' €';
                        } ?></p>
        </div>

        <div class="col-11 aGauche">
            <p>Marque : <?php echo $Marque ?></p>
        </div>
        <div class="col-1 aDroite">
            <?php if ($Possede == 1) { ?>
                <i class="fas fa-crown"></i>
            <?php } else { ?>
                <i class="fas fa-shopping-cart"></i>
            <?php } ?>
        </div>

        <div class="centrer2">
            <form action="Modification.php" method="POST">
                <input name="id" type="hidden" value="<?php echo $Id ?>">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>

    </div>
<?php } ?>
<div>
    <?php
    $nbArticles = $stmt->rowCount();
    $_SESSION['nbArticles'] = $nbArticles;
    ?>
</div>