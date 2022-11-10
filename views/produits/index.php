<h1 class="tLato t25">Liste des produits : </h1>

<?php
if (!empty($produits)) {
    foreach ($produits as $produit) {
?>
        <div class="rowMarques">
            <div>
                <?= $produit['nom'] . ' : ' . $produit['prix'] . '€ / Exemplaires restants : ' . $produit['quantite'] . '. Dans la catégorie : ' . $produit['nomCat']; ?>
            </div>
            <?php if ($_SESSION['idRole'] == '2') { ?>
                <div>
                    <a class="me-1" href="index.php?page=update_produit&pro=<?= $produit['id']; ?>"><i class="fa fa-solid fa-pen updateIcon" aria-hidden="true"></i></a>
                    <a href="index.php?page=delete_produit&pro=<?= $produit['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"></i></a>
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
    <a href="index.php?page=ajout_produit"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un produit</a>
<?php } ?>