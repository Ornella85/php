<?php
/* EXERCICE
Créez un formulaire avec les champs suivants:
    ville, cp, adresse puis, récupérez les saisies sur la même page
    */
if($_POST){
    echo 'Ville : ' . $_POST['ville'] . '<br>';
    echo 'Code Postal : ' . $_POST['cp'] . '<br>';
    echo 'Adresse : ' . $_POST['adresse'] . '<br>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire 2</title>

    <style>
    h1{text-align: center;}
    form{ font-size: 20px; padding: 20px; }
    #adresse{width: 300px;}
    </style>
</head>

    <body>
    <h1>Formulaire 2</h1>
    <hr>

        <form method="post">
        <label for="">Ville</label><br>
        <input type="text" name = "ville">
        <br>
        <label for="">Code postal</label><br>
        <input type="text" name = "cp">
        <br>
        <label for="">Adresse</label><br>
        <input type="text" name = "adresse" id ="adresse">
        <label for=""></label>
        <br>
        <input type="submit">
        </form>
    </body>
</html>