
<?php require_once("include/init.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="include/styles.css">
    <title>Affichage</title>
</head>
<body>
    <?php $result = $pdo->query("SELECT * FROM logement"); ?>
    <div class="container-fluid text-center">
        <h4><a href="<?= URL?>ajout_logement.php">Ajouter un logement -> </a></h4>
    <h1 class="text-center mb-4">Liste des logements</h1>
    <table class="table">
    <tr>
        <?php for($i=0; $i < $result->columnCount(); $i++):
            $colonne = $result->getColumnMeta($i);
            //echo '<pre>'; print_r($colonne); echo '</pre>';
            //debug($colonne);
            if($colonne['name'] != 'id_logement')
            {
                echo "<th>$colonne[name]</th>";
            }
            ?>
        <?php endfor; ?>
        <?= "<th>action</th>" ?>

       <?php while($data = $result->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<tr>';
                    // foreach permet de parcourire les informations de chaque employé
                    foreach($data as $key => $value)
                    {
                        $lien = URL . "fiche_logement.php?id_logement=$data[id_logement]";// lien qui ser utiliser pour aller vers la fiche logement dans le td al fin du while

                        if($key != 'id_logement')
                        {
                            if($key == 'description')
                            {
                                echo '<td>'.substr($value, 0, 30).'...</td>';
                            }

                            if($key == 'photo')
                            {
                                echo "<td class='td-photo'><img class='img-thumbnail' src='$value'></td>";
                            }
                            
                            if($key != 'description' && $key != 'photo'){
                            
                                echo "<td>$value</td>";
                            }
                        }
                    }

                    $lien = URL . "fiche_logement.php?id_logement=$data[id_logement]";// lien qui ser utiliser pour aller vers la fiche logement
                    echo "<td><a href=\"$lien\">voir le bien</a></td>";
                }     
        ?>                
</table>

</body>
</html>