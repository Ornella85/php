<style>
h2{
    margin: 0;
    font-size: 15px;
    color: red;
}
</style>

<h2>Écriture et Affichage</h2>

<?php
echo 'Bonjour'; // instruction pour afficher. ; est obligatoire
echo '<br>'; /* on peut y placer du html */
echo 'Bienvenue';

print '<br> Nous sommes lundi'; // echo renvoit l'instruction plus rapidement. Il faut le priviligier à print.

# commentaire sur une seule ligne 
# lorsque l'on inspecte dans le navigateur, le code est interprété et donc, en html

echo '<h3> Ceci est un titre h3 </h3>';
echo '<h2> Ceci est un titre h2 </h2>'; // on peut mélanger du html et du php
?>

<h3><?php echo 'Ceci est un texte php entouré d\'une balise h3 html'; //il est possible d'entourer du php par une balise html (à éviter, code moins pro ?></h3><br>


<hr><h2>VARIABLES</h2>
<?php
// Espace nommé qui permet de stocker une valeur

// Déclaration d'une variable avec $ 
$a = 123; // Affectation de la valeur 123 dans la variable nommée "a"

// Le type de la variable avec gettype()
echo gettype($a); // Affiche integer = nombre
echo '<br>';

$b = 12.3;
echo gettype($b); // Affiche double = nombre à virgule
echo '<br>';

$c = "texte";
echo gettype($c); // Affiche string
echo '<br>';

$d = "123";
echo gettype($d); // Affiche string
echo '<br>';

$f = true; // ou false à utiliser dans une condition != de NULL
echo gettype($f); // Affiche Booleen
echo '<br>';

$a = 130; // écrase la valeur précédente de la variable $a
echo ($a);
echo '<br>';


$prenom = 'David';
// s'écrit en minuscule
// ne pas commencer par un chiffre

echo "<br> Bonjour, je m'appelle $prenom "; // " " double quote pour afficher la variable.  En quote classiques '', le programme considère le contenu comme une chaîne de caractères
echo "<br>  Bienvenue $prenom";
echo "<br> J'ai stocké ma valeur $prenom dans une variable" ;

// ASSIGNATION 
echo '<hr><h2> ASSIGNATION par référence</h2>';
echo '<br>';

echo "$a"; // valeur précédente 

$a = '<br> Salut'; 
echo "$a"; // valeur d'affectation Ecrase la valeur précédente
echo '<br>';

$a= 'salut';
$b = $a;
echo $a;
echo '<br>';
echo $b;

echo '<br>';
$b = 123;
//$b = &$a; // si on met en commentaire, la valeur de la variable change
          // & assignation par référence $a et $b
echo $b; // Affiche salut et non pas 123. (si $a change, $b change aussi)



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> CONCATENATION </h2>';
$x = "Bonjour";
$y = "tout le monde";
echo $x . ' ' . $y . "<br>"; // . même fonction que + dans js. c'est la concaténation
                             // on peut la traduire par " suivi de "
echo "$x $y <br>"; // même chose mais, sans concaténation 

echo $x . ", Salut, " . $y . "<br>";
echo "Salut, " . $x . ' ' . $y;

echo "<br> Salut ", $x, ' ', $y; // Concaténation avec , . la virgule et le point sont similaires.


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> CONCATENATION lors de l\'affection</h2>';
$prenom1 = "Ornella"; // Affectation de la variable ornella sur la variable $prenom1
$prenom1 = "Tata"; // Affectation de la variable Tata sur la variable $prenom1... cela remplace Ornella à Tata
echo $prenom1 . '<br>'; // Affiche : Tata

$prenom2 = "Laura "; //Affectation de la valeur "laura" sur la variable $prenom2
$prenom2 .= "Tutu"; // . = suivi de Affectation de la valeur tutu sur la variable $prenom2.. cela l'ajoute sans remplacer la valeur précédente grâce à l'opérateur .=
echo $prenom2; //Affiche = Laura Tutu


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> GUILLEMETS ET LES QUOTES </h2>';
$message = 'Aujourd\'hui'; // anti-slash pour échapper et qui permet de continuer la chaîne de caractère. ou bien "aujoud'hui" avec guillemets et pas quotes
$text = "Bonjour";
echo $text .  " tout le monde  <br> "; // Concaténation
echo "$text tout le monde <br>"; // Affichage dans des guillemets, la variable est évaluée
//echo '$text tout le monde'; Ne fonctionne pas. Ne reconnait pas $text comme étant une variable.


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> CONSTANTE ET CONSTANTE MAGIQUE </h2>';
define("CAPITALE", "Paris"); // Par convention, une constante se déclare toujours majuscule
echo CAPITALE; '<br>';

// Constante Magique
echo __FILE__ . "<br>"; // affiche le chemin du fichier
echo __LINE__ . "<br>"; // affiche le numéro de la ligne de code
// echo __FUNCTION__ ; Affiche le nom de la fonction dans laquelle nous sommes
// echo __CLASS__; Affiche le nom de la class dans laquelle on est
// echo __METHOD__; Affiche le nom de la méthode dans laquelle on est 


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Exercices Variable </h2>';
// Exercice : Affichez Bleu-Blanc-Rouge (avec les tirets) en mettant chaque couleur dans une variable

$bleu = "Bleu";
$blanc = "Blanc";
$rouge = "Rouge";
echo $bleu . "-" . $blanc . "-" . $rouge;

// CORRECTION 
$couleur1 = "Bleu";
$couleur2 = "Blanc";
$couleur3 = "Rouge";
echo $couleur1 . "-" . $couleur2 . "-" . $couleur3 . "<br>";
echo "$couleur1-$couleur2-$couleur3";


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Opérateurs Arithmétiques </h2>';
$a = 10; $b = 2;
echo $a + $b . "<br>"; //Affiche 12

echo $a - $b . "<br>"; //Affiche 8

echo $a * $b . "<br>"; //Affiche 20

echo $a / $b . "<br>"; //Affiche 5

//Opération/Affectation
$a = 10; $b = 2;
$a += $b; //équivaut $a = $a + $b, Affiche 12 
echo $a . "<br>";

$a -= $b; // équivaut à $a = $a - $b, Affiche 10
echo $a . "<br>";

$a *= $b; // équivaut à $a = $a * $b, Affiche 20
echo $a . "<br>";

$a /= $b; // équivaut à $a = $a / $b, Affiche 10
echo $a . "<br>";


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> STRUCTURES CONDTIONNELLES (if/else) - Opérateurs de comparaison </h2>';

//isset & empty
// empty = sert à tester si quelque chose est vide  ---- isset = test si c'est définie
$var1 = 0;
$var2 = "";
if(empty($var1)) echo 't\'as variable contient 0, vide ou non définie';
if(isset($var2)) echo ' <br> var2 existe et est définie par rien'; // elle est vide mais, elle existe


// IF, ELSE, ELSEIF et opérateur de comparaison
$a = 10; $b = 5; $c = 2;
if($a > $b) // si $a est sup à $b
{
    echo " <br> A est bien supérieur à B <br>";
}
else// Sinon
{
    echo " Non, A n'est pas up à B";
}


// -----
if($a > $b && $b > $c) // Si A est sup à B et B est sup à C
{
    echo "ok pour les deux conditions <br>";
}

if($a == 9 || $b > $c) // Si A contient 9 OU que B est supérieur à C
{
    echo "Au moins une condition est bonne";
}
else
{
    echo "Aucune condition n'est bonne";
}

// -----
if($a == 8) // le double égal == permet de vérifier une information à l'intérieur d'une variable
{
    echo "1 - A est égal à 8 "; // ne sera pas affiché car $a n'est pas égal à 8
}
elseif($a != 10) // Sinon Si A est différent de 10
{
echo "2 - A est différent de 10 <br>"; // ne sera pas affiché car $a n'est pas différent de 10
}
else // Sinon, c'est que je ne suis ni tombé dans le if, ni dans le sinon si , je me trouve dans le else
{ 
    echo " <br> 3 - Tout le monde a faux <br>"; // c'est cet echo quis era affiché car les deux condtions précédentes n'étaient pas bonnes
}

// -----
if($a == 10 XOR $b == 6) //XOR : seulement  et uniquement l'une des conditions doit etre valide.
{
echo 'ok bonne condition <br>'; // si les deux conditions sont bonnes ou, les deux conditions sont mauvaises, l'echo ne sera pas affiché
}


/* -------------------------------------------------------------------------------- */
// Forme Contractée :2éme possibilité d'écriture de if 
// Ternaire 
echo ($a == 10) ? "a est égale à 10 <br>" : "a n'est pas égale à 10 <br>";
// le ? pouurait remplacer le if, les : remplace le else

// $maVar = 55 ;
$var1 = isset($maVar) ? $maVar : 'valeur_par_defaut';  // isset la variable $maVar existe ? Affiche là sinon affiche valeur_par_defaut
echo $var1 . '<br>';
// en sachant que $maVar n'a pas été déclaré
$var2 = $mavar ?? 'valeur_par_defaut';
echo $var2 . '<br>'; // version tronquée de la condition ternaire

$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'information'; //soit on prend le pays, soit on prend la ville, soit on prend 'pas d'information'
echo $var3;


/* -------------------------------------------------------------------------------- */
//COMPARAISON
$vara = 1; $varb = "1";
if($vara == $varb) // == compare la valeur  === compare le type et la valeur / une stricte égalité
{
    echo '<br> il s\'agit de la même chose';
}

/* 
= Affection
== Comparaison des valeurs
=== Comparaison des valeurs et du type 
*/


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> CONDITION SWITCH </h2>';
$couleur = 'jaune';
switch($couleur)
{
    case 'bleu':
        echo 'vous aimez le bleu';
    break;

    case 'rouge':
        echo 'vous aimez le rouge';
    break;

    case 'vert':
        echo 'vous aimez le vert';
    break;

    default:
        echo 'vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
    break;
}

// switch($couleur)
// {
//     case 'jaune': switch($autrevar){
//         case 'autrepossibilite':
//             echo
//             break;
//     }
// }

// EXERCICE : reproduisez la même chose que le switch avec des conditions 
$couleur = 'vert';

if($couleur == 'bleu')
{
    echo 'vous aimez le bleu';
}
elseif($couleur == 'vert') // elseif tant que la couleur n'est pas vert, il continue jusqu'à trouver la bonne condition.
{
    echo 'vous aimez le vert';
}
elseif($couleur == 'rouge')
{
    echo 'vous aimez le rouge';
}
else{
    echo 'vous n\'aimez pas ni le bleu, ni le rouge !';
}



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> LES FONCTIONS PRE DEFINIES </h2>';

// reconnues par php et déjà pré-enregistrées

echo '<br> Date : <br>';
print date("d/m/Y"); // Y = year pour avoir l'année en 4 chiffres. y = on aura que les deux derniers chiffres de l'année.
// https://www.php.net/manual/fr/indexes.functions.php
echo '<br>';



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> LES FONCTIONS PRE DEFINIES : traitement sur des chaînes de caractère (iconv_strlen, strlen, strpos, substr </h2>';

$email1 = "toto@mail.fr";
echo strpos($email1, "@"); // Affiche 4 = c'est la position de @. Cette fonction a toujours besoin de deux paramètres pour fonctionner.

// -----
$email2 = "Bonjour";
echo strpos($email2, "@"); // N'affiche rien
echo '<br>';
var_dump(strpos($email2, "@")); // permet de débugger et il retour faux : bool  false
echo '<br>';
/* 
strpos() est une fonction prédéfinies permettant de trouver la position d'un caractère dans une chaîne de caractère.
          soit on a un succès = retourne un integer
          soit on a un échec = retourne un bool false

          on aura besoin d'arguments = 
          1 - nous devons lui fournir la chaîne dans laquelle nous souhaitons chercher
          2 - nus devons lui fournir l'information à chercher
*/

// -----
$phrase = "voici une phrase ou une chaîne de caractère";
echo iconv_strlen($phrase); // 43
echo '<br>';
/* 
iconv_strlen() est une fonction prédéfinies permettant de retourner la taille d'une chaîne
          Succès = int
          Echec  = boolean false
          Arguments =  1 - nous devons lui fournir la chaîne dans laquelle nous souhaitons connaître la taille.
*/

// -----
$texte = " The PHP team is pleased to announce the eleventh testing release of PHP 8.0.0, Release Candidate 5. This is an extra unplanned release, but we're not planning to adjust the GA date, however, this may change during the course of the RC cycle. The updated release schedule can, as always, be found on the PHP Wiki page about the PHP 8.0. ";

echo substr($texte, 0, 10); // renvoi The PHP t

/* 
substr() est une fonction prédéfinies permettant de retourner une partie de la chaîne de caractère.
 (ex = ... lire la suite 
 echo substr($texte, 0, 50) . "... <a href = ''> lire la suite </a>"; )
            Succès =  string
            Echec = bool false
            Arguments = 1 - nous devons fournir la chaîne que l'on souhaite couper
                        2 - nous devons lui préciser la position de début 
                        3 - nous devons lui préciser la position de fin
*/


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> LES FONCTIONS : Utilisateur </h2>';
// Avoir nos propres fonctions 
// les fonctions qui ne sont pas définies dans le langage sont déclaré puis, exécuté par l'utilisateur.

function separation() // déaclaration d'une fonction prévu pour ne pas recevoir d'arguments.
{
    echo "<hr><hr><hr>";
}
separation(); // retour de la fonction


// -----
//fonction avec un argument
// function bonjour($qui)
// {
// return "Bonjour $qui <br>";
// }
// echo bonjour("Sara");


function bonjour($qui)
{
return "Bonjour $qui <br>";
}
$prenom = "sara";

//Execution
// La fonction bonjour() attend toujours un argument qui est obligatoire pour l'execution
echo bonjour($prenom); //Affiche sara l'arguement peut être une variable
echo bonjour('David'); // mais aussi, une chaîne de caractère


// -----
function appliqueTva($nombre) // appliquer une tva sur une somme. La somme c'est $nombre
{
return $nombre * 1.2; // pour une tva à 20%
}
echo appliqueTva(100); 
echo '<br>';
//EXERCICE
// Pourriez-vous améliorer cette fonction afin que l'on puisse calculer un nombre avec les taux de notre choix (19.6%, 5.5%, 7%) par défaut, c'est 20%.

function appliqueTva2($nombre1, $tva = 1.2)  // par defaut 1.2
{
return $nombre1 * $tva; 
}
echo '100€ avec la tva à 7% fait : '. appliqueTva2(100, 1.07) . '€ <br>'; // si je n'ai rien , il prend la tva 1.2 par défaut


// -----
meteo("hiver", "2");
function meteo($saison, $temperature)
{
    echo "nous sommes en $saison et il fait $temperature degré(s) <br>";
}
//EXERCICE
// Gérer le S de degrèS en fonction d ela température 
exoMeteo("hiver", "0");
function exoMeteo($saison1, $temperature1){
    if($temperature1 == "1" || $temperature1 == "-1" ||  $temperature1 == "0") 
    {
    echo "nous sommes en $saison1 et il fait $temperature1 degré <br>";
    } 
    else
    {
        echo "nous sommes en $saison1 et il fait $temperature1 degré(s) <br>";
    }
}

//CORRECTION
function exoMeteo2($saison2, $temperature2){

    echo "nous sommes en $saison2 et il fait $temperature2 degré";
    if($temperature2 < -1|| $temperature2 > 1){
      echo 's <br>';
    }
}
exoMeteo2("été", "-1");
echo '<br>';


// -----
function jourSemaine()
{
$jour = "Lundi <br>"; // variable locale
return $jour; // une fonction peut retourner qq chose(à ce moment là, on quitte la fonction)
echo 'coucou'; // /*\ cette ligne ne sortira jamais car il y a un return avant
}

// echo $jour; // une variable locale n'est pas accessible en dehors de la fonction
               // connu uniquement à l'intérieur de la fonction 
echo jourSemaine(); // Affiche Lundi et pas le 'coucou' qui lui est après le return


// -----
$pays = 'Maroc';
function affichePays(){
    global $pays; // demande d'aller chercher la variable à l'extérieur
    echo $pays; 
    // return $pays; 
}
affichePays();


// -----
function facultatif() // fonction avec arguments facultatifs
{
  print "<pre>"; print_r(func_get_args()); print "</pre>"; // de façon plus visible
  // func_get_args()) recupére le tableau 

  foreach(func_get_args() as $indice => $element) //func_get_args() permet d'obtenir un tableau avec les arguments passés  as => fait partie de la fonction. on associe.
  {
      echo $indice. "->". $element. "<br>"; // parcourt tout le tableau 
  }
}

facultatif(); // Tableau vide
facultatif("france", "italie", "algerie", 7); // Tableau complété
facultatif("allo");


// -----
// on précise en amont le type obligatoire des valeurs entrantes des agruments
function identite(string $nom, int $age) // on précise que 1er agr est un string et le sd un integer.
{
    return $nom . ' a ' . $age. ' ans';
}
echo identite('Hocine', "37");
echo '<br>';


// -----
// on précise en amont la valeur de retour que doit ressortir la fonction
function isAdult(int $age) :bool // :bool = c'est du typage. Préciser le type string et int permet aux autres developpeurs de comprendre notre fonction.
{
return $age >= 18;
}
var_dump(isAdult(7)); // Affiche False



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> STRUCTURE ITERATIVE : Boucles </h2>';

//WHILE

$i = 0;  // valeur de départ
while($i < 3) 
{
    echo "$i---";
    $i++; // ceci est une forme contractée de : $i = $i +1; c'est l'incrémntation du compteur et elle est effectuée à chaque tour de boucles
}
// on affecte à i la valeur 0
// Tant que i est inférieur à 3, la boucle se poursuit = j'affiche $i
// et je l'incrémente , ce qui veut que chaque tour, on ajoute 1 à $i

// Affiche "0-- 1-- 2--"
echo "<br>";

// -----
//EXERCICE
// Faites en sorte de ne pas avoir les tirets à la fin : 0---1---2
$i = 0;  
while($i < 3) 
{
    echo "$i ---";
    $i++; 
}
echo '<br>';

$j = 0;
while($j < 3)
{
    if($j < 2){ // je rentre 2 fois tant que $j st inférieur à 2 
        echo "$j ---";
       
    }else{ // je rentre 1 fois quand $j est égal à 2
        echo "$j";
        
    }$j++;
}
echo '<br>';


//FOR
for($j = 0; $j < 15; $j++)
{
    print $j . "<br>"; // affiche de 0 à 14
}

// -----
//EXERCICE : Afficher 30 options via une boucle
// for($i = 1; $i <= 30; $i++){
//     echo '<select>';
//     echo '<option>' .$i. '</option>';
//     echo '</select>';
// }

//CORRECTION
echo '<select>';
for($p = 1; $p<= 30; $p++){
    echo "<option> $p </option>";
}
echo '</select>';

// -----
//EXERCICE : faites une boucle qui affiche de 0 à 9 sur la même ligne dans un tableau
echo '<table border="1">';
echo '<tr>';
for($td = 1; $td<=9; $td++)
{
    echo "<td> $td </td>";
}
echo '</tr>';
echo '</table>';



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Boucle Imbriquée -- méthode 1</h2>';
// -----
//EXERCICE : faites la même chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles

echo '<table border="1">';
for($tr = 0; $tr< 10; $tr++) // tr = ligne
{
    echo '<tr>';
    for( $td = 0; $td < 10; $td++) //td cellule
    {
        echo  '<td>' . (10 * $tr + $td) . '</td>'; /* 10 * 0 + 0 parce que la valeur commence à 0 et c'est qu'on veut afficher
        nouveau tour de cellule : 10 * 0 + 1
        nouveau tour de cellule : 10 * 0 + 2 , ... etc
        au sd tours de la 1ere boucle, nouveau tour de cellule : 10 * 1 + 0  
        au sd tours de la 1ere boucle, nouveau tour de cellule : 10 * 1 + 1, ... etc
        ... 10* 9 + 9  fin des boucles car la suite ne valide pas la condition ( $tr et $std < 10) */
    }
  echo '</tr>';
}
echo '</table>';


echo '<hr><h2> Boucle Imbriquée -- méthode 2</h2>';
// CORRECTION AVEC WHILE
echo '<table "<tr><th>Ville</th><th>">';
$i = 0;
while($i <= 99){ // tant qu $i est inf ou égal à 99
    print '<tr>';
    for( $k = 0; $k < 10; $k++) 
    {
        echo  "<td>$i</td>"; 
        $i++;
    }
    print'</tr>';
} 
echo '</table>';


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Inclusion de fichiers </h2>';

echo "Première fois : ";
// include("exemple.inc.php"); 
echo '<br>';

echo "Seconde fois : ";
include_once("exemple.inc.php"); //permet de la récupérer qu'une seule fois 
                                // il vérifie l'existence de ce fichier

echo "Troisième fois : ";
require("exemple.inc.php"); // traduit par requis


echo "Quatrième fois : ";
require_once("exemple.inc.php"); // traduit par requis

/* 
include et require affiche le contenu d'un fichier externe de la même façon et avec la même fonctionnalité.

_once : on peut utiliser le fichier qu'une fois dans la script

require est identique à include mis à part le fait que lorsqu'une erreur survient, il produit également une erreur fatale de niveau E_COMPILE_ERROR. 

En d'autres termes, il stoppera le script alors que include n'émettra qu'une alerte de niveau E_WARNING, ce qui permet au script de continuer. 

.inc.php permet aux autres développeurs de savoir que ce fichier est destiné à être inclus
*/


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Tableau de données ARRAY </h2>';
//déclaré comme une variable

$liste = array("Niamatullah", "David", "Ornella", "Charly", "Sara", "Amine");
echo "<br>print_r : ";  //print_r sert à afficher les données telles qu'elles sont
print_r($liste);  // Affiche le contenu du tableau 
print "<pre>"; print_r($liste); print "</pre>"; // <pre> est une balise html permettant de formater le texte, cela nous permet en forme la sortie du print_r

echo "<br>var_dump : ";
print "<pre>"; var_dump($liste); print"</pre>"; // var_dump() affiche le contenu du tableau + certaines informations comme le type des variables


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Boucle foreach pour les tableaux de données Array</h2>';

//foreach fournit une façon simple de parcourir des tableaux.

$tab[] = "France"; // un autre moyen d'affecter une valeur dans un tableau. Le mot clé array est remplacé par [].
$tab[] = "Italie";
$tab[] = "Espagne";
$tab[] = "Angleterre";
$tab[] = "Suisse";
$tab[] = "Portugal";

// un  tableau avec 6 éléments

print "<pre>"; print_r($tab); print"</pre>";

// -----
//EXERCICE : tentez de m'afficher Angleterre en passant par le tableau 
echo $tab[3]; // 3 est l'indice d'Angleterre
echo "<br>";
// -----
//EXERCICE : Affichez successivement tous les éléments du tableau
  foreach($tab as $element) // as = parcours tout le tableau, pour chaque element
  {
      echo $element . "<br>";
  }
  
// -----
//EXERCICE : récupérer les indices et les valeurs en les affichant sous cette forme : indice-valeur
foreach($tab as $indice => $valeur) // quand il y a 2 variables, la 1ère parcours la colonne des indices et le 2ème la colonne des valeurs
  {
     echo $indice . "-" . $valeur. "<br>";
  }

// -----
$couleur = array("j" => "jaune", "b" => "bleu", "v" => "vert"); // on associe l'indice de notre choix à notre valeur. Lindice est modifiable
print "<pre>"; print_r($couleur); print"</pre>";
echo 'taille du tableau : ' . count($couleur); // affiche 3
echo '<br> taille du tableau : ' . sizeof($couleur).'<br>'; // affiche 3
// les deux renvoient la taille d'un tableau 

print implode("-", $couleur). '<br>'; // implode() est une fonction prédéfinie qui rassemble les éléments d'un tableau en une chaîne (séparé par un symbole) 


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> TABLEAU Multidimentionnel </h2>';

// Nous parlons de Tableau Multidimentionnel quand un tableau est contenu dans un autre tableau 
$tab_multi = array(0 => array("prenom" => "Muhammet", "nom" => "Karahan"), 
                   1 => array("prenom" => "Jordan", "nom" => "Moutawakil"),
                   2 => array("prenom" => "Jeremy", "nom" => "Rocard") );
print "<pre>"; print_r($tab_multi); print"</pre>";

// -----
//EXERCICE : Affichez Jordan en passant par le tableau 
print $tab_multi[1]['prenom'];
echo '<br>';

for($i = 0; $i < sizeof($tab_multi); $i++) // parcours le tableau
// tant que $i est inférieur au nombre d'éléments du tableau car, il y a 3 éléments dans le tableau et nous voulons faire le 0 le 1 et le 2 soit 3 tours
{
   print $tab_multi[$i]['prenom'] . '<br>'; //Affiche les prénoms de tout le tableau 
   // on affiche l'élément du tableau d'indice $i
}



/* -------------------------------------------------------------------------------- */
echo '<hr><h2> Objets </h2>';

/* 
Un objet est un autre type de données. Un peu comme un Array, il permet de regrouper des informations. 
Cependant, cela va beaucoup plus loin car, on peut y déclarer des variables (appelées : attributs ou propriétés) mais aussi des fonctions (appelées : méthodes)
*/

class Etudiant 
{
    public $prenom = "Rachid"; // création d'une variable public (permet de préciser que l'élément sera accessible partout dans le code. Il existe aussi protected et private.)
    public $age = 36;
    public function pays(){
        return "France";
    }
}

$objet = new Etudiant(); // new est un mot clé d'instancier la classe et du coup, d'en faire un objet. C'est ce qui nous permet de le déployer afin que l'on puisse s'en servir. On se sert de ce qui est dans la classe via l'objet
print "<pre>"; var_dump($objet);print"</pre>";

echo $objet->prenom .'<br>'; //Nous pouvons accéder à un indice d'un tableau avec les crochet mais, dans un objet, on accède aux propriétés et méthodes avec la ->
echo $objet->age.'<br>';
echo $objet->pays().'<br>'; // accès à la méthode. L'appel d'une méthode se fait toujours avec les parenthèses ()


/* -------------------------------------------------------------------------------- */
echo '<hr><h2> GOTO </h2>';

goto b;  // va directement à b
echo 'Bonjour'; // ne peut être affiché

b:  // on arrive au point b
echo "Hello"; // après le point b le code s'exécute normalement

// phpinfo();


?>

