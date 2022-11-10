<div class="container">
    <h1 class="tLato t50">Connexion</h1>
    <form method="post" id="connexionForm">
        <div class="col-12 text-center mb-4">
            <div class="card card_connexion">
                <div class="card-body">
                    <div class="div_inputs_login">
                        <div class="form-group mb-3">
                            <div class="div_input_icone_id">
                                <i class="far fa-user-circle icone_identifiant"></i>
                                <input type="email" class="form-control sombre" name="email" id="emailConnexion" placeholder="Adresse mail" value="<?= (isset($_POST["email"]) ? $_POST["email"] : "") ?>" required />
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="div_input_icone_mdp">
                                <i class="fas fa-lock icone_mdp"></i>
                                <input type="password" class="form-control sombre" name="mdp" id="mdpConnexion" placeholder="Mot de passe" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-0">
                        <button type="submit" class="button bouton_custom" name="envoi" id="envoi" value="1"">Se connecter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Empêche l'auto-completion du navigateur de modifier le css des btns
    setTimeout(() => {
        document.getElementById("email").value = "";
        document.getElementById("mdp").value = "";
    }, 550);
</script>