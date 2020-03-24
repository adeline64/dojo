<?php
if (!empty($_POST)) {
    echo '<br>$_POST non vide';
    echo '<br>Donnees envoyees:';
    echo '<pre>' . print_r($_POST, true) . '</pre>';



    $oManagerUtilisateur = new ManagerUtilisateur();
    $oManagerUtilisateur->setDb($db);
    //connexion de l'utilisateur
    $_SESSION['utilisateur'] = $oManagerUtilisateur->connecte($_POST['email'], $_POST['password']);

    //redirection
    header("Location: index.php?page=accueil");
    
}
?>


<section class="row align-items-start ">
    <article class="col-12 col-md-8 " style="margin: auto; margin-top: 3%;">
        <section class="page-section">
            <form action="?page=connexion" method="post">
                <div class="form-group">
                    <label for="mail"> E-mail : </label>
                    <input type="email" class="form-control" aria-describedby="Email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password"> Mot de passe : </label>
                    <input type="password" class="form-control" aria-describedby="password" id="password" name="password">
                </div>
                <p>
                    <input type="submit" name="Connexion" id="button" class="btn_connexion" value="Connexion">
                </p>
            </form>
        </section>
    </article>
</section>