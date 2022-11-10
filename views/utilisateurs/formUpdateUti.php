<form method="post" id="formUpdateUtilisateur" action="index.php?page=update_utilisateur&uti=<?= $_GET['uti']; ?>">
    <div class="form-group my-2">
        <label for="pseudo">Pseudo : </label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez le pseudo" value="<?= $utilisateur['pseudo']; ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="email">Email : </label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Entrez une adresse mail" value="<?= $utilisateur['email']; ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="role">Rôle : </label>
        <select class="form-select" name="role" id="role">
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

    <div class="form-group text-center mb-1">
        <button type="submit" name="create" class="btn btn-outline-primary">Mettre à jour</button>
    </div>
</form>