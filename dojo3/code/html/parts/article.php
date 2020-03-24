<?php

if (!empty($_SESSION['utilisateur'])) {
	/*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */



    $managerArticle = new ManagerArticle();
    $managerArticle->setDb($db);
    $article = $managerArticle->getArticle($_GET['id']);

    $managerCommentaire = new ManagerCommentaire();
    $managerCommentaire->setDb($db);
    $lescommentaires = $managerCommentaire->getAllCommentaire();


    

?>

    <article>
        <h2>
            titre : <?= $article['titre']; ?>
        </h2>
        <p>date : <?= $article['datePublication']; ?></p>
            <img src="assets/image/<?php echo $article['image']; ?>" style="width: 50%;" />
            <p><?= $article['contenu']; ?></p> 
    </article>

<a href="?page=commentaire">Poster un commentaire </a>
    
<h2>Commentaires : </h2>
<br>

<?php
    foreach ($lescommentaires as $commentaire) {
?>

<article>
            <h4>Titre : <?= $commentaire->getTitre(); ?></h4>
            <p>Date : <?= $commentaire->getDatePublication(); ?></p>
			<h5>Description : <?= $commentaire->getContenu(); ?></h5>
		<br>
		</article>

<?php
    }
}else{

    $managerArticle = new ManagerArticle();
    $managerArticle->setDb($db);
    $article = $managerArticle->getArticle($_GET['id']);

    $managerCommentaire = new ManagerCommentaire();
    $managerCommentaire->setDb($db);
    $lescommentaires = $managerCommentaire->getAllCommentaire();

?>
<article>
        <h2>
            titre : <?= $article['titre']; ?>
        </h2>
        <p>date : <?= $article['datePublication']; ?></p>
            <img src="assets/image/<?php echo $article['image']; ?>" style="width: 50%;" />
            <p><?= $article['contenu']; ?></p> 
    </article>

    <?php
    foreach ($lescommentaires as $commentaire) {
?>

<article>
            <h4>Titre : <?= $commentaire->getTitre(); ?></h4>
            <p>Date : <?= $commentaire->getDatePublication(); ?></p>
			<h5>Description : <?= $commentaire->getContenu(); ?></h5>
		<br>
		</article>

<?php
}
}

