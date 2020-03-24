<?php


	$managerArticle = new ManagerArticle();
	$managerArticle->setDb($db);
	$lesArticles = $managerArticle->getAllArticle();
	// echo '<pre>'.print_r($lesArticles,true).'</pre>';


	// var_dump($lesArticles);

	foreach ($lesArticles as $article) {


?>

		<article>
			<h3>Titre : <?= $article->getTitre(); ?></h3>
			<p>Description : <?= $article->getContenu(); ?></p>
			<a href="?page=article&id=<?= $article->getId() ?>">
				<img src="assets/image/<?php echo $article->getImage(); ?>" style="width: 50%;" />
		</a><br />
		<br>
		</article>

<?php
	}
