<?php require_once('include/init.php');

if(isset($_GET['id_logement']))
{
    $r = $pdo->query("SELECT * FROM logement WHERE id_logement = $_GET[id_logement]");
    if($r->rowCount() <= 0){ header('location:index.php'); exit(); }
    $logement = $r->fetch(PDO::FETCH_ASSOC);

    $titre = $logement['titre'];
    $photo = $logement['photo'];
    $description = $logement['description'];
    $type = $logement['type'];
    $adresse = $logement['adresse'];
    $cp = $logement['cp'];
    $ville = $logement['ville'];
    $surface = $logement['surface'];
    $prix = $logement['prix'];
    
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid text-center">
        <h1>fiche du Logement</h1>
        <h3><?= $titre ?></h3>
        <img src='<?= $photo ?>'>
        <h3>type : <?= $type?></h3>
        <h3>Adresse du bien : </h3>
        <h3><?= $adresse?>, <?=$cp?> <?= $ville ?></h3>
        <h3>description du logement : </h3><br>
        <p><?= $description ?></p>
        <h3>surface : <?= $surface ?>M²</h3>
        <h3>prix : <?= $prix ?>€</h3>
    </div> 
</body>
</html>