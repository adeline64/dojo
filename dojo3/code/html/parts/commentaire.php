<?php

//Traitement si on envoie le formulaire
if (!empty($_POST)) {
	//verification donnees
	if ( ! isset($_POST['titre'],$_POST['datePublication'],$_POST['contenu'])) {
		//ERREUR
		echo "il manque une ou plusieurs donnees";
	} else {
		$managerCommentaire = new ManagerCommentaire();
$managerCommentaire->setDb($db);
		$managerCommentaire->add( $_POST );
	}
}


?>

<section class="row align-items-start ">
    <article class="col-12 col-md-8 " style="margin: auto; margin-top: 3%;">
        <section class="page-section">
            <form action="?page=commentaire" method="post">
                <div class="form-group">
                    <label for="titre"> Titre </label>
                    <input type="text" class="form-control" aria-describedby="titre" id="titre" name="titre">
                </div>
                <div class="form-group">
                    <label for="contenu"> Description : </label>
                    <input type="text" class="form-control" aria-describedby="description" id="contenu" name="contenu">
                </div>
                <div class="form-group">
                    <label for="date"> date : </label>
                    <input type="date" class="form-control" aria-describedby="date" id="datePublication" name="datePublication">
                </div>
                <p>
                    <input type="submit" name="valider" id="button"  value="valider">
                </p>
            </form>
        </section>
    </article>
</section>