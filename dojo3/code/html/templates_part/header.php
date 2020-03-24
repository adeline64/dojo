<?php

if (!empty($_SESSION['utilisateur'])) {
  /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */
?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand">Mon Super Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="?page=accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=articles">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=deconnexion">Déconnexion</a>
        </li>
      </ul>
      <div class="utilisateur">
        <?php
        echo strtoupper($_SESSION['utilisateur']->getNom());
        ?>
      </div>
  </nav>
<?php

} else {
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Mon Super Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="?page=accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=articles">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=inscription">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=connexion">Connexion</a>
        </li>

      </ul>
  </nav>
<?php
}
