<?php
echo '<hr><h2> CONCATENATION </h2>';

$x = "bonjour";
$y = "tout le monde";
echo $x . ' ' . $y . "<br>"; // . même fonction que + dans js. c'est la concaténation
                             // on peut la traduire par "suivi de "
echo "$x $y <br>"; // même chose mais, sans concaténation

echo $x . ",Salut " . $x . ' ' . $y;
echo "Salut, " . $x . ' ' . $y;

echo "<br> Salut ", $x, ' ', $y; // Concaténation avec, . la virgule et le point sont similaires



echo '<hr><h2> CONCATENATION lors de l\'affectation</h2>';

$prenom1 = "Ornella"; //Affectation de la variable ornella sur la variable $prenom1
$prenom1 = 'Tata'; // Affectation de la variable Tata sur la variable $prenom1.. cela remplace Ornella à Tata
echo $prenom1 . '<br>'; // Affiche : Tata

$prenom2 = "Laura"; // Affectation de la valeur 'laura' sur la variable $prenom2
$prenom2 .= "Tutu"; // .= suivi d'affectation de la valeur tutu sur la variable $prenom2.. cela l'ajoute sans la remplacer la valeur récédente grâce ) l'opérateur .=
echo $prenom2; // Affiche = Laura Tutu

?>