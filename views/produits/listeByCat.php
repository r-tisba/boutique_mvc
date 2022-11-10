<?php
if (!empty($produits)) {
?>
    <h1 class="tLato t25">Liste des produits de la catégorie <?= $categorie['nom']; ?></h1>
    <?php
    foreach ($produits as $produit) {
    ?>
        <div class="rowMarques">
            <div>
                <?= $produit['nom'] . ' : ' . $produit['prix'] . '€ / Exemplaires restants : ' . $produit['quantite']; ?>
            </div>
            <?php if ($_SESSION['idRole'] == '2') { ?>
                <div>
                    <a href="index.php?page=update_produit&produit=<?= $produit['id']; ?>" class="me-1"><i class="fa fa-solid fa-pen updateIcon" aria-hidden="true"></i></a>
                    <a href="index.php?page=delete_produit&produit=<?= $produit['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"></i></a>
                </div>
            <?php } ?>
        </div>
        <hr>
<?php
    }
} else {
    echo '<div class="alert alert-danger mt-3">Il n\'y a aucun produit</div>';
}

if ($_SESSION['idRole'] == '2') { ?>
    <a href="index.php?page=ajout_produit&cat=<?= $_GET['cat']; ?>"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un produit</a>
<?php } ?>