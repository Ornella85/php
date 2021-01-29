<?php
echo '<hr><h2> STRUCTURES CONDTIONNELLES (if/else) - Opérateurs de comparaison </h2>';

// isset & empty 
// empty = sert à tester si quelque chose est vide --- isset = teste si c'est définie

$var1 = 0;
$var2 = "";
if(empty($var1)) echo 'ta variable contient 0, vide ou non définie';
if(isset($var2)) echo ' <br> $var2 existe et est définie par rien '; // elle est vide mais, elle existe


 // IF, ELSE, ELSEIF et opérateurs de comparaison
 $a = 10; $b = 5; $c = 2;
 if($a > $b) // si A est sup à B
 {
     echo "<br> A est bien supérieur à B <br>"; // bonne condition
 }
 else // sinon
 {
     echo " Non, A n'est pas sup à B";
 }

 // ----- 
 if($a > $b && $b > $c) // si A est sup à B et B est sup à C
 {
     echo ' ok pour les deux conditions <br>';
 }

 if($a == 9 || $b > $c) // si A contient 9 OU B est supérieur à C
 {
    echo "Au moins une condition est bonne"; // bonne condition
 }
 else{
     echo "Aucune condition n'est bonne";
 }

 // ----- 
 if($a == 8) // le double égal == permet de vérifier une information à l'intérieur d'une variable
 {
     echo "1 - A est égal à 8"; // ne sera pas affiché car $a n'est pas égal à 8.
 }
 elseif( $a != 10) // Sinon Si A est différent de 10. N'affiche toujours pas car la condition n'est remplie
 {
     echo "2- A est différent de 10 <br>"; // ne sera pas affiché car $a n'est pas différent de 10
 }
 else // Sinon, c'est que je ne suis ni tombé dans le if, ni dans le sinon si, je me trouve dans le else
 {
    echo "<br> 3 - Tout le monde a faux <br>"; // c'est cet echo qui sera affiché car les deux conditions précédentes n'étaient pas exactes
 }

 // ----- 
 if($a == 10 XOR $b == 6) // XOR : seulement et uniquement l'une des conditions doti être valide
 {
     echo 'ok bonne condition'; // si les deux conditions sont bonnes ou , les deux conditions sont mauvaises, l'echo ne sera pas affiché.
 }

 
?>