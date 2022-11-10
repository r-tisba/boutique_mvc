<?php

class ProduitController extends ProduitManager
{
    public function ctrlGetProduits() {
        ob_start();

        $produits = $this->getProduits();
        require 'views/produits/index.php';

        $vue = ob_get_clean();
        return $vue;
    }
    public function ctrlGetProduitByCatId($id)
    {
        ob_start();

        $produits = $this->getProduitByCatId($id);
        $categorieModel = new CategorieManager();
        $categorie = $categorieModel->getCategorieById($id);
        require 'views/produits/listeByCat.php';

        $vue = ob_get_clean();
        return $vue;
    }

    public function ctrlAddProduit($post = null)
    {
        if ($this->isAdmin()) {
            ob_start();
            if ($post != null) {
                var_dump($post);
                $nom = $post['nom'];
                $description = $post['desc'];
                $quantite = $post['qte'];
                $prix = $post['prix'];
                $categorie = $post['cat'];
                $this->ajoutProduit($nom, $description, $quantite, $prix, $categorie);

                header("Location: index.php?page=produits_cat&cat=$categorie");
            } else {

                $categorieModel = new CategorieManager();
                $categorie = $categorieModel->getCategorieById($_GET['cat']);
                require 'views/produits/formAjoutProduit.php';
            }
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlUpdateProduit($post = null)
    {
        if ($this->isAdmin()) {
            ob_start();

            $categorieModel = new CategorieManager();
            if ($post != null) {
                $idProduit = $_GET['produit'];
                $nom = $post['nom'];
                $description = $post['desc'];
                $quantite = $post['qte'];
                $prix = $post['prix'];
                $categorie = $post['cat'];
                $this->updateProduit($idProduit, $nom, $description, $quantite, $prix, $categorie);

                header("Location: index.php?page=produits_cat&cat=$categorie");
            }

            $produit = $this->getProduitById($_GET['produit']);
            $categories = $categorieModel->getCategories();
            require 'views/produits/formUpdateProduit.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlDeleteProduit($id)
    {
        if ($this->isAdmin()) {
            ob_start();
            $categorieModel = new CategorieManager();
            $categorieArray = $categorieModel->getCatByProduitId($id);
            $categorie = $categorieArray['id'];
            $this->deleteProduit($id);
            header("Location: index.php?page=produits_cat&cat=$categorie");
            // require 'views/marques/index.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
}
