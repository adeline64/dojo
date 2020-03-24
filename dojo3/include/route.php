<?php

if (empty($_SESSION['utilisateur'])) {
	   if (!empty($_GET['page'])&& $_GET['page'] == 'articles')
		{ include_once "code/html/parts/articles.php"; }
		else if (!empty($_GET['page'])&& $_GET['page'] == 'article')
	    { include_once "code/html/parts/article.php";}
	    else if (!empty($_GET['page'])&& $_GET['page'] == 'categorie')
	    { include_once "code/html/parts/categorie.php";}
	    else if (!empty($_GET['page'])&& $_GET['page'] == 'connexion')
	    { include_once "code/html/parts/connexion.php"; }
	    else if (!empty($_GET['page'])&& $_GET['page'] == 'inscription')
	    { include_once "code/html/parts/inscription.php";}
	    else { //par defaut accueil
		    include_once "code/html/parts/accueil.php"; }
    }else{
	    //connecte
	    if (!empty($_GET['page'])&& $_GET['page'] == 'articles')
		{ include_once "code/html/parts/articles.php"; }
		else if (!empty($_GET['page'])&& $_GET['page'] == 'article')
		{ include_once "code/html/parts/article.php";}
	    else if (!empty($_GET['page'])&& $_GET['page'] == 'categorie')
	    { include_once "code/html/parts/categorie.php";}
	    else if (!empty($_GET['page'])&& $_GET['page'] == 'deconnexion')
	    { include_once "code/html/parts/deconnexion.php";}
	    else { //par defaut accueil
		    include_once "code/html/parts/accueil.php"; }
    }