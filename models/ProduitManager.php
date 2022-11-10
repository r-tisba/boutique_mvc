<?php

class ProduitManager extends BDD
{
    public function getProduits() {
        $sql = "SELECT pr.id, pr.nom, description, quantite, prix, pr.categorie, ca.nom nomCat FROM produits pr LEFT JOIN categories ca ON pr.categorie = ca.id";
        $select = $this->getBdd()->prepare($sql);
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
    // Récupère la liste des produits selon la catégorie reçue
    public function getProduitByCatId($idCat)
    {
        $sql = "SELECT * FROM produits WHERE categorie = ?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$idCat]);
        return $select->fetchAll();
    }
    public function getProduitById($id)
    {
        $sql = "SELECT * FROM produits WHERE id =?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$id]);
        return $select->fetch();
    }
    public function ajoutProduit($nom, $description, $quantite, $prix, $categorie)
    {
        $sql = "INSERT INTO produits(nom, description, quantite, prix, categorie) VALUES(?, ?, ?, ?, ?)";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$nom, $description, $quantite, $prix, $categorie]);
        return true;
    }
    public function updateProduit($id, $nom, $description, $quantite, $prix, $categorie)
    {
        $sql = "UPDATE produits SET nom = ?, description = ?, quantite = ?, prix = ?, categorie = ? WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$nom, $description, $quantite, $prix, $categorie, $id]);
        return true;
    }
    public function deleteProduit($id)
    {
        $sql = "DELETE FROM produits WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$id]);
        return true;
    }
}
