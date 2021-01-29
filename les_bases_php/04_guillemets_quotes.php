<?php

echo '<hr><h2> GUILLEMETS ET LES QUOTES </h2>';

$message = 'Ajourd\'hui'; // anti-slash pour échapper et qui permet de continuer la chaîne de caractère. ou bien "aujourd'hui" avec des guillemets et pas de quotes
$text = "Bonjour !";
echo $text . " tout le monde <br> "; // le point . représente la concaténation
echo "$text tout le monde <br>"; // Affichage dans des guillemets, la variable est évaluée
//echo '$text tout le monde'; Ne fonctionne pas. Ne reconnaît pas $text comme étant une variable.


?>