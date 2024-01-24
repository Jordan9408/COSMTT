<?php
include ('../connect_ddb.php');
include_once ('./equipe.php');
include ('../../../include/functions.php');

// Fonction pour supprimer une équipe
// function deleteEquipe($id) {
//     global $conn;
//     $sql = "DELETE FROM equipes WHERE id = ?";
//     $result = $conn->query($sql);
//     return $result;
// }

// Traitement du formulaire d'ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ajouter_equipe'])) {
        $nom = $_POST['nom'];
        addEquipe($nom);
    }
}

// Traitement du formulaire de mise à jour
if (isset($_POST['modifier_equipe'])) {
    $id = $_POST['equipe_id'];
    $nom = $_POST['nom'];
    updateEquipe($id, $nom);
}

// Traitement de la suppression d'équipe
if (isset($_GET['action']) && $_GET['action'] == 'supprimer' && isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteEquipe($id);
}

$equipes = readEquipes();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des équipes</title>
</head>
<body>
    <h1>Liste des équipes</h1>

    <!-- Formulaire d'ajout d'équipe -->
    <form method="POST">
        <h2>Ajouter une équipe</h2>
        <label>Nom de l'équipe:
            <input type="text" name="nom" required>
        </label>
        <button type="submit" name="ajouter_equipe">Ajouter</button>
    </form>

    <!-- Liste des équipes existantes -->
    <h2>Équipes existantes</h2>
    <ul>
        <?php foreach ($equipes as $equipe) : ?>
            <li>
                <?php echo $equipe['nom']; ?>
                <a href="?action=supprimer&id=<?php echo $equipe['id']; ?>">Supprimer</a>
                <a href="editer_equipe.php?id=<?php echo $equipe['id']; ?>">Éditer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<!--
class Equipe
{
    private $conn;

    // Constructeur pour établir la connexion à la base de données
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Méthode pour récupérer la liste des utilisateurs
    public function getUsers()
    {
        $users = array();

        $sql = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }

        return $users;
    }

    // Méthode pour afficher la liste des utilisateurs dans le tableau
    public function displayUsers()
    {
        $users = $this->getUsers();

        if (!empty($users)) {
            echo "<tr>";
            echo "<th>Prénom</th>";
            echo "<th>Nom</th>";
            echo "<th>Email</th>";
            echo "<th>Mot de passe</th>";
            echo "<th>Rôle</th>";
            echo "<th>Modifier</th>";
            echo "<th>Supprimer</th>";
            echo "</tr>";

            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . $user['firstName'] . "</td>";
                echo "<td>" . $user['lastName'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['password'] . "</td>";
                echo "<td>" . $user['role'] . "</td>";
                echo "<td class='image'><a href='modifyUser.php?id=" . $user['user_id'] . "'><img src='../../../img/icones/write.png' alt=''></a></td>";
                echo "<td class='image'><a href='deleteUser.php?id=" . $user['user_id'] . "'><img src='../../../img/icones/remove.png' alt=''></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<p class='message'>Aucun utilisateur présent !</p> ";
        }
    }
}
-->