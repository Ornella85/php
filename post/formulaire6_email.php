
<?php
if($_POST) 
{
    foreach($_POST as $indice => $valeur)
    {
    echo "$indice : " . $valeur . '<br>';
    }

$expediteur = $_POST['expediteur'];
$destinataire = $_POST['destinataire'];
$sujet = $_POST['sujet'];
$msg = $_POST['msg'];

//permet l'envoi de code html par mail
$expediteur = "From: $_POST[expediteur] \n";
$expediteur .= "MIME-Version: 1.0 \r\n";
$expediteur .= "Content-type: text/html; charset=iso-8859-1 \r\n";

// $expe = 'From: ' . $expediteur;
mail($destinataire, $sujet, $msg, $expe);

if(strlen($_POST['msg']) < 10 ||  strpos($_POST['expediteur'], '@') == false || strpos($_POST['destinataire'], '@') == false){
    echo 'ERREUR Vous devez remplir convenablement tous les champs';
   }
   else{
    echo 'Bien joué <br>';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire 5</title>

    <style>
        h1{text-align: center;}
        label{ float: left; width: 95px; font-style: italic; font-family: Calibri;}
    </style>
</head>


    <body>
        <hr>
        <h1>Formulaire 5</h1>
        <hr>

        <form method="post" action = "formulaire5_email.php">
            <label for="">Destinataire :</label><br>
            <input type="text" name = "destinataire" id="destinataire" placeholder="destinataire">
            <br>
            <label for="">Expéditeur :</label><br>
            <input type="text" name = "expediteur" id="expediteur" placeholder="expediteur">
            <br>
            <label for="">Sujet :</label><br>
            <input type="text" name = "sujet" id="sujet" placeholder="sujet">
            <br>
            <label for="">Message :</label><br>
            <textarea name="msg" id="msg" placeholder="votre message" ></textarea>
            <br>
            <input type="submit" name="envoi" value="envoyer">
        </form>
    </body>
</html>