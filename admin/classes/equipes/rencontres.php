<?php
include ('../connect_ddb.php');

// Fonction pour créer une rencontre
function addRencontres($equipe_dom_id, $equipe_ext_id, $date_rencontre, $score_dom, $score_ext) {
    global $conn;
    $sql = "INSERT INTO rencontres (equipe_dom_id, equipe_ext_id, date_rencontre, score_dom, score_ext) VALUES ('$equipe_dom_id', '$equipe_ext_id', '$date_rencontre', '$score_dom', '$score_ext')";
    $result = $conn->query($sql);
    return $result;
}

// Fonction pour lire toutes les rencontres
function readRencontres() {
    global $conn;
    $sql = "SELECT * FROM rencontres";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fonction pour mettre à jour une rencontre
function updateRencontre($id, $score_dom, $score_ext) {
    global $conn;
    $sql = "UPDATE rencontres SET score_dom='$score_dom', score_ext='$score_ext' WHERE id=$id";
    $result = $conn->query($sql);
    return $result;
}

// Fonction pour supprimer une rencontre
function deleteRencontre($id) {
    global $conn;
    $sql = "DELETE FROM rencontres WHERE id=$id";
    $result = $conn->query($sql);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>go</h1>
    <form action="">
        
    </form>
</body>
</html>

