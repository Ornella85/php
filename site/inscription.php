<?php require_once('inc/init.php');
if($_POST)
{   
    // debug($_POST);
    $erreur ='';

    if(strlen($_POST['pseudo']) <= 3 || strlen($_POST['pseudo']) > 20)   // taille/ nbr de caractères pour le pseudo
    {
        $erreur .= '<div class="alert alert-danger" role="alert">erreur taille du pseudo</div>';
    }

    if(!preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'])) // ce champs doit matcher avec les caractères que je veux. Pour que ce qui est à l'intérieur soit uniquement : a-z A-Z 0-9 ._- . REGEX
    {
        $erreur .= '<div class="alert alert-danger" role="alert">erreur format du pseudo</div>';
    }

        $r = $pdo->query("SELECT * FROM membre WHERE pseudo= '$_POST[pseudo]'");
        if($r->rowCount() >= 1)  // condition pour il n'y est pas 2fois le meme pseudo
        {
            $erreur .= '<div class="alert alert-danger" role="alert"> pseudo déjà existant</div>';
        }

        foreach($_POST as $indice => $valeur) // parcourt le tableau
        {
            $_POST[$indice] = addslashes($valeur);  //addslashes permet d'echapper des caractères 
        }

        // on ne prend jamais les mots de passe dans la base de données
        $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // permet d'encoder/hasher les mdp

        if(empty($erreur)) // si pas d'erreur, on rentre dans la BDD
        {
            $pdo->exec("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]' , '$_POST[mdp]' , '$_POST[nom]' , '$_POST[prenom]' , '$_POST[email]' , '$_POST[civilite]' , '$_POST[ville]' , '$_POST[cp]' , '$_POST[adresse]')");

            $content .= '<div class="alert alert-success" role="alert">Inscription</div>';
        }
       $content .= $erreur; // relie la variable $content avec la variable $erreur
}
?>

<?= require_once('inc/haut.php');?>

<?= $content ?>

<form method ="post" action = "">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" placeholder="votre pseudo" name="pseudo" id="pseudo" ><br>

    <label for="mdp">Mot de passe</label>
    <input type="password" class="form-control" placeholder="votre mot de passe" name="mdp" id="mdp" required><br>

    <label for="nom">Nom</label>
    <input type="text" class="form-control" placeholder="votre nom" name="nom" id="nom"><br>

    <label for="prenom">Prénom</label>
    <input type="text" class="form-control" placeholder="votre prénom" name="prenom" id="prenom"><br>

    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="votre email" name="email" id="email" required><br>

    <label for="civilite">Civilité</label>
    <input type="radio" class=""  name="civilite" id="civilite" checked>
    Homme -- Femme
    <input type="radio" class=""  name="civilite" id="civilite"  value="f" checked><br>

    <label for="ville">Ville</label>
    <input type="text" class="form-control" placeholder="votre ville" name="ville" id="ville"><br>

    <label for="cp">Code postal</label>
    <input type="text" class="form-control" placeholder="votre code postal" name="cp" id="cp"><br>

    <label for="adresse">Adresse</label>
    <textarea class="form-control" placeholder="votre adresse" name="adresse" id="adresse"></textarea><br>

    <input type="submit" class="btn btn-default">
</form>


<?php require_once('inc/bas.php');?>

