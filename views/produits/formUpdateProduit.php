<div class="fleche_retour mb-2 ml-4">
    <a href="<?= $_SESSION['last_url']; ?>" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>
<h1 class="tLato t35 mb-4">Modification du produit <?= $produit['nom']; ?></h1>
<div class="flex-row-center">
    <div class="card col-12 col-md-10 col-lg-8 bg-dark blanc rounded15 py-2 px-4">
        <form method="post" id="formUpdateProduit" action="index.php?page=update_produit&pro=<?= $_GET['pro']; ?>">
            <div class="flexProduitInputs">
                <div class="form-group my-2">
                    <label for="nom">Nom du produit : </label>
                    <input type="text" class="form-control sombre border-0" name="nom" id="nom" placeholder="Entrez le nom du produit" value="<?= $produit['nom']; ?>" required>
                </div>

                <div class="form-group my-2">
                    <label for="desc">Description : </label>
                    <textarea type="text" class="form-control sombre border-0" name="desc" id="desc" placeholder="Entrez une description" required><?= $produit['description']; ?></textarea>
                </div>

                <div class="form-group my-2">
                    <label for="qte">Quantité : </label>
                    <input type="number" class="form-control sombre border-0" name="qte" id="qte" placeholder="Entrez la quantité" value="<?= $produit['quantite']; ?>" required>
                </div>

                <div class="form-group my-2">
                    <label for="prix">Prix : </label>
                    <input type="number" class="form-control sombre border-0" name="prix" id="prix" placeholder="Entrez le prix du produit" value="<?= $produit['prix']; ?>" required>
                </div>

                <div class="form-group my-2">
                    <label for="marque">Catégorie : </label>
                    <select class="form-select sombre border-0" name="cat" id="cat">
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

                <div class="flex-row-center">
                    <hr class="text-center hrPersoW my-3">
                </div>

                <div class="form-group text-center mb-2">
                    <button type="submit" name="create" class="btn btn-outline-primary">Mettre à jour</button>
                </div>
            </div>
        </form>
    </div>
</div>