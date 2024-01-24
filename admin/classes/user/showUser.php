<?php include_once('../parts/header.php') ?>

<?php include_once('../../../config/config.php') ?>
<?php
// Classe pour la gestion des utilisateurs
class UserManager
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
                echo "<td><a class='image' href='modifyUser.php?id=" . $user['user_id'] . "'><img src='../../../img/icones/write.png' alt=''></a></td>";
                echo "<td><a class='image' href='deleteUser.php?id=" . $user['user_id'] . "'><img src='../../../img/icones/remove.png' alt=''></a></td>";
                echo "</tr>";
            }
        } else {
            echo "<p class='message'>Aucun utilisateur présent !</p> ";
        }
    }
}

include_once "../connect_ddb.php";

// Création d'une instance de la classe UserManager
$userManager = new UserManager($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style_admin.css">
</head>

<body>
    <main>
        <div id="container">
            <div class="link_container">
                <a href="addUser.php" class="link">Ajouter un utilisateur</a>
            </div>
            <section class="table-container">
                <table>
                    <thead>
                        <?php
                        // Appel de la méthode pour afficher les en-têtes du tableau
                        $userManager->displayUsers();
                        ?>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>

</html>
<!-- <?php include_once('../parts/footer.php') ?> -->