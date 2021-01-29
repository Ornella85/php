<?php
  $nom_fichier = "liste.txt";
  $fichier = file($nom_fichier);

  //   var_dump($fichier);

   // la fonction file() fait tt le travail. Elle nous retourne chaque ligne d'un fichier à des indices différents dans un tableau array
  // Affiche le contenu du tableau du fichier liste.text
  // Il a récupéré toutes les lignes et affiche les indices et leurs valeurs
  print_r("<pre>"); print_r($fichier); print "</pre>";

  foreach($fichier as $valeur) // pour parcourir et récupérer les données du tableau 
{
    echo $valeur . "<br>";
}

// unlink($nom_fichier); //supprime le fichier


?>