<form method="post" id="formAddProduit" action="index.php?page=ajout_produit">
    <div class="form-group my-2">
        <label for="nom">Nom du produit : </label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrez le nom du produit" required>
    </div>

    <div class="form-group my-2">
        <label for="desc">Description : </label>
        <textarea type="text" class="form-control" name="desc" id="desc" placeholder="Entrez une description" required></textarea>
    </div>

    <div class="form-group my-2">
        <label for="qte">Quantité : </label>
        <input type="number" class="form-control" name="qte" id="qte" placeholder="Entrez la quantité" required>
    </div>

    <div class="form-group my-2">
        <label for="prix">Prix : </label>
        <input type="number" class="form-control" name="prix" id="prix" placeholder="Entrez le prix du produit" required>
    </div>

    <div class="form-group my-2">
        <label for="marque">Catégorie : </label>
        <input type="text" class="form-control" name="nomCat" id="nomCat" placeholder="Entrez le nom de la catégorie" value=<?= $categorie['nom']; ?> required readonly>
        <input type="text" class="form-control" name="cat" id="cat" placeholder="Entrez le nom de la catégorie" value=<?= $categorie['id'] ?> required readonly hidden>
    </div>

    <div class="form-group text-center mb-1">
        <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
    </div>
</form>