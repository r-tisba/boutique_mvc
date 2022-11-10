<div class="container">
    <h1 class="tLato t50">Inscription</h1>
    <div class="flex-row-center">
        <form method="post">

            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" class="form-control" name="pseudo" id="pseudoInscription" placeholder="Entrez votre pseudo" value="<?= (isset($_POST["pseudo"]) ? $_POST["pseudo"] : "") ?>" required />
            </div>
            <div class="form-group">
                <label for="email">Adresse mail :</label>
                <input type="email" class="form-control" name="email" id="emailInscription" placeholder="Saisissez votre adresse mail" value="<?= (isset($_POST["email"]) ? $_POST["email"] : "") ?>" required />
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe (8 caractères minimum):</label>
                <input type="password" class="form-control" name="mdp" id="mdpInscription" placeholder="Créer votre mot de passe" required />
            </div>
            <div class="form-group">
                <label for="verifMdp">Vérifier votre mot de passe :</label>
                <input type="password" class="form-control" name="verifMdp" id="verifMdpInscription" placeholder="Vérifier votre mot de passe" required />
            </div>

            <div class="form-group text-center mt-3">
                <button type="submit" class="button bouton_custom" name="envoi" id="envoi" value="1"">S'inscrire</button>
            </div>
        </form>
    </div>
</div>