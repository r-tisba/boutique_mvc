<?php

class CategorieController extends CategorieManager
{
    public function ctrlGetCategories()
    {
        if ($this->isConnected()) {
            ob_start();

            $this->saveLastUrl();
            $categories = $this->getCategories();

            require 'views/categories/index.php';
            $page = ob_get_clean();

            return $page;
        }
    }

    public function ctrlAddCategorie($post = null)
    {
        if ($this->isAdmin()) {
            ob_start();

            if ($post != null) {
                $nom = $post['nomCat'];
                $this->createCategorie($nom);

                header("Location: index.php?page=liste_categories");
            }

            require 'views/categories/formAjoutCat.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlUpdateCategorie($id, $post = null)
    {
        if ($this->isAdmin()) {
            ob_start();

            if ($post != null) {
                $nom = $post['nomCat'];
                $this->updateCategorie($id, $nom);

                header('Location: index.php?page=liste_categories');
            }

            $categorie = $this->getCategorieById($id);
            require 'views/categories/formUpdateCat.php';
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
    public function ctrlDeleteCategorie($id)
    {
        if ($this->isAdmin()) {
            ob_start();

            $this->saveLastUrl();
            $this->deleteCategorie($id);
            header("Location: index.php?page=liste_categories");
            $page = ob_get_clean();

            return $page;
        } else {
            header("Location: index.php?page=accueil");
        }
    }
}
