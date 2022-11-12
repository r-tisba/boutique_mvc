<?php
class UtilisateurController extends UtilisateurManager
{
    public function ctrlDisplayAccueil()
    {
        ob_start();

        require 'views/accueil.php';

        $vue = ob_get_clean();
        return $vue;
    }
    public function ctrlGetUtilisateurs()
    {
        if ($this->isAdmin()) {
            ob_start();

            $this->saveLastUrl();
            $utilisateurs = $this->getUtilisateurs();

            require 'views/utilisateurs/index.php';
            $page = ob_get_clean();

            return $page;
        }
    }
    public function ctrlAddUtilisateur($post = null)
    {
        if ($this->isAdmin()) {
            ob_start();
            if ($post != null) {
                if (!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["verifMdp"])) {

                    $pseudo = $post['pseudo'];
                    $email = $post['email'];
                    $mdp = $post['mdp'];
                    $verifMdp = $post['verifMdp'];
                    $erreurs = [];

                    // Verification de la validité de l'email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $erreurs[] = "L'adresse email choisie n'est pas valide";
                    }
                    // Verification que l'email est unique
                    if ($this->verifUniqueEmail($email) == false) {
                        $erreurs[] = "L'adresse email saisie existe déjà";
                    }

                    // Vérification que le mot de passe fait au moins 8 caractères
                    if (strlen($mdp) < 8) {
                        $erreurs[] = "Le mot de passe doit faire au moins 8 caractères";
                    }
                    // Vérification que les 2 mots de passe correspondent
                    if ($mdp !== $verifMdp) {
                        $erreurs[] = "Les deux mots de passe saisies ne sont pas identiques";
                    }
                } else {
                    $erreurs[] = "Au moins un champ n'a pas été saisi";
                }

                if (count($erreurs) === 0) {
                    // On hash le mot de passe
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                    $this->createUtilisateur($pseudo, $email, $mdp);

                    $this->redirectNow('index.php?page=liste_utilisateurs');
                } else {
                    foreach ($erreurs as $erreur) {
                        echo
                        '<div class="alert alert-danger mt-3">' .
                            $erreur .
                            '</div>';
                    }
                }
            }

            require 'views/utilisateurs/formAjoutUti.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlUpdateUtilisateur($id, $post = null)
    {
        if ($this->isAdmin()) {
            ob_start();
            if ($post != null) {
                $pseudo = $post['pseudo'];
                $email = $post['email'];
                $role = $post['role'];
                $this->updateUtilisateur($id, $pseudo, $email, $role);

                header('Location: index.php?page=liste_utilisateurs');
            }

            $utilisateur = $this->getUtilisateurById($id);
            $roles = $this->getRoles();
            require 'views/utilisateurs/formUpdateUti.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlDeleteUtilisateur($id)
    {
        if ($this->isAdmin()) {
            ob_start();
            $this->deleteUtilisateur($id);
            header("Location: index.php?page=liste_utilisateurs");
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }

    // ---------------------------------------------- INSCRIPTION ----------------------------------------------
    public function ctrlInscription($post = null)
    {
        if (empty($_SESSION)) {
            ob_start();

            if ($post != null) {
                if (!empty($_POST["pseudo"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["verifMdp"])) {

                    $pseudo = $post['pseudo'];
                    $email = $post['email'];
                    $mdp = $post['mdp'];
                    $verifMdp = $post['verifMdp'];
                    $erreurs = [];

                    // Verification de la validité de l'email
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $erreurs[] = "L'adresse email choisie n'est pas valide";
                    }
                    // Verification que l'email est unique
                    if ($this->verifUniqueEmail($email) == false) {
                        $erreurs[] = "L'adresse email saisie existe déjà";
                    }

                    // Vérification que le mot de passe fait au moins 8 caractères
                    if (strlen($mdp) < 8) {
                        $erreurs[] = "Le mot de passe doit faire au moins 8 caractères";
                    }
                    // Vérification que les 2 mots de passe correspondent
                    if ($mdp !== $verifMdp) {
                        $erreurs[] = "Les deux mots de passe saisies ne sont pas identiques";
                    }
                } else {
                    $erreurs[] = "Au moins un champ n'a pas été saisi";
                }

                if (count($erreurs) === 0) {
                    // On hash le mot de passe
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                    $this->createUtilisateur($pseudo, $email, $mdp);

                    $this->redirectNow('index.php?page=accueil');
                } else {
                    foreach ($erreurs as $erreur) {
                        echo
                        '<div class="alert alert-danger mt-3">' .
                            $erreur .
                            '</div>';
                    }
                }
            }
            require 'views/utilisateurs/formInscription.php';

            $vue = ob_get_clean();
            return $vue;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    // ---------------------------------------------- CONNEXION ----------------------------------------------
    public function ctrlConnexion($post = null)
    {
        if (empty($_SESSION)) {
            ob_start();

            if ($post != null) {
                if (isset($_POST['email']) && isset($_POST['mdp'])) {

                    $email = $post['email'];
                    $mdp = $post['mdp'];
                    $erreurs = [];

                    // Verification de la validité de l'email rentré
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $erreurs[] = "L'adresse email choisi n'est pas valide";
                    }
                    $requete = $this->getSelectUtilisateurByEmail($email);
                    // Vérification si l'email existe
                    if ($requete->rowCount() > 0) {
                        $utilisateur = $requete->fetch();

                        // Vérifier si les mots de passe correspondent
                        if (!password_verify($mdp, $utilisateur['mdp'])) {
                            $erreurs[] = "L'adresse email ou le mot de passe sont erronées";
                        }
                    } else {
                        $erreurs[] = "L'adresse email ou le mot de passe sont erronées";
                    }
                } else {
                    $erreurs[] = "Au moins un champ n'a pas été saisi";
                }

                if (count($erreurs) === 0) {

                    $_SESSION["idUtilisateur"] = $utilisateur["id"];
                    $_SESSION["email"] = $email;
                    $_SESSION["pseudo"] = $utilisateur["pseudo"];
                    $_SESSION["idRole"] = $utilisateur["role"];
                    $_SESSION["last_url"] = "";

                    $this->redirectNow('index.php?page=accueil');
                } else {
                    foreach ($erreurs as $erreur) {
                        echo
                        '<div class="alert alert-danger mt-3">' .
                            $erreur .
                            '</div>';
                    }
                }
            }
            require 'views/utilisateurs/formConnexion.php';

            $vue = ob_get_clean();
            return $vue;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    // ---------------------------------------------- DECONNEXION ----------------------------------------------
    public function ctrlDeconnexion()
    {
        if (!empty($_SESSION)) {
            @session_start();
            // On détruit les variables de notre session
            session_unset();
            // On détruit la session
            session_destroy();
            $this->redirectNow('index.php?page=accueil');
        } else {
            header("Location: index.php?page=accueil");
        }
    }
}
