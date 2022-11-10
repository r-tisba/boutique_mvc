<?php

require_once 'services/Bdd.php';
require_once 'views/header.php';

require_once 'services/Autoload.php';
// Appel automatiquement tout les fichiers nécessaires
Autoload::load();

?>
<div class="container mtop">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {

            case 'accueil':
                $ctrl = new UtilisateurController();
                echo $ctrl->ctrlDisplayAccueil();
                break;

                // ---------------------------------------------- SESSION ----------------------------------------------
            case 'inscription':
                $ctrl = new UtilisateurController();
                if (!empty($_POST)) {
                    echo $ctrl->ctrlInscription($_POST);
                } else {
                    echo $ctrl->ctrlInscription();
                }
                break;
            case 'connexion':
                $ctrl = new UtilisateurController();
                if (!empty($_POST)) {
                    echo $ctrl->ctrlConnexion($_POST);
                } else {
                    echo $ctrl->ctrlConnexion();
                }
                break;
            case 'deconnexion':
                $ctrl = new UtilisateurController();
                echo $ctrl->ctrlDeconnexion();
                break;

                // ---------------------------------------------- CATÉGORIES ----------------------------------------------
            case 'liste_categories':
                $ctrl = new CategorieController();
                echo $ctrl->ctrlGetCategories();
                break;
            case 'ajout_cat':
                $ctrl = new CategorieController();
                if (!empty($_POST)) {
                    echo $ctrl->ctrlAddCategorie($_POST);
                } else {
                    echo $ctrl->ctrlAddCategorie();
                }
                break;
            case 'update_cat':
                $ctrl = new CategorieController();
                if (!empty($_GET['cat'])) {
                    if (!empty($_POST)) {
                        echo $ctrl->ctrlUpdateCategorie($_GET['cat'], $_POST);
                    } else {
                        echo $ctrl->ctrlUpdateCategorie($_GET['cat']);
                    }
                }
                break;
            case 'delete_cat':
                $ctrl = new CategorieController();
                if (!empty($_GET['cat'])) {
                    echo $ctrl->ctrlDeleteCategorie($_GET['cat']);
                }
                break;

                // ---------------------------------------------- PRODUITS ----------------------------------------------
            case 'liste_produits':
                $ctrl = new ProduitController();
                echo $ctrl->ctrlGetProduits();
                break;

            case 'produits_cat':
                // Liste les produits d'une catégorie
                $ctrl = new ProduitController();
                echo $ctrl->ctrlGetProduitByCatId($_GET['cat']);
                break;
            case 'ajout_produit':
                $ctrl = new ProduitController();
                if (!empty($_POST)) {
                    echo $ctrl->ctrlAddProduit($_POST);
                } else {
                    echo $ctrl->ctrlAddProduit();
                }
                break;
            case 'update_produit':
                $ctrl = new ProduitController();
                if (!empty($_GET['produit'])) {
                    if (!empty($_POST)) {
                        echo $ctrl->ctrlUpdateProduit($_POST);
                    } else {
                        echo $ctrl->ctrlUpdateProduit();
                    }
                }
                break;
            case 'delete_produit':
                $ctrl = new ProduitController();
                if (!empty($_GET['produit'])) {
                    echo $ctrl->ctrlDeleteProduit($_GET['produit']);
                }
                break;

                // ---------------------------------------------- UTILISATEURS ----------------------------------------------
            case 'liste_utilisateurs':
                $ctrl = new UtilisateurController();
                echo $ctrl->ctrlGetUtilisateurs();
                break;
            case 'ajout_utilisateur':
                $ctrl = new UtilisateurController();
                if (!empty($_POST)) {
                    echo $ctrl->ctrlAddUtilisateur($_POST);
                } else {
                    echo $ctrl->ctrlAddUtilisateur();
                }
                break;
            case 'update_utilisateur':
                $ctrl = new UtilisateurController();
                if (!empty($_GET['uti'])) {
                    if (!empty($_POST)) {
                        echo $ctrl->ctrlUpdateUtilisateur($_GET['uti'], $_POST);
                    } else {
                        echo $ctrl->ctrlUpdateUtilisateur($_GET['uti']);
                    }
                }
                break;
            case 'delete_utilisateur':
                $ctrl = new UtilisateurController();
                if (!empty($_GET['uti'])) {
                    echo $ctrl->ctrlDeleteUtilisateur($_GET['uti']);
                }
                break;

                // ---------------------------------------------- DEFAULT ----------------------------------------------
            default:
                $ctrl = new UtilisateurController();
                echo $ctrl->ctrlDisplayAccueil();
                break;
        }
    } else {
        header("Location: index.php?page=accueil");
    }

    ?>

</div>
</body>

</html>