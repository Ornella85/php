<?php require_once('inc/init.php'); 

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')  // pour déconnecter un membre de la session
{
    unset($_SESSION['membre']);
}

if(internauteEstConnecteEtEstAdmin())
{
    header('location:profil.php');
    exit();
}

if($_POST)  // toujours sur une page de formulaire
{
    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' "); //recherche du pseudo dans la BDD
    if($r->rowCount() >= 1)  // condition pour retrouver le bon pseudo
        {
            $membre = $r->fetch(PDO::FETCH_ASSOC); // récupérer les informations de la personne
            if(password_verify($_POST['mdp'], $membre['mdp'])) // vérifie si le mot de passe formulaire et celui de la BDD
            {
            $_SESSION["membre"]['id_membre'] = $membre['id_membre']; // mettre les infos dans la session. $membre est la personne que j'ai récupéré dans la BDD. id_membre correspond à l'indice du membre de la BDD
            $_SESSION['membre']['pseudo'] = $membre['pseudo'];
            $_SESSION['membre']['nom'] = $membre['nom'];
            $_SESSION['membre']['prenom'] = $membre['prenom'];
            $_SESSION['membre']['email'] = $membre['email'];
            $_SESSION['membre']['civilite'] = $membre['civilite'];
            $_SESSION['membre']['ville'] = $membre['ville'];
            $_SESSION['membre']['code_postal'] = $membre['code_postal'];
            $_SESSION['membre']['adresse'] = $membre['adresse'];
            $_SESSION['membre']['statut'] = $membre['statut'];
            
            header('location:profil.php'); // renvoyer la personne sur son profil
            }

            else //quand le mdp est vérifié (formulaire et BDD)
            {
                $content .= '<div class=" alert alert-danger" role="alert" > erreur mot de passe </div>';  // en vrai : ecrire : vos identifiants sont incorrectes
            }
        }

    else
        {
         $content .= '<div class=" alert alert-danger" role="alert" > erreur de pseudo </div>';
         // en vrai : ecrire : vos identifiants sont incorrectes
        }
}

?>



<?= require_once('inc/haut.php');?>

<h1>Connexion</h1>

<form method ="post" action = "">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" placeholder="votre pseudo" name="pseudo" id="pseudo" ><br>
    </div>

    <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" class="form-control" placeholder="votre mot de passe" name="mdp" id="mdp" required><br>
    </div>
    <div>
        <input type="submit" class="btn btn-default">
    </div>
</form>

<?= require_once('inc/bas.php');?>