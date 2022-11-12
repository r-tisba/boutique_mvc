<div class="fleche_retour mb-2 ml-4">
    <a href="<?= $_SESSION['last_url']; ?>" class="retour">
        <i class="fas fa-chevron-left"></i>
        Retour
    </a>
</div>

<h1 class="tLato t35 mb-4">Ajout d'un utilisateur</h1>
<div class="flex-row-center">
    <div class="card col-12 col-md-10 col-lg-8 bg-dark blanc rounded15 py-2 px-4">
        <form method="post" id="formAddUtilisateur" action="index.php?page=ajout_utilisateur">
            <div class="form-group my-2">
                <label for="pseudo">Pseudo : </label>
                <input type="text" class="form-control sombre border-0" name="pseudo" id="pseudo" placeholder="Entrez le pseudo" value="<?= (isset($_POST["pseudo"]) ? $_POST["pseudo"] : "") ?>" required>
            </div>

            <div class="form-group my-2">
                <label for="email">Email : </label>
                <input type="text" class="form-control sombre border-0" name="email" id="email" placeholder="Entrez une adresse mail" value="<?= (isset($_POST["email"]) ? $_POST["email"] : "") ?>" required>
            </div>

            <div class="form-group my-2">
                <label for="mdp">Mot de passe (8 caractères minimum):</label>
                <input type="password" class="form-control sombre border-0" name="mdp" id="mdp" placeholder="Créer votre mot de passe" required />
            </div>

            <div class="form-group my-2">
                <label for="verifMdp">Vérifier votre mot de passe :</label>
                <input type="password" class="form-control sombre border-0" name="verifMdp" id="verifMdp" placeholder="Vérifier votre mot de passe" required />
            </div>

            <div class="form-group text-center mb-1">
                <button type="submit" name="create" class="btn btn-outline-primary">Créer</button>
            </div>
        </form>
    </div>
</div>