<?php include_once('../parts/header.php') ?>

<?php
class User
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addUser($firstName, $lastName, $email, $password, $role)
    {
        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Requête SQL pour insérer un nouvel utilisateur dans la base de données
        $sql = "INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt) {
            // Liaison des paramètres à la requête SQL
            $stmt->bind_param("sssss", $firstName, $lastName, $email, $hashedPassword, $role);
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

// Variables pour conserver les valeurs du formulaire
$firstNameValue = "";
$lastNameValue = "";
$emailValue = "";
$roleValue = "";

if (isset($_POST['send'])) { // Vérifie si le formulaire a été soumis
    if (
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['confPassword']) &&
        isset($_POST['role']) &&
        $_POST['firstName'] != "" &&
        $_POST['lastName'] != "" &&
        $_POST['email'] != "" &&
        $_POST['password'] != "" &&
        $_POST['confPassword'] != "" &&
        $_POST['role'] != ""
    ) {
        // Inclusion du fichier de connexion à la base de données
        include_once("../connect_ddb.php");

        // Création d'une instance de la classe User
        $user = new User($conn);

        // Récupération des données du formulaire
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];
        $role = $_POST['role'];

        // Vérification des règles spécifiques
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location:addUser.php?message=InvalidEmail");
            exit();
        }

        // Vérification des qu'il n'y est aucun nbre ds firstName et lastName
        if (preg_match('/[0-9]/', $firstName) || preg_match('/[0-9]/', $lastName)) {
            header("location:addUser.php?message=NameContainsNumbers");
            exit();
        }

        if ($password === $confPassword) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Appel de la méthode addUser pour ajouter l'utilisateur à la base de données
            if ($user->addUser($firstName, $lastName, $email, $password, $role)) {
                header("location:showUser.php");
            } else {
                header("location:addUser.php?message=AddFail");
            }
        } else {
            header("location:addUser.php?message=PasswordMismatch");
        }
    } else {
        header("location:addUser.php?message=EmptyFields");
    }

    // Conservez les valeurs des champs du formulaire en cas d'erreur
    $firstNameValue = $_POST['firstName'];
    $lastNameValue = $_POST['lastName'];
    $emailValue = $_POST['email'];
    $roleValue = $_POST['role'];
}
?>


<body>
    <h2>Ajouter un utilisateur</h2>
    <main>
     <!-- Affichage des messages d'erreur en fonction des paramètres GET -->
        <?php
        if (isset($_GET['message'])) {
            $errorMessage = "";
            switch ($_GET['message']) {
                case 'InvalidEmail':
                    $errorMessage = "L'adresse email n'est pas valide.";
                    break;
                case 'NameContainsNumbers':
                    $errorMessage = "Les prénom et nom ne doivent pas contenir de chiffres.";
                    break;
                case 'PasswordMismatch':
                    $errorMessage = "Le mot de passe doit être identique à la confirmation.";
                    break;
                case 'AddFail':
                    $errorMessage = "Échec de l'ajout de l'utilisateur.";
                    break;
                case 'EmptyFields':
                    $errorMessage = "Veuillez remplir tous les champs obligatoires.";
                    break;
                default:
                    $errorMessage = "Une erreur inconnue s'est produite.";
                    break;
            }
            echo "<div class='error-message'>$errorMessage</div>";
        }
        ?>
       
        <form action="" method="POST" class="form encad">
            <div>
                <label for="firstName">Prénom:</label>
                <input type="text" name="firstName" placeholder="First Name" value="<?php echo isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : ''; ?>">
                <label for="lastName">Nom:</label>
                <input type="text" name="lastName" placeholder="Last Name" value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" placeholder="Password">
                <label for="confPassword">Confirmer le mot de passe :</label>
                <input type="password" name="confPassword" placeholder="Confirm Password">
                <label for="role">Rôle:</label>
                <select name="role">
                    <option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] === 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="superAdmin" <?php if(isset($_POST['role']) && $_POST['role'] === 'superAdmin') echo 'selected'; ?>>superAdmin</option>
                </select>
                <input type="submit" value="Ajouter" name="send">
            </div>
        </form>
    </main>
</body>

</html>

 
 <!-- Formulaire d'ajout utilisateur avec des champs pré-remplis en cas d'erreur -->