<?php

if (!empty($_SESSION['utilisateur'])) {
	/*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */
?>


<div class="row align-items-start">
    <div class="col-12 col-md-12 ">

    <article>
        <h2>
            Bienvenue.
        </h2>
        <p>
            Félicitation pour vous être connecté
        </p>
    </article>
        
 
    </div>
</div>

<?php

}else{
?>
<article>
        <h2>
            Bienvenue.
        </h2>
        <p>
            Malheureusement, vous n'êtes pas encore connecté. Rendez vous ici : <a href="page=connexion">Connexion</a>
        </p>
    </article>
<?php

}