<?php
    try {
	   $db = new PDO('mysql:host=localhost;dbname=dojo3;charset=utf8', 'root', 'toto',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
    	echo 'Connexion impossible:<br>'.$e->getMessage();
    	exit;
    }