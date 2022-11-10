<form method="post" id="formUpdateProduit" action="index.php?page=update_produit&produit=<?= $_GET['produit']; ?>">
    <div class="form-group my-2">
        <label for="nom">Nom du produit : </label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom du produit" value="<?= $produit['nom']; ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="desc">Description : </label>
        <textarea type="text" class="form-control" name="desc" id="desc" placeholder="Entrez une description" required><?= $produit['description']; ?></textarea>
    </div>

    <div class="form-group my-2">
        <label for="qte">Quantité : </label>
        <input type="number" class="form-control" name="qte" id="qte" placeholder="Entrez la quantité" value="<?= $produit['quantite']; ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="prix">Prix : </label>
        <input type="number" class="form-control" name="prix" id="prix" placeholder="Entrez le prix du produit" value="<?= $produit['prix']; ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="marque">Catégorie : </label>
        <select class="form-select" name="cat" id="cat">
            <?php
            foreach ($categories as $categorie) {
            ?>
                <option value="<?= $categorie['id']; ?>" <?= $produit['categorie'] == $categorie['id'] ? 'selected' : ''; ?>>
                    <?= $categorie['nom']; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
    
    <div class="form-group text-center mb-1">
        <button type="submit" name="create" class="btn btn-outline-primary">Mettre à jour</button>
    </div>
</form>