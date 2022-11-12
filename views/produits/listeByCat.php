<div class="fleche_retour mb-2 ml-4">
    <a href="index.php?page=liste_categories" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>
<h1 class="tLato t25">Liste des produits de la catégorie <?= $categorie['nom']; ?></h1>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col-1">ID</th>
            <th scope="col-10">Nom</th>
            <th scope="col-8">Description</th>
            <th scope="col-4">Quantité</th>
            <th scope="col">Prix</th>
            <?php if ($_SESSION['idRole'] == '2') { ?>
                <th scope="col">Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php

        if (!empty($produits)) {
            foreach ($produits as $produit) {
        ?>
                <tr>
                    <th scope="row"><?= $produit['id']; ?></th>
                    <td><?= $produit['nom']; ?></td>
                    <td><?= $produit['description']; ?></td>
                    <td><?= $produit['quantite']; ?></td>
                    <td><?= $produit['prix'] . '€'; ?></td>

                    <?php if ($_SESSION['idRole'] == '2') { ?>
                        <td>
                            <a href="index.php?page=update_produit&pro=<?= $produit['id']; ?>" class="me-1">
                                <i class="fa fa-solid fa-pen updateIcon me-2" aria-hidden="true"></i>
                            </a>
                            <a href="index.php?page=delete_produit&pro=<?= $produit['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"></i>
                            </a>
                        </td>
                    <?php } ?>
                </tr>
        <?php
            }
        } else {
            echo '<div class="alert alert-danger mt-3">Il n\'y a aucun produit</div>';
        }
        ?>
    </tbody>
</table>
<?php
if ($_SESSION['idRole'] == '2') { ?>
    <a href="index.php?page=ajout_produit&cat=<?= $_GET['cat']; ?>" class="noir"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un produit</a>
<?php } ?>