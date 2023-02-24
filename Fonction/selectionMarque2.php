<?php

$sql = "SELECT nom
        FROM marques";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

?>
<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="marque">
    <?php

    while ($row = $stmt->fetch()) {

        $Nom = $row['nom'];

        echo '<option value="' . $Nom . '"';
        // Affiche le paramètre mis par l'utilisateur 
        if ($Nom == $artMarque) {
            echo 'selected>';
        } else {
            echo '>';
        }
        echo $Nom ?></option>

    <?php } ?>
</select>