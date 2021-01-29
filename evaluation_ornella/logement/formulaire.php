<?php require_once('inc/init.php');

if($_POST)
{
    $erreur = '';
    
    // vérifier le format du code postal
    if(!preg_match('#^[0-9]{5}$#', $_POST['cp']))
    {
        $erreur .= '<div>le format du code postal est incorrecte</div>';
    }

    // Nombre entier exclusivement
    if (!is_numeric($_POST['prix']) && !is_numeric($_POST['surface'])) 
    {
        $erreur .= "<div>La saisie n'est pas au bon format</div>";
    }
    
    // L'upload de la photo selon si le type, le poids est correcte
    if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
    {
            if ($_FILES['photo']['size'] <= 1000000)
            {
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                            $content.= "<div>Photo envoyée</div>";
                    }
            }
    }
   

    $photo_bdd = '';

	if($_FILES['photo']['tmp_name'])  
	{

		$nom_photo = $_POST['titre'] . '_' . $_FILES['photo']['name'];
		$photo_bdd = URL . "photo/$nom_photo";  
		$photo_dossier = RACINE_SITE . "photo/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
        
	}
   
    if(empty($erreur))
    {
        $pdo->exec("INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description) VALUES ('$_POST[titre]' , '$_POST[adresse]' , '$_POST[ville]' , '$_POST[cp]' , '$_POST[surface]' , '$_POST[prix]' , '$photo_bdd', '$_POST[type]' , '$_POST[description]')");
       
        $content .= '<div>Formulaire Bien envoyée</div>';
    }
    
     $content .= $erreur;
}

?>


<?= $content ?>
<form method ="post" action = "http://localhost/php/evaluation/logement/affichage.php" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" name="titre" id="titre" required><br>

    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" placeholder="votre adresse" name="adresse" id="adresse" required><br>

    <label for="ville">Ville</label>
    <input type="text" class="form-control" placeholder="votre ville" name="ville" id="ville" required><br>

    <label for="cp">Code Postal</label>
    <input type="text" class="form-control" placeholder="votre code postal" name="cp" id="cp" required><br>

    <label for="surface">Surface</label>
    <input type="text" class="form-control" placeholder="surface en mètre" name="surface" id="surface" required><br>

    <label for="prix">Prix</label>
    <input type="text" class="form-control" placeholder="Prix en €uro" name="prix" id="prix" required><br>

    <label for="photo">Photo</label>
    <input type="file" class="form-control"  name="photo" id="photo"> <br>

    
    <label for="type">Type</label>
    <input type="radio" class=""  name="type" id="type" checked>
    Location / vente
    <input type="radio"  name="type" id="type"  value="location" checked><br>
     

    <label for="description">Description</label>
    <textarea class="form-control" placeholder="Description du logement" name="description" id="description"></textarea><br>

    <input type="submit" class="btn btn-default" value="Envoyer">
</form>