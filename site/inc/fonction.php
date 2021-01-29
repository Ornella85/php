<?php
// fonctions qui vont être rappelées sur d'autres pages

// récupère le fichier dans lequel je suis, le chemin et la ligne
function debug($var, $mode = 1)
{
    $trace = debug_backtrace();
    $trace = array_shift($trace); echo "<strong> debug demandé dans le fichier : $trace[file] en ligne : $trace[line]</strong>";

    if($mode == 1){echo '<pre>'; print_r($var); echo '</pre>';}
    else{echo '<pre>'; var_dump($var); echo '</pre>';}
}


function internauteEstConnecte()
{
    if(isset($_SESSION['membre'])) return true;
    else return false;
}

// le statut pour déterminer s'il est 0 ou 1 (1- admin 0 - pas admin)
function internauteEstConnecteEtEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) return true;
    else return false; // s'il n'est pas admin, il sort
   
}

function creation_panier()
{
    if(!isset($_SESSION['panier']))
    {
        // creation du panier
        $_SESSION['panier'] = array(); // on initialise un tableau
        $_SESSION['panier']['titre']= array();
        $_SESSION['panier']['id_produit']= array(); // tableau qui aura plusieurs id_produit
        $_SESSION['panier']['quantite']= array();
        $_SESSION['panier']['prix']= array();
    }
}

function ajoutProduitsDansPanier($titre, $id_produit, $quantite, $prix) //je crée des paramètres
{
    creation_panier();
    $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);
    if($position_produit !== false) // produit existant
    {
        $_SESSION['panier']['quantite'][$position_produit] += $quantite ;
    }
    else // si le produit n'existe pas
    {
        $_SESSION['panier']['titre'][] = $titre;
        $_SESSION['panier']['id_produit'][] = $id_produit; //tableau supp vide pour qu'il ne cherche pas dans le tableau id_produit
        $_SESSION['panier']['quantite'][] = $quantite; //tableau supp vide
        $_SESSION['panier']['prix'][] = $prix; //tableau supp vide
    }
}

function montantTotal()
{
    $total = 0;
    for($i =0; $i < count($_SESSION['panier']['id_produit']); $i++)
    {
        $total +=  $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return round($total, 2);
}

function retirerProduitPanier($id_produit_a_supprimer)
{
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
    if($position_produit !== false)
    {
        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);  // efface et remplace une portion de tableau
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1); 
        array_splice($_SESSION['panier']['prix'], $position_produit, 1); 
    }
}

?>