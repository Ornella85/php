<style>
h2{
    margin: 0;
    font-size: 15px;
    /* color: red; */
}
</style>


<?php
echo '<hr><h2>VARIABLES<h2><hr>';

// VARIABLE : Espace nommé qui permet de stocker une valeur

// Déclaration d'une variable avec $
$a = 123; // Affectation de la valeur 123 dans la variable nommée "a"

// Le type de la variable avec gettype()
echo gettype($a); // Affiche integer = nombre
echo '<br>';

$b = 12.3;
echo gettype($b); // Affiche double = nombre à virgule
echo '<br>';

$c = "texte";
echo gettype($c); //Affiche string
echo '<br>';

$d = '123';
echo gettype($d); //Affiche string
echo '<br>';

$f = true; // ou false à utiliser dans une condition != de NULL
echo gettype($f); //Affiche Boolean
echo '<br>';

$a = 130; // Réaffecte/Écrase la valeur précédente de la variable $a
echo ($a);
echo '<br>';

$prenom = 'David';
// s'écrit en minuscule
// ne pas commencer par un chiffre

echo "<br> Bonjour, je m'appelle $prenom"; // " " double quotes pour afficher la variable. En quotes classiques ' ' : le programme considère le contenu comme uen chaîne de caractères.
echo "<br> Bienvenue $prenom";
echo "<br> J'ai stocké ma valeur $prenom dans une variable";


// ASSIGNATION
echo '<hr><h2> ASSIGNATION par référence</h2><hr>';
echo '<br>';

echo "$a"; // posséde toujours la valeur précédente càd 130

$a = '<br> Salut';
echo "$a"; // Valeur d'affectation Écrase la valeur précédente
echo '<br>';

$a = 'salut';
$b = $a;
echo $a;
echo '<br>';
echo $b;

echo '<br>';
$b = 123;
// $b = &$a ; //ici  on met en commentaire, la valeur de la variable change 
             // & assignation par référence $a et $b
echo $b; //Affiche salut et non pas 123. (si $a change, $b change aussi)


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Exercices Variable </h2>';

// Exercice : Affichez Bleu-Blanc-Rouge (avec les tirets) en mettant chaque couleur dans une variable

$couleurb = 'Bleu';
$couleurj= 'Blanc';
$couleurr = 'Rouge';

echo $couleurb . "-" . $couleurj . "-" . $couleurj;
// ou
echo "$couleurb-$couleurj-$couleurr";