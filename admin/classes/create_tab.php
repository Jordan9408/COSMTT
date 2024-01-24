<?php
require_once('connect_ddb.php');
// include_once('../../../config/config.php');

try {
    // Connexion à MySQL sans spécifier de base de données
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base de données
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($sql_create_db);
    // echo "Base de données créée avec succès !<br>";

    // Connexion à la base de données créée
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la table "users"
    $tab_users = "CREATE TABLE IF NOT EXISTS users (
        user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(30) NOT NULL,
        lastName VARCHAR(30) NOT NULL,
        email VARCHAR(100) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `role` ENUM('admin', 'superAdmin') DEFAULT 'admin',
        `reset_token` VARCHAR(255)
    ) ENGINE = InnoDB";
    $conn->exec($tab_users);
    // echo "Table 'users' créée avec succès !<br>";

    /************************* Table Page CRITERIUMS *************************/

    // Création de la table "articles"
    $tab_criteriums = "CREATE TABLE IF NOT EXISTS criteriums (
        id_crit INT PRIMARY KEY AUTO_INCREMENT,
        title_crit VARCHAR(255) NOT NULL,
        image_crit VARCHAR(255) NOT NULL,
        contenu_crit TEXT NOT NULL,
        pdf_crit LONGBLOB -- Colonne pour stocker les données binaires du PDF
    ) ENGINE = InnoDB";
    $conn->exec($tab_criteriums);
    // echo "Table 'criteriums' créée avec succès !<br>";


    /************************* Tables Page GALERIE PHOTOS *************************/

    // Création de la table "sections_photos"
    $tab_sections = "CREATE TABLE IF NOT EXISTS Categories_photos (
        section_id INT PRIMARY KEY AUTO_INCREMENT,
        section_title VARCHAR(255) NOT NULL,
        section_date DATETIME NOT NULL
    ) ENGINE = InnoDB";
    $conn->exec($tab_sections);
    // echo "Table 'sections_photos' créée avec succès !<br>";

    // Création de la table "photos"
    $tab_photos = "CREATE TABLE IF NOT EXISTS Photos (
        photo_id INT PRIMARY KEY AUTO_INCREMENT,
        section_id INT NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        FOREIGN KEY (section_id) REFERENCES Categories_photos(section_id)
    ) ENGINE = InnoDB";
    $conn->exec($tab_photos);
    // echo "Table 'photos' créée avec succès !<br>";
      

    /************************* Tables Page CHAMPIONNAT *************************/

    // Création de la table "Journée"
$tab_journeesChampionnat = "CREATE TABLE IF NOT EXISTS JourneesChampionnat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    NomJournee VARCHAR(50) NOT NULL,
    DateDebut DATE NOT NULL,
    DateFin DATE NOT NULL
) ENGINE = InnoDB";
$conn->exec($tab_journeesChampionnat);

// Création de la table "equipes"
$tab_equipes = "CREATE TABLE IF NOT EXISTS Equipes (
    equipe_id INT PRIMARY KEY AUTO_INCREMENT,
    NomEquipe VARCHAR(15) NOT NULL,
    `poules` ENUM('pouleA', 'pouleB') DEFAULT 'pouleA'
) ENGINE = InnoDB";
$conn->exec($tab_equipes);

// Création de la table "rencontres"
$tab_rencontres = "CREATE TABLE IF NOT EXISTS Rencontres (
    rencontre_id INT PRIMARY KEY AUTO_INCREMENT,
    JourneeId INT NOT NULL,
    DateRencontre DATETIME NOT NULL,
    EquipeDomicileId INT NOT NULL,
    EquipeExterieurId INT NOT NULL,
    ScoreDomicile INT NOT NULL,
    ScoreExterieur INT NOT NULL,
    -- FOREIGN KEY (JourneeId) REFERENCES JourneesChampionnat(id),
    FOREIGN KEY (EquipeDomicileId) REFERENCES Equipes(equipe_id),
    FOREIGN KEY (EquipeExterieurId) REFERENCES Equipes(equipe_id)
) ENGINE = InnoDB";
$conn->exec($tab_rencontres);

    /************************* Table Page CLASSEMENTS *************************/

    // Création de la table "classementJoueurs"
    $tab_classJoueurs = "CREATE TABLE IF NOT EXISTS classementJoueurs (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        NomJoueur VARCHAR(255) NOT NULL,
        Classement INT NOT NULL,
        PointsDebutSaison INT NOT NULL,
        PointsMensuels INT NOT NULL,
        EvolutionMensuelle INT NOT NULL
    ) ENGINE = InnoDB";
    $conn->exec($tab_classJoueurs);
    // echo "Table 'classementJoueurs' créée avec succès !<br>";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la base de données et des tables : " . $e->getMessage();
}
