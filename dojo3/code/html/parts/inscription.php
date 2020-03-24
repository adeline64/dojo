<?php
if (!empty($_SESSION['utilisateur'])) {
/*
 * Nous sommes dans le cas d'un utilsateur connect�
 */
?>

<p>

    <div class="jumbotron reser">
        <h1 class="display-4">Cher Client</h1>
<p class="lead">Vous êtes déja connecté</p>
<hr class="my-4">
<p></p>
<p class="lead">
    <a class="btn btn-reser btn-lg" href="?page=accueil" role="button">Accueil</a>
</p>
</div>
</p>

<?php
}else{
//debug($_POST);
if ( ! empty( $_POST ) ) {
	if ( ! isset(
        $_POST['nom'],
		$_POST['pseudo'],
		$_POST['email'],
        $_POST['password']
	) ) {
		echo "il manque une ou plusieurs donnees";

	} else {
		$managerUtilisateur = new ManagerUtilisateur();
		$managerUtilisateur->setDb( $db );
		$managerUtilisateur->add( $_POST );

		header("Location: index.php?page=connexion");
		exit();
	}

}

?>


<!-- NavBarre -->


<div class= "row align-items-start owl_inscrit">

    <div class= "col-12 col-md-8 ">
        <section class="page-section">
            <form action="?page=inscription" method="post">
            <div class="form-group">
                    <label for="pseudo"> Pseudo : </label><input type="text" class="form-control" aria-describedby="Pseudo" id="pseudo" name="pseudo" required="required">
                </div>

                <div class="form-group">
                    <label for="nom"> Nom : </label><input type="text" class="form-control" aria-describedby="nom" id="nom" name="nom" required="required">
                </div>

                <div class="form-group">
                    <label for="email"> e-mail : </label><input type="email" class="form-control" aria-describedby="email" id="email" name="email"required="required" >
                </div>
              
                <div class="form-group">
                    <label for="password"> Mot de passe : </label><input type="password" class="form-control" aria-describedby="password"  id="password" name="password" required="required">
                </div>
           
                <p>
                    <input type="submit" id="button" class="btn-inscrit" value="Inscription">
                </p>
            </form>
        </section>

        <p class="connect">Vous désirez vous connecter ? Rendez vous sur cette <a href="?page=connexion" name="page">
                page.
        </p>

    </div>
</div>

	<?php

}