<?php

    error_reporting(E_ALL);

    //Autoload charg� AVANT la session pour cr�er les objets stock�s en session
    require_once 'include/autoload.php';

    /*
     * MODE DEBUG:
     *      - 1: actif
     *      - 0: inactif
     */
    define('_DEBUG_',1);
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);

    //Les fonctions communes
    require_once 'include/functions.php';

    // On demarre la session
    session_start();

    //la connexion � la base
    require_once 'include/DBConnexion.php';

    // if (!empty($_SESSION)) {
    //     debug($_SESSION);
    // }

    if (array_key_exists("initsession", $_POST)) {
        $_SESSION = array();
        debug($_SESSION);
    }
?>

<!-- header -->

<?php
    include_once "code/html/templates_part/head.php"
?>

<body>

  

<!-- contenu -->


    <?php
        include_once "code/html/templates_part/header.php";
    ?>

<section class="container">

    <?php

    include_once "include/route.php";

    ?>

</section>

<!-- footer -->

    <?php
    include_once "code/html/templates_part/footer.php";
    ?>




</body>
</html>