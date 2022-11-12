<div class="fleche_retour mb-2 ml-4">
    <a href="index.php?page=liste_categories" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>

<h1 class="tLato t35 mb-4">Modification de la catégorie <?= $categorie['nom']; ?></h1>
<div class="flex-row-center">
    <div class="card col-12 col-md-8 col-lg-5 bg-dark blanc rounded15">
        <form method="post" id="formUpdateCat" action="index.php?page=update_cat&cat=<?= $_GET['cat']; ?>">
            <div class="form-group flex-row-center mt-3 mb-3">
                <label for="nomCat" class="mb-1 me-3">Nom de la catégorie : </label>
                <input type="text" class="form-control sombre w-auto border-0" name="nomCat" id="nomCat" placeholder="Entrez le nom de la catégorie" value="<?= $categorie['nom']; ?>" required>
            </div>
            <div class="flex-row-center">
                <hr class="text-center hrPersoW mt-0 mb-3">
            </div>
            <div class="form-group text-center mb-2">
                <button type="submit" name="update" class="btn btn-outline-primary">Modifier</button>
            </div>
        </form>
    </div>
</div>