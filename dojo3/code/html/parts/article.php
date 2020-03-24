<?php
if (!isset($_GET['id'])) {
    $idArticle = $_POST['id_article'];
} else {
    $idArticle = $_GET['id'];
}


//même non connecté on peut lire le blog
$managerArticle = new ManagerArticle();
$managerArticle->setDb($db);
$article = $managerArticle->getArticle($idArticle);


$managerCommentaire = new ManagerCommentaire();
$managerCommentaire->setDb($db);
$lescommentaires = $managerCommentaire->getAllCommentaire();

//si on est connecté on peut ajouter un commentaire
if (!empty($_SESSION['utilisateur'])) {
    if (!empty($_POST)) {
        //verification donnees
        if (!isset($_POST['titre']) || !isset($_POST['datePublication']) || !isset($_POST['contenu'])) {
            //ERREUR
            echo "il manque une ou plusieurs donnees";
        } else {
            //ajout nouveau commm
            $managerCommentaire->add($_POST);

            //recup tous comm pour réaffichage
            $lescommentaires = $managerCommentaire->getAllCommentaire();
        }
    }
}

?>

<article>
    <h2>
        titre : <?= $article->getTitre(); ?>
    </h2>
    <p>date : <?= $article->getDatePublication(); ?></p>
    <img src="assets/image/<?php echo $article->getImage(); ?>" style="width: 50%;" />
    <p><?= $article->getContenu(); ?></p>
</article>

<section class="row align-items-start ">
    <article class="col-12 col-md-8 " style="margin: auto; margin-top: 3%;">
        <section class="page-section">
            <form action="?page=article" method="post">
                <input type="hidden" name="id_article" value="<?= $article->getId(); ?>" />
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
                    <input type="submit" name="valider" id="button" value="valider">
                </p>
            </form>
        </section>
    </article>
</section>
<hr>
<h2>Commentaires : </h2>
<br>
<?php
if (count($lescommentaires) == 0) {
    echo 'Soyez le premier a commenter !!!';
} else {
    foreach ($lescommentaires as $commentaire) {
?>

        <commentaire>
            <h4>Titre : <?= $commentaire->getTitre(); ?></h4>
            <p>Date : <?= $commentaire->getDatePublication(); ?></p>
            <h5>Commentaire : <?= $commentaire->getContenu(); ?></h5>
            <hr>
        </commentaire>

<?php
    }
}
?>