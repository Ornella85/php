<?php 
//Ecrire une fonction qui permet de retourner le pourcentage en lui donnant en paramètre 3%, 100% ou 3/88
// function pourcentage($pourcent)
// {
//     return $pourcent * 0.03 ;
// }
// echo pourcentage(88);
// echo '<br>';

// function pourcentag($nombre, $nbr)
// {
//     return $nombre * ($nbr / 100);
// }
// echo pourcentag(88, 3);
// echo '<br>';

//CORRECTION
function calculPourcentage($nbre1, $nbre2)
{
    $resultat = $nbre1/$nbre2*100;
    return $resultat . "%";
}
echo $pourcent = calculPourcentage(3, 88);
echo '<br>';

//Ecrire une fonction qui stock trois (ou plus) chaines de caratère avec des minuscules et des majuscules dans un tableau, 
// et afficher chaque entrée avec leur index et seulement avec la première lettre du premier mot de chaque entrée en majuscule

// $maj = ["tartine", "pain", "beurre"];
// function pourcentage()
// {
   
//     foreach(func_get_args() as $indice => $element) 
//   {
//       echo $indice. "->". ucfirst(strtolower($element)). "<br>"; 
//   }
// }

// echo '<br>';
// pourcentage("tartine", "pain", "beurre");

//CORRECTION
$tabch = array("tartine", "pain", "beurre");
function initmaj($tab)
{
    foreach($tab as $ind=>$val) 
      {
          $tab[$ind]=ucfirst(strtolower($val));
      } return $tab;

    }
print_r(initmaj($tabch));
echo '<br>';
// echo '<br>';


//Ecrire une fonction qui permet d'afficher un input, dont on lui passe en parametre les attributs name et type
// function input($name, $type)
// {
// return "<input $type. 'text' $name . 'name'>";
// }
// echo '<br>';
// echo input("name", "text");

function formulaire($name, $type) {
    return '<input type="' . $type . '" name="' . $name . '"><br>';
}
echo formulaire("name", "text");
echo formulaire("name", "password");
echo formulaire("submit", "submit");

// Ecrire une fonction qui renvoit la première lettre de chaque mot (acronyme) contenue dans une variable

$voiture = ["Audi"];
$voiture = ["Renault"];
$voiture = ["Mazda"];
function lettre()
{
    foreach(func_get_args() as $element) 
    {
        echo substr($element, 0, 1). "<br>"; 
    }
}
echo '<br>';
lettre("Audi", "Renault", "Mazda");


//CORRECTION
function acronyme($chaine)
{
$resultats = '';
$chaine = explode(" ", $chaine);
foreach($chaine as $mot){
    $resultats .= strtoupper($mot[0]);
} 
return $resultats;
} 
$chaine = "Ecole du Web";
echo acronyme($chaine);
echo '<br>';


// Ecrire une fonction qui affiche une image avec sa taille en parametre

function afficheImg($img, $w){
    return '<img src="'. $img .'"width="'. $w . '"><br>';
}
echo afficheImg("image/abeille.jpg", 300);

// function image($lien, $largeur, $hauteur) {
//     return '<img src="'. $lien . '"  width="' . $largeur . '"  height="' . $hauteur .'"><br>';
// }
// echo image("image/abeille.jpg", 300, 150);


// Ecrire une fonction qui génère un tableau d'un nombre de ligne égale à une valeur écrite dans une variable et passée 
// en paramètres, remplis de nombres aléatoires de 0 jusqu'à la valeur choisie (param)
echo '<br>';
16 h 57
function acronyme($chaine)
{
$resultats = '';
$chaine = explode(" ", $chaine);
foreach($chaine as $mot){
    $resultats .= strtoupper($mot[0]);
} 
return $resultats;
} 
$chaine = "Ecole du Web";
echo acronyme($chaine);
echo '<br>';

?>