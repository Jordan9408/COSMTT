<?php include_once('../parts/header.php') ?>
<?php include_once('../../../config/config.php') ?>
<?php
// Include your database connection file here
include_once "../connect_ddb.php";

class UserEditor
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateUser($user_id, $firstName, $lastName, $email, $password, $role)
    {
        // Utilisation de requêtes préparées pour éviter les injections SQL
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hasher le mot de passe

        $sql = "UPDATE users SET firstName = ?, lastName = ?, email = ?, password = ?, role = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $firstName, $lastName, $email, $hashedPassword, $role, $user_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getUser($user_id)
    {
        // Utilisation de requêtes préparées pour éviter les injections SQL
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

if (isset($_GET['id'])) {
    // Vérifie si la variable 'id' a été transmise via la méthode GET
    $user_id = $_GET['id'];
    // Stocke la valeur de 'id' dans la variable $user_id
    $userEditor = new UserEditor($conn);
    // Crée une instance de la classe 'UserEditor' en utilisant la connexion à la base de données '$conn'

    // vérifie si des données ont été soumises via la méthode POST 
    if (isset($_POST['send'])) {
        // Vérifie si le formulaire a été soumis, c'est-à-dire si le bouton 'send' a été cliqué
        $firstName = $_POST['firstName'];
        // Stocke la valeur du champ 'firstName' du formulaire dans la variable $firstName
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];


        if (
            !empty($firstName) &&
            !empty($lastName) &&
            !empty($email) &&
            !empty($password) &&
            !empty($role)
        ) {
            if ($userEditor->updateUser($user_id, $firstName, $lastName, $email, $password, $role)) {
                header("Location: showUser.php");
            } else {
                header("Location: showUser.php?message=ModifyFail");
            }
        } else {
            header("Location: showUser.php?message=EmptyFields");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>

<body>
    <?php
    if (isset($user_id)) {
        $userEditor = new UserEditor($conn);
        $user = $userEditor->getUser($user_id);
        if ($user) {
    ?>
            <h2>Modifier un utilisateur</h2>
        <main>
            <form action="" method="POST" class="form encad">
                <div>
                    <label for="firstName">Prénom:</label>
                    <input type="text" name="firstName" placeholder="First Name" value="<?php echo $user['firstName']; ?>">
                    <label for="lastName">Nom:</label>
                    <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $user['lastName']; ?>">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $user['password']; ?>">
                    <label for="role">Rôle:</label>
                    <select name="role">
                        <option value="admin" <?php echo ($user['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="superAdmin" <?php echo ($user['role'] === 'superAdmin') ? 'selected' : ''; ?>>Super Admin</option>
                    </select>
                    <input type="submit" value="Modifier" name="send">
                    <input type="submit" value="Annuler" name="send">
                </div>
            </form>
        </main>
    <?php
        } else {
            echo "Utilisateur non trouvé.";
        }
    } else {
        echo "ID de l'utilisateur non spécifié.";
    }
    ?>
</body>

</html>