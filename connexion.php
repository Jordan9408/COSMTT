<?php require_once('./admin/classes/connect_ddb.php') ?>
<?php require_once('./admin/classes/create_tab.php') ?>
<?php require_once('./html_partials/header.php') ?>
<?php 
     session_start();
    if(isset($_POST['valid-button'])) {
    // Nous allons vérifier les infos du formulaire
    if(isset($_POST['email']) && isset($_POST['password'])) { // On vérifie ici si l'utilisateur a rentre des infos
        // Nous allons mettre l'email et le mot de passe dans des variable
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error = "";
        // Nous allons vérifier si les infos  entrée sont correctes
        // Connexion à la base de données
        include_once('./config/config.php');

        // Create connection
        $conn = mysqli_connect($host, $user, $pass, $dbname);
        
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        $result = mysqli_fetch_assoc($result);
   
        
        if($result) {
            //creation de la session
            // var_dump($hashPassword);
            // var_dump($result['password']);
            //controler le mot de passe 
            // var_dump(password_verify($hashPassword, $result['password']));

            // si le mot de pase est ok
            // je creer la session 
            // sinon je renvoi a la page d'accueil
            if(password_verify($password, $result['password'])){
                // Le mot de passe est correct, puis créez la session
                $_SESSION['email'] = $result['email'];
                $_SESSION['firstName'] = $result['firstName'];
                $_SESSION['role'] = $result['role'];
                header("Location: ./admin/classes/home.php");        
            }else { 
               $error = "Adresse Mail ou Mots de passe incorrectes !";
            }
        }
    }
}
?>
<main>
    <div class="main">
    <h2 id="connexion">Connexion</h2>
    <div class="connect">
    <?php 
       if(isset($error)){ // si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Error'>".$error."</p>"  ;
       }
       ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="encad">
                <label for="email">Email :</label>
                <input type="email" id="email" class="connect-input" name="email" required>

                <label for="password">Mot de passe :</label>
                <div class="mdp">
                    <input type="password" id="password" class="connect-input" name="password" required>
                    <i class="fa-solid fa-eye"></i>
                </div>
                <a href="reset_password.php" class="mdp_oublie">Mot de passe oublié</a>

                <input type="submit" id="connect-submit" class="connect-submit" value="Connectez-vous" name="valid-button">
            </div>
        </form>
    </div>
    </div>
</main>
<script src="./js/app.js"></script>
<?php include('./html_partials/footer.php') ?>