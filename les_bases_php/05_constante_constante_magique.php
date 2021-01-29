<?php
echo '<hr><h2> CONSTANTE ET CONSTANTE MAGIQUE </h2>';

define("CAPITALE", "Paris"); // Par convention, une constante se déclare toujours en majuscule
echo CAPITALE; '<br>';


// Constante Magique
echo __FILE__ . "<br>"; //Affiche le chemin du fichier
echo __LINE__ . "<br>"; //Affiche le numéro de la ligne de code
// echo __FUNCTION__; Affiche le nom de la fonction dans laquelle nous sommes
// echo __CLASS__; Affiche le nom de la class dans laquelle on est 
// echo __METHOD__; Affiche le nom de la méthode dans laquelle on est 


?>