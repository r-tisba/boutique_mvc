<h1 class="tLato t25">Liste des produits : </h1>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col-1">ID</th>
            <th scope="col-10">Nom</th>
            <th scope="col-8">Description</th>
            <th scope="col-4">Quantité</th>
            <th scope="col">Prix</th>
            <th scope="col">Catégorie</th>
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
                    <td><?= $produit['nomCat']; ?></td>

                    <?php if ($_SESSION['idRole'] == '2') { ?>
                        <td>
                            <a class="me-1" href="index.php?page=update_produit&pro=<?= $produit['id']; ?>">
                                <i class="fa fa-solid fa-pen updateIcon me-2" aria-hidden="true"></i>
                            </a>
                            <a href="index.php?page=delete_produit&pro=<?= $produit['id']; ?>">
                                <i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"></i>
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
    <a href="index.php?page=ajout_produit" class="noir"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un produit</a>
<?php } ?>