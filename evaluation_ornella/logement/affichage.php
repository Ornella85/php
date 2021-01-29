<?php require_once('inc/init.php');

if($_POST)
{
    echo '<table border ="1">';
    echo "<tr><th>titre</th><th>" . $_POST['titre'] . '<br>';
    echo "<tr><th>Adresse</th><th>" . $_POST['adresse'] . '<br>';
    echo "<tr><th>Ville</th><th>" . $_POST['ville'] . '<br>';
    echo "<tr><th>Code postal</th><th>" . $_POST['cp'] . '<br>';
    echo "<tr><th>Surface</th><th>" . $_POST['surface'] . '<br>';
    echo "<tr><th>Prix</th><th>" . $_POST['prix'] . '<br>';
    echo "<tr><th>Photo</th><th>". $_POST['photo']  . '<br>';
    echo "<tr><th>Type</th><th>" . $_POST['Type'] . '<br>';
    echo "<tr><th>description</th><th>" . $_POST['description'] . '<br>';
    echo '</table>';
}




?>

