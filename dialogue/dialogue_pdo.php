<?php
/* 
EXERCICE: 
- Après avoir créer la base de données 'dialogue' et y avoir créer la table 'commentaire'
1 - Effectuez la connexion à la BDD
2 - Créez un formulaire html pour l'ajout de message (recupere automatique la date(actuel), le pseudo, le commentaire)
3 - Récupérez et Affichez les saisies en PHP
4 - Essayez de faire des requétes d'INSERTION en BDD (qu'est ce que je récupère dans la BDD : INSERT INTO => pseudo 	message date_enregistrement )
*/



$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// var_dump($pdo); je vérifie si la connexion est bonne

if($_POST) 
{
    // echo $_POST['pseudo'];
    // echo $_POST['message'];
    $message = strip_tags($_POST['message']);
    $req = $pdo->exec("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES('$_POST[pseudo]', '$message', NOW() )");
}

$resultat = $pdo->query("SELECT * FROM commentaire ORDER BY date_enregistrement DESC");
echo '<legend><h2> ' . $resultat->rowCount() . 'commentaire(s)</h2></legend>'; // savoir combien de commentaire il y a dans la BDD

while($commentaire= $resultat->fetch(PDO::FETCH_ASSOC)) // retourne un tableau indexé avec un résultat. WHILE pour plusieurs résultats.
{
    echo '<div class="message">';
    echo '<div class="titre"> par : ' . $commentaire['pseudo'] . ' , le ' . $commentaire['date_enregistrement'] . '</div>';
    echo '<div class="contenu">' . $commentaire['message'] . '</div>';
    echo '</div><hr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dialogue_Commentaire</title>

    <!-- <style>
        h1{text-align: center;}
        label{ float: left; width: 95px; font-style: italic;}
    </style> -->
</head>
    <body>
    <form method='post' action="">
        <fieldset>
            <legend>Formulaire de dialogue</legend>
                <label for="">Pseudo :</label><br>
                <input type="text" name = "pseudo" id="pseudo" placeholder="pseudo" size="66">
                <br>
                <label for="">Message :</label><br>
                <textarea name="message" id="message" cols='50' rows='7' ></textarea>
                <br>
                <input type="submit" name="envoi" value="poster">
        </fieldset>
    </form>
        
    </body>
</html>

