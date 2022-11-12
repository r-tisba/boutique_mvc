<div class="fleche_retour mb-2 ml-4">
    <a href="<?= $_SESSION['last_url']; ?>" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>

<h1 class="tLato t35 mb-4">Modification de l'utilisateur <?= $utilisateur['pseudo']; ?></h1>
<div class="flex-row-center">
    <div class="card col-12 col-md-10 col-lg-8 bg-dark blanc rounded15 py-2 px-4">
        <form method="post" id="formUpdateUtilisateur" action="index.php?page=update_utilisateur&uti=<?= $_GET['uti']; ?>">
            <div class="form-group my-2">
                <label for="pseudo">Pseudo : </label>
                <input type="text" class="form-control sombre border-0" name="pseudo" id="pseudo" placeholder="Entrez le pseudo" value="<?= $utilisateur['pseudo']; ?>" required>
            </div>

            <div class="form-group my-2">
                <label for="email">Email : </label>
                <input type="text" class="form-control sombre border-0" name="email" id="email" placeholder="Entrez une adresse mail" value="<?= $utilisateur['email']; ?>" required>
            </div>

            <div class="form-group my-2">
                <label for="role">Rôle : </label>
                <select class="form-select sombre border-0" name="role" id="role">
                    <?php
                    foreach ($roles as $role) {
                    ?>
                        <option value="<?= $role['id']; ?>" <?= $utilisateur['role'] == $role['id'] ? 'selected' : ''; ?>>
                            <?= $role['nom']; ?>
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
        </form>
    </div>
</div>