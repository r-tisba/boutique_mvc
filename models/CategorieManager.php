<?php
class CategorieManager extends BDD
{
    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $select = $this->getBdd()->prepare($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getCategorieById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$id]);
        return $select->fetch();
    }
    public function getCatByProduitId($id) {
        $sql = "SELECT ca.id, ca.nom FROM produits pr LEFT JOIN categories ca ON pr.categorie = ca.id WHERE pr.id = ?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$id]);
        return $select->fetch();
    }
    public function createCategorie($nom)
    {
        $sql = "INSERT INTO categories(nom) VALUES(?)";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$nom]);
        return true;
    }
    public function updateCategorie($id, $nom)
    {
        $sql = "UPDATE categories SET nom = ? WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$nom, $id]);
        return true;
    }
    public function deleteCategorie($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$id]);
        return true;
    }
}
