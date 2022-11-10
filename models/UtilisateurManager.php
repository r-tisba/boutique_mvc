<?php

class UtilisateurManager extends BDD
{
    public function verifUniqueEmail($email)
    {
        $sql = "SELECT email FROM utilisateurs WHERE email = ?";
        $requete = $this->getBDD()->prepare($sql);
        $requete->execute([$email]);
        if ($requete->rowCount() > 0) {
            return false;
        }
        else {
            return true;
        }
    }
    public function getUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateurs";
        $select = $this->getBdd()->prepare($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getRoles() {
        $sql = "SELECT * FROM roles";
        $select = $this->getBdd()->prepare($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function getUtilisateurById($id)
    {
        $sql = "SELECT * FROM utilisateurs WHERE id = ?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$id]);
        return $select->fetch();
    }
    public function getSelectUtilisateurByEmail($email)
    {
        $sql = "SELECT * FROM utilisateurs WHERE email = ?";
        $select = $this->getBdd()->prepare($sql);
        $select->execute([$email]);
        return $select;
    }
    public function createUtilisateur($pseudo, $email, $mdp)
    {
        $sql = "INSERT INTO utilisateurs(pseudo, email, mdp) VALUES(?, ?, ?)";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$pseudo, $email, $mdp]);
        return true;
    }
    public function updateUtilisateur($id, $pseudo, $email, $role)
    {
        $sql = "UPDATE utilisateurs SET pseudo = ?, email = ?, role = ? WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$pseudo, $email, $role, $id]);
        return true;
    }
    public function deleteUtilisateur($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = ?";
        $requete = $this->getBdd()->prepare($sql);
        $requete->execute([$id]);
        return true;
    }
}
