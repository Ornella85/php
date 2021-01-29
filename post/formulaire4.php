<?php
/* Réalisez un formulaire avec les champs :
    pseudo 
    email
    en affichant directement sur la page formulaire 4*/
    // if($_POST){
    //     echo 'pseudo : ' . $_POST['pseudo']  . '<br>';
    //     echo 'email : ' . $_POST['email']  . '<br>';
    // } 

/* 
Faites en sorte que le champs pseudo ne puisse pas être vide en affichant un message d'erreur dans ce cas
*/

// if($_POST){
//     if(empty($_POST['pseudo']))
//     {
//         echo 'ERREUR vous n\'avez pas indiqué votre pseudo';
//     } else
//     {
//         echo 'pseudo : ' . $_POST['pseudo']  . '<br>';
//         echo 'email : ' . $_POST['email']  . '<br>';
//     }
// }


// if(empty($_POST['pseudo']) || empty($_POST['email']))
// {
//     echo 'ERREUR vous n\'avez pas indiqué votre pseudo';
// } else
// {
//     echo 'pseudo : ' . $_POST['pseudo']  . '<br>';
//     echo 'email : ' . $_POST['email']  . '<br>';
// }

//CORRECTION
// if($_POST){
//     if(strlen($_POST['pseudo']) == 0)
//     {
//         echo 'Vous devez mettre un pseudo';
//     } else
//     {
//         echo 'pseudo : ' . $_POST['pseudo']  . '<br>';
//         echo 'email : ' . $_POST['email']  . '<br>';
//     }

// }

if($_POST){
    if(strlen($_POST['pseudo']) == 0 || strlen($_POST['email']) == 0 || strpos($_POST['email'], '@') == false )
    {
        echo 'ERREUR Vous devez remplir tous les champs avec les bons caractères';
    } else
    {
        echo 'pseudo : ' . $_POST['pseudo']  . '<br>';
        echo 'email : ' . $_POST['email']  . '<br>';
    }

    $f= fopen("liste.txt", "a");
    // la fonction fopen() permet d'ouvrir un fichier 
    // fopen() en mode "a" permet de créer le fichier s'il n'est pas trouvé, sinon l'ouvrir
    // si le fichier n'existe pas , il va le créer
    fwrite($f, $_POST['pseudo'] ."-". $_POST['email']);
    fwrite($f, "\n"); // permet le saut à la ligne dans un fichier
    $f = fclose($f); // fclose n'est pas indispensable, permet de ferme le fichier et permet de libérer la ressource
    }

    extract($_POST); 
    // Affectation par défaut
    // permet de récupérer des informations d'un tableau 
    // récupérer l'indice du tableau 
    // cette fonction crée les variables dont les noms sont les indices du tableau (ici $_POST)
    // et affecte la valeur associée
    echo $pseudo;
    ?>
