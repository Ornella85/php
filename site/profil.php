<?php require_once('inc/init.php');

if(!internauteEstConnecte())   // si tu n'es pas connecté, retour sur la page connexion.php
{
    header('location:connexion.php');
    exit();
}

if(internauteEstConnecteEtEstAdmin())
{
    $content .= '<h1> Vous êtes Administrateur du site </h1>';
}


?>


<?= require_once('inc/haut.php');?>
<?= $content ?>

Bonjour (pseudo) vous êtes bien  connecté ! <br>
Voici vos informations : <br>
Votre nom : (nom) <br>
Votre prénom : (prenom) <br>
Votre email : (email) <br>

<?php require_once('inc/bas.php');?>