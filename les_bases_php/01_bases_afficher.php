<style>
h2{margin: 0; font-size: 15px; color: red;}
</style>

<h2>Les bases en PHP</h2>

<?php
    // ECHO COMME PRINT  est une structure de langage. Non pas des fonctions. Ils permettent d'afficher un résultat en PHP.
    //l'affichage avec ECHO  et un point virgule à la fin ; est obligatoire
    echo 'Bonjour';
    // on peut également y ajouter des balises HTML
    echo '<br>';
    echo 'Bienvenue';

    // PRINT est aussi une instruction qui permet d'afficher
    print '<br> Nous sommes Lundi'; 
    // Cependant ECHO renvoit l'instruction plus rapidement. Il faut le priviligier à PRINT

    // On peut mélanger le HTML et le PHP
    echo '<h3> ceci est un titre h3 </h3>';
    echo '<h2> Ceci est un titre h2 </h2>';

?>

