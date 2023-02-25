<?php include('head.php') ?>

<body>

    <section class="hero is-warning is-medium">

        <?php include('navbar.php') ?>

    </section>

    <div class="title is-1 centred">
        <h1>Création d'un Vêtement</h1>
    </div>

    <br />
    <br />

    <form action="/?controller=creationArticle&action=treatment" method="POST" enctype='multipart/form-data'>
        <div class="container">

            <?php
            if ($modif == "modif") {
                echo '<div class="p-3 mb-2 bg-success text-white">Le vêtement a été crée</div>';
            } elseif ($modif == "noModif") {
                echo '<div class="p-3 mb-2 bg-danger text-white">Tous les champs sont obligatoire sauf la réduction </div>';
            } ?>

            <br />
            <br />

            <div class="tile is-ancestor">
                <!-- image -->
                <div class="tile is-parent">
                    <?php if ($imageOK) { ?>
                        <article class="tile is-child">
                            <figure class="image is-3by4">
                                <img src="../images/<?php echo $nomImage; ?>" alt="../images/<?php echo $nomImage; ?>">
                            </figure>
                        </article>
                    <?php } else { ?>
                        <article class="tile is-child notification img-no">
                        </article>
                    <?php } ?>
                </div>


                <div class="tile is-vertical is-8">

                    <div class="container-fluid">

                        <!-- Description -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="2"><?php if ($descOK) {
                                                                                                    echo $description;
                                                                                                } ?></textarea>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <!-- Type de vêtement -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value=""> -- Default -- </option>
                                        <?php foreach ($vetements as $vetement) { ?>
                                            <option value="<?php echo $vetement['nom'] ?>" <?php if ($type == $vetement['nom']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?php echo $vetement['nom'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Marque -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="marque" class="form-label">Marque</label>
                                    <select class="form-select" aria-label="Default select example" name="marque">
                                        <option value=""> -- Default -- </option>
                                        <?php foreach ($marques as $marque) { ?>
                                            <option value="<?php echo $marque['nom'] ?>" <?php if ($marqueVal == $marque['nom']) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?php echo $marque['nom'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <!-- Prix -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="prix" class="form-label">Prix</label>
                                    <input type="number" class="form-control" name="prix" min="0" max="200" step="0.01" value="<?php if ($prixOK) {
                                                                                                                                    echo $prix;
                                                                                                                                } ?>">
                                </div>
                            </div>

                            <!-- Reduction -->
                            <div class="col">
                                <div class="mb-3">
                                    <label for="reduction" class="form-label">Reduction</label>
                                    <input type="number" class="form-control" name="reduction" min="0" max="200" step="0.01" value="<?php echo $reduction ?>">
                                </div>
                            </div>
                        </div>

                        <br />

                        <div class="row">
                            <!-- Possede -->
                            <div class="col">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="possede" value="1" <?php if ($possedeOK) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="possede">Possédez vous ce vêtement</label>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />

                        <!-- Image -->
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Choisir une image</label>
                                    <input class="form-control" type="file" name="image">
                                    <input name="image2" value="<?php if ($imageOK) {
                                                                    echo $nomImage;
                                                                } ?>" hidden>
                                </div>
                                <div id="imgHelp" class="form-text">
                                    Les format d'image qui sont accepté sont : png, jpg, git ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <br />
            <br />

            <!-- Btn -->
            <div class="d-grid col-2 mx-auto">
                <button type="submit" class="btn btn-primary buttonForm">
                    Créer
                </button>
            </div>


            <br />
            <br />
        </div>

    </form>

</body>