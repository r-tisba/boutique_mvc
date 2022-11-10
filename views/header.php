<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Bootstrap 5 CS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/6200c1620f.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./design/style.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand tLato t20" href="index.php">Boutique</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php
        if (!empty($_SESSION)) {
        ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=liste_categories">Catégories</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=liste_produits">Produits</a>
            </li>
          </ul>
          <?php
          if ($_SESSION['idRole'] == '2') {
          ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=liste_utilisateurs">Utilisateurs</a>
              </li>
            </ul>
        <?php
          }
        }
        ?>

      </div>
      <?php
      if (!empty($_SESSION)) {
      ?>
        <div class="div-inline my-2 my-lg-0">
          <a class="nav-item active nav-link">
            <?php echo "Vous êtes connecté " . $_SESSION["pseudo"]; ?>
          </a>
        </div>
        <a class="btn btn-outline-danger ml-1" href="index.php?page=deconnexion">Se déconnecter</a>

      <?php
      } else {
      ?>
        <a class="btn btn-outline-success ms-auto" href="index.php?page=inscription">S'inscrire</a>
        <a class="btn btn-outline-primary ms-1" href="index.php?page=connexion">Se connecter</a>
      <?php
      }
      ?>
    </div>
  </nav>