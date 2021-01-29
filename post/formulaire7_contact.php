<?php
/* 
EXERCICE:
Réalisez un formulaire de contact pour votre site.
1- vous devez être l'unique destinataire des messages
2- ajoutez les champs societe, nom , prenom, email, sujet et message

*/

if($_POST) 
{
    foreach($_POST as $indice => $valeur)
    {
    echo "$indice : " . $valeur . '<br>';
    }

    $societe = $_POST['societe'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    
    $message = "Société : " . $societe . "\nNOM : " . $nom . "\nPrenom : " . $prenom . "\nEmail : ". $email . $_POST['message'];
   
    
    //permet l'envoi de code html par mail
    $destinataire = 'ornellaornellapole@gmail.com';

    $email  = "From: $_POST[email] \n";
    $email .= "MIME-Version: 1.0 \r\n";
    $email .= "Content-type: text/html; charset=iso-8859-1 \r\n";

    // $expe = 'From:' .$email;
    mail($destinataire, $sujet, $message, $email);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire 7 Contact</title>
    <style>
        h1{text-align: center;}
        label{ float: left; width: 95px; font-style: italic; font-family: Calibri;}
    </style>
</head>

<body>
<hr>
        <h1>Formulaire 5</h1>
        <hr>

        <form method="post" action = "formulaire7_contact.php">
            <label for="">Société :</label><br>
            <input type="text" name = "societe" id="societe" placeholder="societe">
            <br>
            <label for="">Nom :</label><br>
            <input type="text" name = "nom" id="nom" placeholder="nom">
            <br>
            <label for="">Prénom :</label><br>
            <input type="text" name = "prenom" id="prenom" placeholder="prenom">
            <br>
            <label for="">Émail :</label><br>
            <input type="text" name = "email" id="email" placeholder="email">
            <br>
            <label for="">Sujet :</label><br>
            <input type="text" name = "sujet" id="sujet" placeholder="sujet">
            <br>
            <label for="">Message :</label><br>
            <textarea name="message" id="message" placeholder="votre message" ></textarea>
            <br>
            <input type="submit" name="envoi" value="envoyer">
        </form>
</body>
</html>