<form method="post" id="formAddCat" action="index.php?page=ajout_cat">
    <div class="form-group my-2">
        <label for="nomCat">Nom de la catégorie : </label>
        <input type="text" class="form-control" name="nomCat" id="nomCat" placeholder="Entrez le nom de la catégorie" required>
    </div>

    <div class="form-group text-center mb-1">
        <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
    </div>
</form>