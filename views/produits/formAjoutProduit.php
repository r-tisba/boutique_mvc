<div class="fleche_retour mb-2 ml-4">
    <a href="<?= $_SESSION['last_url']; ?>" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>
<h1 class="tLato t35 mb-4">Ajout d'un produit</h1>
<div class="flex-row-center">
    <div class="card col-12 col-md-10 col-lg-8 bg-dark blanc rounded15 py-2 px-4">
        <form method="post" id="formAddProduit" action="index.php?page=ajout_produit">
            <div class="form-group my-2">
                <label for="nom">Nom du produit : </label>
                <input type="text" class="form-control sombre border-0" name="nom" id="nom" placeholder="Entrez le nom du produit" required>
            </div>

            <div class="form-group my-2">
                <label for="desc">Description : </label>
                <textarea type="text" class="form-control sombre border-0" name="desc" id="desc" placeholder="Entrez une description" required></textarea>
            </div>

            <div class="form-group my-2">
                <label for="qte">Quantité : </label>
                <input type="number" class="form-control sombre border-0" name="qte" id="qte" placeholder="Entrez la quantité" required>
            </div>

            <div class="form-group my-2">
                <label for="prix">Prix : </label>
                <input type="number" class="form-control sombre border-0" name="prix" id="prix" placeholder="Entrez le prix du produit" required>
            </div>

            <div class="form-group my-2">
                <label for="marque">Catégorie : </label>
                <?php
                if (!empty($categorie)) {
                ?>
                    <input type="text" class="form-control sombre border-0" name="nomCat" id="nomCat" placeholder="Entrez le nom de la catégorie" value=<?= $categorie['nom']; ?> required readonly>
                    <input type="text" class="form-control sombre border-0" name="cat" id="cat" placeholder="Entrez le nom de la catégorie" value=<?= $categorie['id'] ?> required readonly hidden>
                <?php } else {
                ?>
                    <select class="form-select sombre border-0" name="cat" id="cat">
                        <?php
                        foreach ($categories as $categorie) {
                        ?>

                            <option value="<?= $categorie['id']; ?>"><?= $categorie['nom']; ?></option>

                        <?php
                        }
                        ?>
                    </select>

                <?php } ?>
            </div>


            <div class="form-group text-center mb-1">
                <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
            </div>
        </form>
    </div>
</div>