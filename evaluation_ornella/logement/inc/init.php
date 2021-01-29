<?php
// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=immobilier', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// var_dump($pdo);

// définition de constantes
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/php/evaluation/');  // chemin jusqu'au au dossier du site
define("URL", 'http://localhost/php/evaluation/');

// déclaration de variable
$content = '';
?>