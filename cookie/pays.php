<!-- Exercice : Effectuez des liens pointant sur la même page dans une liste ul li 

     Cookie => garde nos informations en mémoire et pour les adapter à mon contenu sur fb par ex (proposition de produits ou de contenu)
-->

<h1>Votre langue : </h1>
<ul>
    <li>
    <a href="?pays=fr"> FRANCE </a>
    </li>

    <li>
    <a href="?pays=es"> ESPAGNE </a>
    </li>

    <li>
    <a href="?pays=it"> ITALIE </a>
    </li>

    <li>
    <a href="?pays=en"> ANGLETERRE </a>
    </li>
</ul>


<?php
// var_dump($_GET);  pays = indice et fr = valeur
    // if(isset($_GET['pays']))  // verifie l'existence d'un GET et de l'indice pays
    // {
    // echo $_GET['pays'];  // Affiche la valeur au clic sur les liens
    // }

    if(isset($_GET['pays'])) // si un pays est passé dans l'url, c'est que nous avons cliqué sur un lien (si $_GET existe)
    {
        $pays=$_GET['pays']; // Affectation
    }
    elseif(isset($_COOKIE['pays'])) // on rentre dans le else uniquement  si la condition précédente n'est pas passée et qu'un cookie existe
    {
         $pays=$_COOKIE['pays'];
    }
    else // sinon, dans le cas ou le if et le else if ne se déclenchent pas, le cas par défaut (comme on est france, on choisi fr par defaut)
    {
        $pays='fr';
    }


    //Fonction prédéfinie : SET COOKIE pour créer le cookie

    // paramètre, valeur et durée de vie

    // durée de vie s'écrit en seconde
    $un_an = 365*24*3600; // jour par année, heure par jour et minute par heure

    setcookie("pays", $pays, time()+$un_an); // "pays" le nom , $pays valeur de tous les liens, time() l'heure actuelle au moment de la création du cookie
                                            // Dans tous les cas, un cookie est crée car ce code n'est pas dans une condition.
    // setcookie("nom", "la valeur", "durée de vie")
    
    // echo $pays; // Fr par défaut et si on clique sur un autre lien, il va garder en mémoire le dernier clique. En rafraichissant va s'afficher la valeur du dernier clique


    //---------------------------------------------------------------------------------------------------------
     switch($pays)
     {
        case 'fr':
            print '<p>Bonjour, <br />	Vous visitez actuellement le site en français <br />Effectivement, la sauvegarde du cookie permet de retenir la langue avec laquelle vous naviguer sur le site pour vos prochaines visites. <br />A bientôt.</p>';
        break;
        case 'es':
            print '<p> Hola <br />En este momento est, visitando el sitio en espanol <br />De hecho, la cookie permite la copia de seguridad de conservar el idioma que utilice el sitio para futuras visitas. <br />Pronto.</p>';
        break;
        case 'en':
            print '<p>Hello <br />You are currently visiting the site in English <br />Indeed, the cookie allows the backup to retain the language that you use the site for future visits. <br />Soon.</p>';
        break;
        case 'it':
            print '<p>Ciao <br />Si sta attualmente visitando il sito in Italiano <br />Infatti, il cookie consente il backup di mantenere la lingua che si usa il sito per visite future. <br />Presto.</p>';
        break;

     }

     // ce n'est pas un cookie qui garde les produits dans un panier (car cookie = est coté client et pas serveur)
?>