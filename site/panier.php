<?php require_once('inc/init.php');


if(isset($_POST['ajout_panier'])) // $_POST['ajout_panier'] existe
{
    $r = $pdo->query("SELECT * FROM produit WHERE id_produit = $_POST[id_produit]");
    // $_POST[id_produit] est récupéré du ficher fiche-produit dans le name
    $produit = $r->fetch(PDO::FETCH_ASSOC); // créée un tableau associatif de l'obje $r
    ajoutProduitsDansPanier($produit['titre'], $produit['id_produit'], $_POST['quantite'], $produit['prix']); // on récupère la fonction créée dans fonction.php et en argument, on lui demande l'id, la quantite et le prix 
    // debug($_SESSION);
}

//Bouton paiement
if(isset($_POST['payer']))
{
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $r = $pdo->query("SELECT * FROM produit WHERE id_produit = '" . $_SESSION['panier']['id_produit'][$i] ." '");
        $produit = $r->fetch(PDO::FETCH_ASSOC);

        if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
        {
            $content .= 'stock restant : ' . $produit['stock'] . '<br>';
            $content .= 'quantité demandée : ' . $_SESSION['panier']['quantite'][$i] . '<br><br>';
            if($produit['stock'] > 0) // il reste un peu de stock
            {
                $_SESSION['panier']['quantite'][$i] = $produit['stock']; // on remplace par le stock réel qu'il reste
                $content .= '<div class="alert alert-warning" role="alert"> La quantité du produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats. </div>';
            }
            else
            { // plus de stock
                $content .= '<div class="alert alert-warning" role="alert"> Le produit ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré car nous sommes en rupture de stock, veuillez vérifier vos achats. </div>';
                retirerProduitPanier($_SESSION['panier']['id_produit'][$i]);
                $i--;
            }
            $erreur = true; // pour vérifier s'il y a une erreur
        }

    }

    if(!isset($erreur))
    {
        // la session est l'endroit ou sont stockés internautEestConnecte (table membre) et les produits du panier (table produit)
        //table commande
        $pdo->query("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES ('" . $_SESSION['membre']['id_membre'] . "', '" . montantTotal() . "', NOW())");

        // table detail_commande
        // récupérer le dernier id enregistré
        $id_commande = $pdo->lastInsertId();

        // récupérer ce qui se trouve dans la panier et dans la session
        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
        {
            //insertion dans la table details_commande
            $pdo->query('INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES ("' . $id_commande . '",  "' . $_SESSION['panier']['id_produit'][$i] . '", "' . $_SESSION['panier']['quantite'][$i] . '" , "' . $_SESSION['panier']['prix'][$i] . '" ) ');

            // on met à jours le stock dans la base de données
            $pdo->query('UPDATE produit SET stock = stock - "' . $_SESSION['panier']['quantite'][$i] . '" WHERE id_produit = "' . $_SESSION['panier']['id_produit'][$i] . '" ');
        }
        // vider la session sans supprimer le membre. On vide le panier uniquement
        unset($_SESSION['panier']);
        $content .= '<div class="alert alert-sucess" role="alert"> Merci pour votre commande, votre n° de suivi est le '. $id_commande . '</div>';
    }
}

 // pour vider le panier en entier, il faut passer dans l'url l'action vider_panier. Si l'action existe, on peut lui dire de vider le panier avec le unset
 if(isset($_GET['action']) && $_GET['action'] == "vider_panier")
 {
     unset($_SESSION['panier']);
 }

  // BOUTON SUPPRIMER pour supprimer le produit que l'on souhaite
       if(isset($_GET['action']) && $_GET['action'] == "suppression") 
        {
            retirerProduitPanier($_GET['id_produit']);
        }

$content .= '<table class="table">';
$content .= '<tr><th>titre</th><th>id produit</th><th>quantite</th><th>prix</th><th>Action</th></tr>';

if(empty($_SESSION['panier']['id_produit']))
{
    $content .= '<tr><td colspan="3">Votre panier est vide ! </td></tr>';
}
else
{
    for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {   
        $id_produit = $_SESSION['panier']['id_produit'][$i];

        $content .= '<tr>';
        $content .= '<td>' . $_SESSION['panier']['titre'][$i] . '</td>'; 
        $content .= '<td>' . $_SESSION['panier']['id_produit'][$i] . '</td>'; 
        $content .= '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>'; 
        $content .= '<td>' . $_SESSION['panier']['prix'][$i] . '</td>'; 
        $content .= "<td><a href=\"?action=suppression&id_produit=$id_produit\" onClick=\"return(confirm('En êtes vous certain de vouloir le supprimer ?'));\">supp</a></td>"; 
        $content .= '</tr>';
    }

    $content .= '<th colspan="3">' . montantTotal() . '€</th>';

    // si l'internaute est connecté alors on affiche le bouton payer
    if(internauteEstConnecte())
    {
        $content .= '<form method="post" action=""> ';
        $content .= '<tr><td colspan="3"><input type="submit" value="Valider le paiement" name="payer" class="btn btn-default"></td></tr>';
        $content .= '</form>';
    }
    else{
        $content .= '<tr><td colpsan="3">Veuillez vous<a href="inscription.php"> inscrire </a>ou vous <a href="connexion.php">connecter </a>pour pouvoir payer</td></tr>';
    }

    $content .= "<tr><td colspan='5'><a href=\"?action=vider_panier\" onClick=\"return(confirm('En êtes vous certain de vouloir vider votre panier ?'));\">Vider mon panier</a></td></tr>";  
}
$content .= '</table>';



?>

<?php require_once('inc/haut.php');?>
<h1>Panier</h1>
<?= $content ?>


<?php require_once('inc/bas.php');?>