<?php
// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//var_dump($pdo);

//----------------------
//ouverture de session
session_start();


// définition de constantes
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/php/site/');  // chemin jusqu'au au dossier du site
define("URL", 'http://localhost/php/site/');
define("RL", 'http://localhost/php/site/admin/');

// déclaration de variable
$content = '';

//-----------------
//inclusion des fichiers
require_once('fonction.php');

?>