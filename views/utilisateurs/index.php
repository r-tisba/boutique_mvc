<h1 class="tLato t25">Liste des utilisateurs : </h1>

<?php
if (!empty($utilisateurs)) {
    foreach ($utilisateurs as $utilisateur) {
?>
        <div class="rowMarques">
            <div>
                <?= $utilisateur['pseudo'] . ' / ' . $utilisateur['email'] . ' / '; ?>
                <?= $utilisateur['role'] == '1' ? 'Utilisateur' : 'Admin'; ?>
            </div>
            <div>
                <a class="me-1" href="index.php?page=update_utilisateur&uti=<?= $utilisateur['id']; ?>"><i class="fa fa-solid fa-pen updateIcon" aria-hidden="true"></i></a>
                <?php
                if ($utilisateur['id'] != $_SESSION['idUtilisateur']) {
                ?>
                    <a href="index.php?page=delete_utilisateur&uti=<?= $utilisateur['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"></i></a>
                <?php
                }
                ?>
            </div>
        </div>
        <hr>
<?php
    }
} else {
    echo '<div class="alert alert-danger mt-3">Il n\'y a aucun utilisateur</div>';
}
?>

<a href="index.php?page=ajout_utilisateur"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un utilisateur</a>
