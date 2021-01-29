<?php

function debug($var, $mode = 1)
    {
        echo '<div class="col-md-6 offset-md-3 alert alert-success">'; 
        $trace = debug_backtrace();// la fonction predefinie debug_backtrace()retourne un tableau ARRAY contenant des informations tel que la ligne et le fichier ou est exécuter la fonction
        // echo '<pre>'; print_r($trace); echo '</pre>';
        
        $trace = array_shift($trace);
        //echo '<pre>'; print_r($trace); echo '</pre>';

        echo "Debug demandé dans le fichier <strong>$trace[file]</strong> à la ligne <strong>$trace[line]</strong><hr>";
        
        if($mode == 1)
        {
            echo '<pre>'; print_r($var); echo '</pre>';
        }else{
            echo '<pre>'; var_dump($var); echo '<pre>';
        }
      
        echo '</div>';  
    }

    // pour reduire le champs description
    function tronque($str, $nb = 150) 
{
    // Si le nombre de caractères présents dans la chaine est supérieur au nombre 
    // maximum, alors on découpe la chaine au nombre de caractères 
    if (strlen($str) > $nb) 
    {
        $str = substr($str, 0, $nb);
        $position_espace = strrpos($str, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $texte = substr($str, 0, $position_espace);  //on redécoupe à la fin du dernier mot
        $str = $str."..."; //puis on rajoute des ...
    }
    return $str; //on retourne la variable modifiée
}
?>