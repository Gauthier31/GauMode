<?php

$sql = "SELECT type
        FROM type";
$stmt = $pdo->prepare($sql);
$stmt->execute([]);

?>

<select class="form-select form-select-sm" aria-label=".form-select-sm example" name="vetement">

    <?php

    while ($row = $stmt->fetch()) {

        $Vetement = $row['type'];

        echo '<option value="' . $Vetement . '"';
        // Affiche le paramètre mis par l'utilisateur 
        if ($artVetement == $Vetement) {
            echo 'selected>';
        } else {
            echo '>';
        }
        echo $Vetement ?></option>

    <?php } ?>
</select>