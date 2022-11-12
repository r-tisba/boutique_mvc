<div class="flex-row-center">
    <div class="card col-12 col-md-8 col-lg-5 bg-dark blanc rounded15 py-2 px-4">
        <form method="post" id="formAddCat" action="index.php?page=ajout_cat">
            <div class="flexProduitInputs">
                <div class="form-group my-2">
                    <label for="nomCat" class="mb-1 me-3">Nom de la catégorie : </label>
                    <input type="text" class="form-control sombre border-0" name="nomCat" id="nomCat" placeholder="Entrez le nom de la catégorie" required>
                </div>
            </div>
            <div class="flex-row-center">
                <hr class="text-center hrPersoW my-3">
            </div>
            <div class="form-group text-center mb-2">
                <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
            </div>
        </form>
    </div>
</div>