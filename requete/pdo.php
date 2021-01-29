<!-- 
EXEC() /
INSERT, DELETE, UPDATE : exec() est utilisée pour la formulation de requétes ne retournant pas de résultat mais, elle renvoit le nbre de lignes affectées par la requéte.
Valeur de retour : 
                  Echec : False (boolean)
                  Succés : 1 (INT) ce nbr peut être sup selon le nbr de lignes affectées

QUERY () /
SELECT : Au contraire d'exec(), query() est utilisé pour la formulation de requéte retournant un ou plusieurs resultats.
Valeur de retour : 
                  Echec : False (boolean)
                  Succés : PDOStatement (un objet)

PREPARE()) puis EXECUTE() /
INSERT, DELETE, UPDATE, SELECT : PREPARE() permet de préparer la requéte mais, ne l'execute pas. EXECUTE() permet d'executer la requéte préparer.
Valeur de retour :
                  PREPARE() renvoit toujours un PDOStatement (objet)
                  EXECUTE() 
                           Echec : False (boolean)
                           Succés : PDOStatement (un objet)
                  les requétes préparées sont à préconiser si vous executez plusieurs fois la même requéte et ainsi vouloir éviter le cicle : Analyse / Interpretation / Execution.
                  les requétes préparées sont souvent utilisées pour assainir les données(prépare+bindvalue+execute).
-->

<?php

// ================================= 01. PDO : php data object ================================= 
//PDO est une classe prédéfinie dans php
//on y place des propriétés et des méthodes



echo "<h1> 01. PDO : CONNEXION </h1>";

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


//arguments : $pdo = new PDO('serveur + base de données', 'user, pseudo', 'mot de passe', 'les options');
var_dump($pdo); // object(PDO)#1 (0) { }  = la connexion est bonne

// echo"<pre>"; print_r(get_class_methods($pdo)); echo"/<pre>"; voir les methodes disponible en pdo

echo"<hr><hr>";


// ================================= 02. PDO : EXEC - INSERT, UPDATE, DELETE ================================= 
echo "<h1> 02. PDO : EXEC - INSERT, UPDATE, DELETE</h1>";


//Insertion de données
$resultat = $pdo->exec('INSERT INTO employes (prenom,nom,sexe,service, date_embauche,salaire) VALUES ("Rachid", "Louzdi","m","informatique","2021-01-21", "1500")');  // la methode exec() renvoit le nbre de lignes affectées (dans phpmyadmin)

echo "nombre enregistrement affecté par l'INSERT : $resultat";
echo "<br>dernier id généré : " . $pdo->lastInsertId();

$id = $pdo->lastInsertId();
$resultat = $pdo->exec("UPDATE employes SET salaire=4000 WHERE id_employes= $id"); // on met à jours le salaire du dernier id ; l'id s'incrémente ou on peut mettre le numero de l'id ou on veut la modification
echo "<br> nbr d'enregistrement affecté par l'update : $resultat "; // affiche le nbr de mis à jours 

$resultat = $pdo->exec("DELETE FROM employes  WHERE id_employes= $id"); 
echo "<br> nbr d'enregistrement affecté par DELETE : $resultat ";



// ================================= 03. PDO : QUERY - SELECT + FETCH_ASSOC (1 résultat )  ================================= 
echo "<h1> 03. PDO : QUERY - SELECT + FETCH_ASSOC (1 résultat )  </h1>";

$resultat = $pdo->query("SELECT * FROM employes WHERE prenom='rachid' "); // la requete : renvoit moi tous les employés dont le nom est rachid 
var_dump($resultat);
echo "<pre>"; print_r(get_class_methods($resultat)); echo "</pre>"; // permet d'afficher les methodes de la classe PDOstatment

$employe = $resultat->fetch(PDO::FETCH_ASSOC);  // FETCH récupère le 1er résultat sur lequel il tombe
                                                // fetch(PDO::FETCH_ROW) indexé numériquement uniquement
                                                // fetch() mélange de fetch_assoc et fetch_row
                                                //fetch(PDO::FETCH_OBJECT) retourne un objet avec les noms des champs comme propriétés public

                                                // vous ne pouvez pas faire plusieurs traitements sur le même résultat

echo "<pre>"; print_r($employe); echo "</pre>"; // a récupéré les informations de rachid 

echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>"; // Affiche les informations dans une phrase


// $pdo représente un objet issu de la classe prédéfinie PDO
// Quand on execute une requéte de la sélection via la méthode QUERY  sur l'objet PDO : 
// succès : on obtient un autre objet issu de la classe PDO Statement. Cet objet a donc des méthodes et des propriétés différentes
// échec : on obtient un boolean false

// Quand on execute une requéte de INSERT/UPDATE/DELETE via la méthode QUERY  sur l'objet PDO : 
// succès : on obtient un boolean TRUE
// échec : on obtient un boolean false

//FETCH_ASSOC pour obtenir un tableau indexé avec le nom des champs 



// ================================= 04. PDO : WHILE + FETCH_ASSOC (plusieurs résultats) ================================= 
echo "<h1> 04. PDO : WHILE + FETCH_ASSOC  </h1>";

$resultat = $pdo->query('SELECT * FROM employes');

echo 'nbr d\'employés :' .$resultat->rowCount() . '<br>'; // permet de compter le nbr de lignes retournées
while($contenu = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<div>';
    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['nom'] . '<br>';
    echo $contenu['sexe'] . '<br>';
    echo $contenu['date_embauche'] . '<br>';
    echo $contenu['salaire'] . '<br>';
    echo '</div>';
} // plusieurs tableaux différenciés

echo"<hr><hr>";

// attention : il n'y a pas un seul tableau ARRAY avec tous les enregistrements dedans mais, un tableau ARRAY par enregistrement(ligne)
//chaque resultat affiché est en fait un tableau 

echo "<br>";

// votre requéte sort plusieurs résultat ? j'utilise une boucle
// votre requéte ne doit sortir qu'un seul et unique résultat ? pas de boucle
// votre requéte ne sort qu'un seul résultat mais, peut potentiellement en sortir plusieurs ?




// ================================= 05. PDO : QUERY + FETCHALL + FETCH_ASSOC ================================= 
echo "<h1> 05. PDO : QUERY + FETCHALL + FETCH_ASSOC  </h1>";

// parcourir un tableau : foreach

$resultat = $pdo->query('SELECT * FROM employes'); 
$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // retourne toutes les lignes de résultats dans un tableau multidimensionnel (sans faire de boucle)
echo "<pre>"; print_r($donnees); echo "</pre>"; 

// retourne un tableau dans lequel on a plusieurs tableaux

echo"<span>Foreach</span>";

foreach($donnees as $indice => $contenu)  // parcours le tableau mutlidimensionnel
{
    echo "<div>";
   foreach($contenu as $indice2 => $contenu2){  //parcours tous les tableaux et récupère toutes les valeurs qu'on recherche
        echo $indice2. " : " . $contenu2 . "<br>";
   }
   echo "</div>";
}

echo "<hr><hr>";



// ================================= 06. PDO : QUERY - FETCH + BDD ================================= 
echo "<h1> 06. PDO : QUERY - FETCH + BDD  </h1>";

// Afficher la liste des bases de données, puis, la mettre dans un liste ul li. 
$resultat = $pdo->query('SHOW DATABASES'); 
echo '<ul>'; 
while($base = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<li>' . $base['Database'] . '</li>';
}

echo "</ul>";



// ================================= 07. PDO : QUERY - TABLE ================================= 
echo "<h1> 07. PDO : QUERY - TABLE  </h1>";
// EXERCICE : Affichez tous les employés dans un tableau <table> (tr,td, ...)

// $resultat = $pdo->query('SELECT * FROM employes');

// while($table = $resultat->fetch(PDO::FETCH_ASSOC))
// {
//     echo "<table border='1'>";
//     print '<tr>';

//     echo  "<td>$table[id_employes]</td>";
//     echo  "<td>$table[prenom]</td>";
//     echo  "<td>$table[nom]</td>";
//     echo  "<td>$table[sexe]</td>";
//     echo  "<td>$table[date_embauche]</td>";
//     echo  "<td>$table[salaire]</td>";

//     print '</tr>';
//     echo "</table>";
// }

$resultat = $pdo->query('SELECT * FROM employes');

echo "<table border='1' <tr>";
for($i=0; $i<$resultat -> columnCount(); $i++){  //$i<$resultat -> columnCount() récupère le nbre de lignes
    $colonne = $resultat -> getColumnMeta($i); // getColumnMeta($i) récupère à la 1ere ligne (l'entête), fct prédéfinie
    //var_dump($colonne);
    echo '<th>' . $colonne['name'] . '</th>';
}
echo '</tr>';

while($ligne = $resultat ->fetch(PDO::FETCH_ASSOC))
{
// var_dump($ligne);
echo '<br>';
    foreach($ligne as $indice => $information)
    {
        echo '<td>' . $information . '</td>';
    }
echo '</tr>';
}
echo '</table>';

 // FOR récupère les données de l'entête du tableau 
 // WHILE et FOREACH => une boucle dans une boucle. 1 -> récupère l'ensemble du tableau. 2-> récupère les données des tableaux à l'intérieur du 1er tableau. Il faut bien identifier le fait que nous sommes face à un tableau multidimensionnel


echo '<hr><hr>';

// ================================= 08. PDO : PREPARE + BINDPARAM + EXECUTE ================================= 
echo "<h1> 08. PDO : PREPARE + BINDPARAM + EXECUTE  </h1>";

// PDOStatement::bindParam — Lie un paramètre à un nom de variable spécifique 
// PDO::prepare — Prépare une requête à l'exécution et retourne un objet. Prépare une requête SQL à être exécutée par la méthode PDOStatement::execute(). 

$nom = "sennard";
$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom= :nom'); // :nom marqueur nominatif. Rien ne sera excecuté à cette étape.
$resultat -> bindParam(':nom', $nom, PDO::PARAM_STR); // bindParam : reçoit exclusivement une variable. 
$resultat -> execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' ');

echo '<hr><hr>';


// ================================= 09. PDO : PREPARE + BINDVALUE + EXECUTE ================================= 
echo "<h1> 09. PDO : PREPARE + BINDVALUE + EXECUTE   </h1>";

//PDOStatement::bindValue — Associe une valeur à un paramètre. Reçoit une variable ou une chaîne

$nom = "thoyer";
$resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom'); // marqueur nominatif :nom
$resultat->bindvalue(':nom', 'thoyer', PDO::PARAM_STR); // PDO::PARAM_STR pour dire que c'est un string
$resultat->execute();
$donnees = $resultat->fetch();
echo implode($donnees, ' ');

echo '<hr><hr>';


// ================================= 10. PDO : PREPARE + BINDCOLUMN + EXECUTE ================================= 
echo "<h1> 10. PDO : PREPARE + BINDCOLUMN + EXECUTE  </h1>";


// $nom = "thoyer";
// $resultat = $pdo->prepare('SELECT * FROM employes WHERE nom = ?'); // marqueur nominatif ?
// $resultat->bindColumn(1, $nom); // PDO::PARAM_STR pour dire que c'est un string
// $resultat->execute();
// $donnees = $resultat->fetch();
// echo implode($donnees, ' ');

echo '<hr><hr>';


// ================================= 11. PDO : PREPARE + SETFETCHMODE + FETCH_CLASS + EXECUTE ================================= 
echo "<h1> 11. PDO : PREPARE + SETFETCHMODE + FETCH_CLASS + EXECUTE  </h1>";

//PDOStatement::setFetchMode — Définit le mode de récupération par défaut pour cette requête 

class Employes // par convention, on met une majuscule
{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}
$resultat = $pdo->query('SELECT * FROM employes');
$objet = $resultat->fetchAll(PDO::FETCH_CLASS, 'Employes'); // récupère tous les elements de la table

// var_dump($objet);

foreach($objet as $employe)  // parcourir un tableau. $employes représente un objet de la classe Employes
{
    echo $employe->prenom . '<br>'; // prenom représente le $prenom de la classe si dessus
}
?>