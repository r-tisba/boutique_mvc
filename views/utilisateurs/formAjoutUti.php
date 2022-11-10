<form method="post" id="formAddUtilisateur" action="index.php?page=ajout_utilisateur">
    <div class="form-group my-2">
        <label for="pseudo">Pseudo : </label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez le pseudo" value="<?= (isset($_POST["pseudo"]) ? $_POST["pseudo"] : "") ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="email">Email : </label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Entrez une adresse mail" value="<?= (isset($_POST["email"]) ? $_POST["email"] : "") ?>" required>
    </div>

    <div class="form-group my-2">
        <label for="mdp">Mot de passe (8 caractères minimum):</label>
        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Créer votre mot de passe" required />
    </div>

    <div class="form-group my-2">
        <label for="verifMdp">Vérifier votre mot de passe :</label>
        <input type="password" class="form-control" name="verifMdp" id="verifMdp" placeholder="Vérifier votre mot de passe" required />
    </div>

    <div class="form-group text-center mb-1">
        <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
    </div>
</form>