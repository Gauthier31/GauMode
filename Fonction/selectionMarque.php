<?php

$sql = "SELECT nom
        FROM marques";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

?>

<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="marque">
    <option value="Tout">Sélectionne la marque</option>
    <?php

    while ($row = $stmt->fetch()) {

        $Nom = $row['nom'];

        echo '<option value="' . $Nom . '"';
        // Affiche le paramètre mis par l'utilisateur 
        if (!empty($_POST['marque']) && $Nom == $_POST['marque']) {
            echo 'selected>';
        } else {
            echo '>';
        }
        echo $Nom ?></option>

    <?php } ?>
</select>