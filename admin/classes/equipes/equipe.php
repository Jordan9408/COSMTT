<?php
// include ('../../../config/config.php');
include ('../connect_ddb.php');
include ('../../../include/functions.php');


$equipes = readEquipes();

if (count($equipes) > 0) {
    foreach ($equipes as $equipe) {
        $nom = $equipe['nom'];
        // Faites ce que vous voulez avec la valeur $nom (par exemple, l'afficher).
        echo $nom . '<br>';
    }
} else {
    echo "Aucune équipe trouvée.";
}
?>
