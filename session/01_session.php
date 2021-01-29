<!-- Session
     se stocke côté serveur
     un panier est une session par ex
 -->


<?php
    session_start(); //creer un fichier de session (voir le screen)

    $_SESSION["pseudo"] = "Mathieu";  // $_SESSION est une superglobale de type tableau toujours
    $_SESSION["mdp"] = "motdepasse";
    echo "<br> n°1 : ";
    print_r($_SESSION); // Affichage des informations contenu dans la session (une session = un array) 


    unset($_SESSION['mdp']); // nous pouvons vider une partie de la session / unset.
    echo "<br> n°2 : ";
    print_r($_SESSION); // Affichage des informations restantes dans la session

    // session_destroy(); // Pour effacer la session dans son intégrité, mais il faut savoir que le session_destroy est vu par l'interpreteur, il est garder puis, il est excecuté qu'à la fin du script.
    echo "<br> n°3 : ";
    print_r($_SESSION);


?>