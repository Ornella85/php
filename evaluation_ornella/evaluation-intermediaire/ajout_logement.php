<?php

    require_once("./include/init.php");

    if($_POST)
    { 
        //debug($_POST);

        $titre       = $_POST['titre'];
        $adresse     = $_POST['adresse'];
        $cp          = $_POST['cp'];
        $ville       = $_POST['ville'];
        $surface     = $_POST['surface'];
        $type        = $_POST['type'];
        $prix        = $_POST['prix'];
        $description = $_POST['description'];

        $photo_bdd = '';

        if(!empty($_FILES['image']['tmp_name']))
        {
            // On redéfinie le nom de la photo en concaténant la réference saisie dans le formulaire avec le nom de la photo
            $nom_photo = "$_POST[id_logement]-" . $_FILES['image']['name'];
            echo $nom_photo .'<br>';

            $photo_bdd = URL . "photo/$nom_photo"; // on définie l'adresse URL de la photo sur le serveur, on ne conserve jamais la photo elle même dans la BDD, trop lourd pour le serveur, mais l'URL de la photo
            echo $photo_bdd . "<br>";

            $photo_dossier = RACINE_SITE . "photo/$nom_photo"; // pour copier la photo dans le dossier photo, nous avon besoin du chemin physique de la photo dans ce dernier
            echo $photo_dossier;

            copy($_FILES['image']['tmp_name'], $photo_dossier); // copy permet de copier la photo dans le dossier photo, nous avons absolument besoin du nom temporaire de la photo
        }

        
            if(empty($titre))
            {
                $empty_titre .= "Veuillez remplir le champ => titre";
            } 

            if(empty($cp))
            {
                $empty_cp .= "Veuillez remplir le champ => code postal";
            } 

            if(empty($ville))
            {
                $ville .= "Veuillez remplir le champ => ville";
            } 

            if(empty($adresse))
            {
                $empty_adresse .= "Veuillez remplir le champ => adresse";
            } 

            if(empty($type))
            {
                $empty_titre .= "Veuillez choisir un type";
            } 
            if(empty($prix))
            {
                $empty_prix .= "Veuillez entrer un prix";
            } 
            if(empty($surface))
            {
                $empty_titre .= "Veuillez entrer une surface";
            } 
 
        


        if(!ctype_digit($surface))
        {
            $erreur_surface .= "le champ Surface attend un nombre entier en saisie !!!";
        }

        if(!is_numeric($prix) && $prix < 0)
        {
            $erreur_prix .= "le prix doit être un nombre et non négatif";
        }



        if (!preg_match (" /^[0-9]{5,5}$/ " , $cp ) )
        {
        // echo "vérifiez votre code postal";
        $erreur_cp .= "le format de votre code postal est erroné !!!"; 
        }

        if($_POST['type'] == 'Location')
        {
            $type='location';
        }else{
            $type='vente';
        }

        if(empty($erreur_cp) && empty($erreur_surface) && empty($erreur_prix) && empty($empty_cp) && empty($empty_ville) && empty($empty_adresse) && empty($empty_prix) && empty($empty_surface) && empty($empty_titre) && empty($empty_type))
        {
            echo 'salut';
            
            $result = $pdo->prepare("INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description) VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :photo, :type, :description)");
            $result->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $result->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
            $result->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
            $result->bindValue(':cp', $_POST['cp'], PDO::PARAM_INT);
            $result->bindValue(':surface', $_POST['surface'], PDO::PARAM_INT);
            $result->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
            $result->bindValue(':photo', $photo_bdd, PDO::PARAM_STR);
            $result->bindValue(':type', $type, PDO::PARAM_STR);
            $result->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
            $result->execute();
            
            $valide .= "<div class='col-md-6 offset-md-3 alert alert-success text-center'>produit ajouté avec succée ! ! ! </div>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!----------------- Bootstrap ---------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Evaluation intermediaire PHP</title>
</head>
<body>        

<div class="container-fluid">
    <h1 class="text-center">Ajout Logement</h1>
    
    <form method="POST" action="" class="container text-center" enctype="multipart/form-data">

            <div class="form-group col-md">
            <label for="Nom">Titre</label>
            <input type="text" name="titre" class="form-control" id="Nom" placeholder="Titre">
            </div>
            <?= $empty_titre ?>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="Address">Address</label>
                <input type="text" name="adresse" class="form-control" id="Address" placeholder="Adresse du logement">
            </div>
            <?= $empty_adresse ?>

            <div class="form-group col-md-6">
                <label for="CodePostal">Code postal</label>
                <input type="text" name="cp" class="form-control" id="cp" placeholder="Code Postal">
            </div>
            <?= $empty_cp ?>

            <div class="form-group col-md-6">
                <label for="Ville">Ville</label>
                <input type="text" name="ville" class="form-control" id="Ville">
            </div>
            <?= $empty_ville ?>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="surface">Surface</label>
            <input type="number" name="surface" class="form-control" id="surface">
            </div>
            <?= $empty_surface ?>

            <div class="form-group col-md-6">
                <label for="type">Type</label>
                <select id="type" name="type" class="form-control">
                    <option value="" selected="" disabled="" hidden="">-Choisissez un Type-</option>
                    <option>Location</option>
                    <option>Vente</option>
                </select>
            </div>
            <?= $empty_type ?>
        </div>

        <div class="col-md-8 offset-md-2">
            <label>Image : </label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group col-md-8 offset-2">
            <label for="prix">Prix</label>
            <input type="number" name="prix" class="form-control" id="prix">
        </div>
        <?= $empty_prix ?>

            
            <div class="form-group col-md-12">
            <label for="description">Déscription</label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Déscription du logement"></textarea>
            </div>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>

<div class="container text-center mt-5">
    <a href="<?= URL ?>affichage.php">Vers la liste des logements-></a>
</div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html> 