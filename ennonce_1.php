<?php

// 1. Quelle instruction permet d'afficher du texte ?

    // A. echo
    // B. print
    // C. print_r
    // D. var_dump


// 2. Qu'est ce qu'une variable ?

    // A. Un espace de mémoire destiné à conserver une information
    // B. Un code permettant de faire fonctionner le script en php
    // C. Un système permettant d'effacer une information
    // D. Une variété de valeur avec laquelle nous devons coder


// 3. Quel est le type de la variable suivante : $var = "12";

    // A. Boolean
    // B. String
    // C. Integer
    // D. Array


// 4. Comment vérifier si une variable est vide

    // A. Empty
    // B. Isset
    // C. Define
    // D. Switch
            

// 5. Avec la déclaration suivante "$text = bonjour"; quel code permettrait d'afficher "bonjour tout le monde" sur ma page web ?

    // A. echo $text . " tout le monde<br>";
    // B. echo "$text tout le monde<br>";
    // C. echo '$text tout le monde<br>';
    // D. echo $text , "tout le monde<br>;
               

// 6. Qu'est-ce que le code suivant affichera ?

/*
    $a = 10; $b = 5; $c = 2;
    if($a == 8) {
        echo "1";
    } elseif($a != 10) {
        echo "2";
    } else {
        echo "3";
    }
*/

    // A. 1
    // B. 2
    // C. 3
    // D. Rien (un résultat vide)


// 7. Quelle fonction permet d'afficher la date du jour

    // A. date()
        // date() est une fonction permettant de récupérer la date / heure locale et de la formater

    // B. dayNow()
        // dayNow() n'existe pas !

    // C. now()
        // now() affiche la date et l'heure courante

    // D. curdate()
        // curdate() affiche la date


// 8. A quoi sert une boucle

    // A. A répéter des informations ou traitements plusieurs fois
    // B. A écrire la suite du code à notre place si on est bloqué dans les traitements
    // C. A respecter les normes de php
    // D. A faire patienter le serveur avant de lancer l'affichage


// 9. A quel moment est-il utile de créer une fonction

    // A. Pour rendre le code fonctionnel
    // B. Pour automatiser un traitement
    // C. Pour terminer un site
    // D. Pour avoir une page web correcte


// 10. Quelle est la différence entre include et require ?

    // A. Include permet d'inclure et require de vérifier la présence d'un fichier
    // B. En cas de fichier inexistant, include fera une erreur et continura l'exécution du code, tandis que require fera une erreur et bloquera l'exécution du code
    // C. Lorsqu'un fichier est chargé, include permet de le prendre tout de suite, tandis que require attends la fin du traitement
    // D. Ces deux méthodes ont tout simplement étaient inventées par deux dev différent, il n'y a aucune différence, cela permet d'assurer la connexion entre le site et le navigateur


// 11. Qu'est-ce qu'un array ?

    // A. Une BDD
    // B. Un fichier contenant des informations sensible
    // C. Un élément de langage sans lequel php ne pourrait pas fonctionner
    // D. Un tableau de donnée


// 12. $GET et $_POST sont des

    // A. Des objets
    // B. Super variable
    // C. Super globales
    // D. Des fonctions


// 13. $_GET permet :

    // A. Récupérer des informations contenues dans l'adresse URL sous la forme d'un tableau array
    // B. Récupérer les saisies d'un utilisateur depuis un formulaire sous la forme d'un tableau array
    // C. Récupérer des informations depuis un site internet sous la forme d'un objet
    // D. Stocker plusieurs variables à la fois


// 14. A quoi sert le var_dump ?

    // A. Cela n'existe pas car la syntaxe est la suivante var-dump()
    // B. Permet d'obtenir le type et la valeur d'un élément
    // C. Permet de traduire des balise HTML en PHP
    // D. Permet de déclarer des variables plus rapidement



// 15. Quel est le type d'une superglobales ?

    // A. Une simple variable
    // B. Un tableau array
    // C. Un type d'objet
    // D. Une fonction



// 16. Quelle formulation me permettrait de lire un cookie ?

    // A. $cookie
    // B. $_cookie
    // C. $_COOKIE
    // D. $-COOKIE



// 17. Lorsqu'on termine une fonction, quel est la difference entre echo et return

    // A. echo et return permettent d'afficher une information
    // B. echo affiche une information et return retourne la valeur
    // C. echo ne fonctionnera pas dans une fonction tandis que return fonctionnera
    // D. echo affiche une information et return retourne la fonction



// 18. Dans ce code, qu'elle est l'erreur

/*
    $tab = array("France", "Italie", "Espagne", "Angleterre");
    foreach($tab as $indice => $valeur); {
        echo $indice . " - " . $valeur . "<br>";
    }
*/   

    // A. le mot array n'existe pas
    // B. Nous devrions écrire for each avec un espace
    // C. Pas de parenthèse
    // D. Pas de ; après les parenthèse



// 19. Quelle formulation me permettrait de récuperer la saisie dans l'élément suivant :

/*
    <input type="text" name="pseudo">
*/   

    // A. echo $_post["pseudo"];
    // B. echo $_POST[pseudo];
    // C. echo $_POST["pseudo"];
    // D. echo $pseudo;
 

// 20. De quelle manière pouvons-nous inscrire dans l'adresse URL des informations récupérable ?

    // A. page.php?pays=france
    // B. page.php?pays="france"
    // C. page.php$pays=france
    // C. page.php&pays=france


?>