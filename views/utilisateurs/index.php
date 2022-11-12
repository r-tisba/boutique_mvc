<h1 class="tLato t35">Liste des utilisateurs : </h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col-1">Pseudo</th>
            <th scope="col-10">Email</th>
            <th scope="col-4">Rôle</th>

            <?php if ($_SESSION['idRole'] == '2') { ?>
                <th scope="col">Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>

        <?php
        if (!empty($utilisateurs)) {
            foreach ($utilisateurs as $utilisateur) {
        ?>
                <tr>
                    <td><?= $utilisateur['pseudo']; ?></td>
                    <td><?= $utilisateur['email']; ?></td>
                    <td><?= $utilisateur['role'] == 1 ? 'Utilisateur' : 'Admin'; ?></td>

                    <?php if ($_SESSION['idRole'] == '2') { ?>
                        <td>
                            <a class="me-1" href="index.php?page=update_utilisateur&uti=<?= $utilisateur['id']; ?>"><i class="fa fa-solid fa-pen updateIcon" aria-hidden="true"></i></a>
                            <?php
                            if ($utilisateur['id'] != $_SESSION['idUtilisateur']) {
                            ?>
                                <a href="index.php?page=delete_utilisateur&uti=<?= $utilisateur['id']; ?>"><i class="fa fa-solid fa-trash deleteIcon" aria-hidden="true" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"></i></a>
                            <?php
                            }
                            ?>
                        </td>
                    <?php } ?>
                </tr>
        <?php
            }
        } else {
            echo '<div class="alert alert-danger mt-3">Il n\'y a aucun utilisateur</div>';
        }
        ?>
    </tbody>
</table>
<a href="index.php?page=ajout_utilisateur" class="noir"><i class="fa fa-solid fa-plus me-2"></i>Ajouter un utilisateur</a>