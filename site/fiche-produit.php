<?php require_once('inc/init.php'); ?>
<?php
    // pour accéder à la fiche produit, id est une référence sur

    if(!isset($_GET['id_produit'])) // si je n'ai rien dans mon id produit, on renvoit vers la page d'accueil
    {
        header('location:sindex.php');
        exit();
    }

    // le contraire : je recherche le produit
    if(isset($_GET['id_produit']))
    {
        $r = $pdo-> query("SELECT * FROM produit WHERE id_produit= '$_GET[id_produit]' "); // recupère moi tous les id produits de la table produit. $r retourne le nbr de ligne dont, nbre de produits
    }

    if($r->rowCount() <= 0) // si le nbr de ligne est egal à 0, on renvoit vers l'accueil
        {
            header('location:sindex.php');
            exit();
        }

    // récupérer $r dans un tableau 
    $produit = $r-> fetch(PDO::FETCH_ASSOC);

    // $content pour faire de l'affichage
    $content .= "<h1>$produit[titre]</h1>";
    $content .= "<p> categorie : $produit[categorie] </p>";
    $content .= "<p> couleur : $produit[couleur] </p>";
    $content .= "<p> taille : $produit[taille] </p>";
    $content .= "<p> <img src=\"$produit[photo]\"></p>";
    $content .= "<p> prix : $produit[prix] €</p>";


    // STOCK PLEIN OU VIDE
    // if else sur le stock
    if($produit['stock'] > 0)
    {
        $content .= "Nombre de produits disponible : $produit[stock] <br>";
        $content .= "<form method = \"post\" action=\"panier.php\">";
        $content .=  "<input type=\"hidden\" name=\"id_produit\" value=\"$produit[id_produit]\"> <br></br>";
        $content .= "<label for=\"quantite\"> Quantité </label>";
        $content .= "<select name=\"quantite\" id=\"quantite\">";

        // les options doivent être en lien avec le stock
        for($i = 1; $i <= $produit['stock']; $i++)
        {
            $content .= "<option>$i</option>";
        }
        $content .= "</select> <br><br>";
        $content .= "<input type= \"submit\" value=\" ajouter au panier\" name=\"ajout_panier\" class=\"btn btn-default\" <br><br>";
        $content .= "</form>";
    }
    else
    {
        $content .= "<p>Rupture de stock</p>";
    }

    $content .= "<a href=\"sindex.php?categorie=$produit[categorie]\">Retour vers la catégorie
    $produit[categorie]</a>";
?>

<?php require_once('inc/haut.php');?>
<em> Fiche produit </em>
<?= $content?>
<?php require_once('inc/bas.php');?>