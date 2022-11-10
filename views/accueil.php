<?php
if (empty($_SESSION)) {
?>
  <!-- MESSAGE D'ACCUEIL SI PAS CONNECTE -->
  <div class="divAccueil">
    <div class="card col-12 col-md-8 col-lg-5 bg-dark blanc br40">
      <section class="py-3 text-center container">
        <div class="row">
          <h1 class="fw-dark tLato t35 mb-0">Boutique</h1>
              <p class="lead my-2">Vous n'êtes pas connecté</p>
              <p>
                <a href="index.php?page=inscription" class="btn btn-outline-success mt-2">Inscription</a>
                <a href="index.php?page=connexion" class="btn btn-outline-primary mt-2">Connexion</a>
              </p>
        </div>
      </section>
    </div>
  </div>
<?php
} else {
?>
  <section class="py-3 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark">Boutique<h1>
            <p class="lead text-dark">Bienvenue <?= $_SESSION['pseudo']; ?> !</p>
      </div>
    </div>
  </section>
<?php
}
?>