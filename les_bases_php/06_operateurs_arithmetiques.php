<?php
echo '<hr><h2> Opérateurs Arithmétiques </h2>';

$a =10; $b = 2;
echo $a + $b . "<br>"; // Affiche 12

echo $a - $b . "<br>"; // Affiche 8

echo $a * $b . "<br>"; // Affiche 20

echo $a / $b . "<br>"; // Affiche 5


//Opération  /Affectation
$a = 10; $b = 2; 

$a += $b; // équivaut à $a = $a + $b, 12
echo $a . "<br>";

$a -= $b; // équivaut à $a = $a - $b, en sachant que $a vaut désormais 12 : Affiche 10
echo $a . "<br>";

$a *= $b; // équivaut à $a = $a * $b, sachant que $a vaut désormais 10 : Affiche 20
echo $a . "<br>";

$a /= $b; //équivaut à $a = $a / $b, sachant que $a vaut désormais 20 : Affiche 10
echo $a . "<br>";


?>