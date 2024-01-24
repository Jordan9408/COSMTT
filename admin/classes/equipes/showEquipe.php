<?php
include_once('../parts/header.php');
include_once('../connect_ddb.php');

class EquipeManager
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function ajouterEquipe($nomEquipe, $poule)
    {
        if (empty($nomEquipe) || empty($poule)) {
            header("Location: showEquipe.php?message=EmptyFields");
            // echo "Veuillez remplir tous les champs pour ajouter une équipe.";
            exit;
        }

        // Vérifier si l'équipe existe déjà dans la même poule
        $existingEquipe = $this->getEquipeByNameAndPoule($nomEquipe, $poule);

        if ($existingEquipe) {
            header("Location: showEquipe.php?message=EquipeExists");
            // echo "L'équipe $nomEquipe existe déjà dans la poule $poule.";
            exit;
        }

        $query = "INSERT INTO Equipes (NomEquipe, Poules) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param('ss', $nomEquipe, $poule);
            if ($stmt->execute()) {
                // echo "Équipe ajoutée avec succès.";
                header("Location: showEquipe.php");
                exit;
            } else {
                // echo "Erreur lors de l'ajout de l'équipe.";
                header("Location: showEquipe.php?message=Error");
                exit;
            }
        } else {
            // echo "Erreur de préparation de la requête.";
            header("Location: showEquipe.php?message=Error");
            exit;
        }
    }

    public function getEquipeByNameAndPoule($nomEquipe, $poule)
    {
        $sql = "SELECT * FROM Equipes WHERE NomEquipe = ? AND Poules = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $nomEquipe, $poule);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

        return null;
    }

    public function getEquipesByPoule($poule)
    {
        $equipes = array();

        $sql = "SELECT * FROM Equipes WHERE Poules = ? ORDER BY NomEquipe ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $poule);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $equipes[] = $row;
            }
        }

        return $equipes;
    }

    public function displayEquipes($poule)
    {
        $equipes = $this->getEquipesByPoule($poule);

        if (!empty($equipes)) {
            echo "<table>";
            echo "<tr>";
            echo "<th colspan=2>" . $poule . "</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Equipes</th>";
            echo "<th>Supprimer</th>";
            echo "</tr>";

            foreach ($equipes as $equipe) {
                echo "<tr>";
                echo "<td>" . ucfirst($equipe['NomEquipe']) . "</td>";
                echo "<td><a class='image' href='deleteEquipe.php?id=" . $equipe['equipe_id'] . "'><img src='../../../img/icones/remove.png' alt=''></a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='message'>Aucune équipe présente dans la poule $poule !</p>";
        }
    }

    public function supprimerEquipe($equipe_id)
    {
        $query = "DELETE FROM Equipes WHERE equipe_id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param('i', $equipe_id);
            if ($stmt->execute()) {
                header("location:showEquipe.php");
                // echo "Équipe supprimée avec succès.";
            } else {
                header("location:showEquipe.php?message=EmptyFields");
                // echo "Erreur lors de la suppression de l'équipe.";
            }
        } else {
            echo "Erreur de préparation de la requête de suppression.";
        }
    }
}

$equipeManager = new EquipeManager($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nomEquipe'], $_POST['poule'])) {
        $nomEquipe = $_POST['nomEquipe'];
        $poule = $_POST['poule'];

        $nomEquipe = htmlspecialchars($nomEquipe); // Échapper les caractères spéciaux HTML
        $poule = htmlspecialchars($poule);

        $nomEquipe = $conn->real_escape_string($nomEquipe); // Échapper les caractères spéciaux SQL
        $poule = $conn->real_escape_string($poule);

        $equipeManager->ajouterEquipe($nomEquipe, $poule);
    } elseif (isset($_POST['equipe_id'])) {
        $equipe_id = $_POST['equipe_id'];
        $equipeManager->supprimerEquipe($equipe_id);
    }
}


?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des équipes</title>
    <!-- <link rel="stylesheet" href="../../css/style_admin.css"> -->
    <link rel="stylesheet" href="../../css/popup.css">
</head>

<body>
    <h2>Liste des équipes</h2>

    <main>    
        <?php
            if (isset($_GET['message'])) {
                $errorMessage = "";
                switch ($_GET['message']) {
                    case 'EmptyFields':
                        $errorMessage = "Veuillez remplir tous les champs obligatoires.";
                    break;
                    case 'EquipeExists' :
                        $errorMessage = "L'équipe existe déjà dans la poule sélectionnée.";
                    break;
                    default:
                        $errorMessage = "Une erreur inconnue s'est produite.";
                    break;
                }
                echo "<div class='error-message'>$errorMessage</div>";
            }
    ?>
        <a href="javascript:void(0);" id="showPopup">Ajouter une équipe</a>
        <!-- Popup pour ajouter une équipe -->
        <div class="popup" id="teamPopup">
            <div class="popup-card">
                <div class="popup-content">
                    <button id="closePopup">&times;</button>
                    <h3>AJOUTER UNE ÉQUIPE</h3>
                    <form method="POST" action="" class="form-ajout">
                        <div class="form-group">
                            <input type="text" name="nomEquipe" class="input-popup" placeholder="Nom de l'équipe" required>
                            <label for="poule">Division:</label>
                            <select name="poule" required>
                                <option value="PouleA">Poule A</option>
                                <option value="PouleB">Poule B</option>
                            </select>
                        </div>
                        <input type="submit" value="Ajouter" class="input-submit" name="send">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <main>
        <div class="table-container">
            <section class="show-tab">
                <?php
                $equipeManager->displayEquipes("PouleA");
                ?>
            </section>
            <section class="show-tab">
                <?php
                $equipeManager->displayEquipes("PouleB");
                ?>
            </section>
        </div>
    </main>

    <script src="../../js/app.js"></script>

</body>

</html>