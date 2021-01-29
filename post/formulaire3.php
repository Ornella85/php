<?php
/* Réalisez un formulaire avec les champs :
    pseudo 
    email
    en affichant directement sur la page formulaire 4*/
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire 3</title>

    <style>
    h1{text-align: center;}
    form{ font-size: 20px; padding: 20px; }
    #adresse{width: 300px;}
    </style>
</head>
<body>
<h1>Formulaire 3</h1>
    <hr>

        <form method="post" action="http://localhost/php/post/formulaire4.php">
        <label for="">Pseudo</label><br>
        <input type="text" name = "pseudo">
        <br>
        <label for="">Email</label><br>
        <input type="text" name = "email">
       
        <br>
        <input type="submit" name = "envoi" value = "envoi">
        </form>
</body>
</html>