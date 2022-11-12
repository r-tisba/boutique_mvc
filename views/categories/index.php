<h1 class="tLato t25">Liste des catégories : </h1>

<main>
    <div class="album py-3">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php
                if (!empty($categories)) {
                    foreach ($categories as $categorie) {
                ?>
                        <!-- CARD Catégorie -->
                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 border-0 b-tra">
                                <div class="card-header cardHeaderCat">
                                    <?php if ($_SESSION['idRole'] == '2') { ?>
                                        <a class="me-1" href="index.php?page=update_cat&cat=<?= $categorie['id']; ?>"><i class="fa fa-solid fa-pen updateIconSombre" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    <h5 class="card-title blanc tLato t25 m-0"><?= $categorie['nom']; ?></h5>
                                    <?php if ($_SESSION['idRole'] == '2') { ?>
                                        <a href="index.php?page=delete_cat&cat=<?= $categorie['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"></i></a>
                                    <?php } ?>

                                </div>
                                <div class="card-body cardCategorie">
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group">
                                            <a href="index.php?page=produits_cat&cat=<?= $categorie['id']; ?>">
                                                <img src="<?= $categorie['image']; ?>" class="imageCat">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<div class="alert alert-danger mt-3">Il n\'y a aucune catégorie</div>';
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php if ($_SESSION['idRole'] == '2') { ?>
    <a href="index.php?page=ajout_cat" class="violet"><i class="fa fa-solid fa-plus me-2"></i>Ajouter une catégorie</a>
<?php } ?>