<?php

//-------------------------------- CONNEXION BDD ---------------------------------------------------
$pdo = new PDO('mysql:host=localhost;dbname=immobilier', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//--------------------------------- SESSION --------------------------------------------------------
// session_start();

//-------------------------------- CHEMIN ----------------------------------------------------------
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/evaluation-intermediaire/");
// cette constatante retourne le chemin physique su dossier "site_e_commerce" sur le serveur
// lors de l'enregistrement d'images/photos, nous aurons besoin du chemin complet du dossier photo pour enregistrer la photo
//echo RACINE_SITE . "<br>";

//echo $_SERVER['DOCUMENT_ROOT']; // retourne le chemin physique du dossier 'htdocs' du serveur

define("URL", "http://localhost/evaluation-intermediaire/");
//echo URL;
// cette constante servira à définir , par exemple, les liens de notre menu, le jour ou l'on mets le site en ligne, on modifiera seulement la constante URL et non tout les liens du menu

//----------------------------------- VARIABLES-----------------------------
$erreur_cp = '';
$erreur_surface = '';
$erreur_prix = '';
$erreur_obligatoire = '';
$valide = '';

$empty_cp = '';
$empty_adresse = '';
$empty_ville = '';
$empty_prix = '';
$empty_surface = '';
$empty_titre = '';
$empty_type = '';
// --------------------------------- INCLUSION ----------------------------------------------------------------
require_once("functions.php"); // require_once() permet d'importer le ficher fonction.php directement dans le fichier init.php

?>