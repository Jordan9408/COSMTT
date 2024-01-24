<?php
session_start();
require_once('./connect_ddb.php');
// require_once('../../config/config.php');

// Incluez le fichier d'en-tête si nécessaire
include_once('../html_partials/header.php');

if (!isset($_SESSION['firstName'])) {
    header('Location: ../../connexion.php');
    exit; // N'oubliez pas d'arrêter l'exécution du script après une redirection
}

$userFirstName = $_SESSION['firstName'];
echo '<h1>Bonjour ' . ucfirst($userFirstName) . '</h1>';

$role = ''; // Initialisez la variable $role à une valeur par défaut

if ($_SESSION['role'] == 'superAdmin') {
    $role = 'superAdmin';
} elseif ($_SESSION['role'] == 'admin'){
    $role = 'admin';
}

// Définir des liens en fonction du rôle de l'utilisateur
$links = [];

if ($role === 'superAdmin') {
    $links[] = '<li><a href="./user/showUser.php">Liste des Admins</a></li>';
    $links[] = '<li><a href="./infosClub/addInfoscCub.php">Infos Club</a></li>';
}

if ($role == 'admin' || $role == 'superAdmin') {
    $links[] = '<li><a href="./article/addArticle.php">Article</a></li>';
    $links[] = '<li><a href="./pages/photos/showGalerie.php">Galerie Photos</a></li>';
    $links[] = '<li><a href="./equipes/showEquipe.php">Championnat</a></li>';
    $links[] = '<li><a href="./photos/addresult.php">Classements</a></li>';
}

echo '<div id="menu_btn"><ul>' . implode('', $links) . '</ul></div>';
?>