<?php
require_once('./config/config.php');

$error = "";

if(isset($_POST['recup_submit'])) {
  $recup_mail = $_POST['recup_mail'];
  
  if(empty($recup_mail)) {
    $error = "Veuillez entrer votre adresse e-mail";
  } elseif(!filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
    $error = "Adresse e-mail invalide";
  } else {
    // Vérifiez si l'adresse e-mail existe en base de données
    $check_email = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $check_email->execute([$recup_mail]);
    $user_id = $check_email->fetchColumn();

    if ($user_id) {
      // Générez un jeton unique
      $reset_token = bin2hex(random_bytes(32));

      // Stockez le jeton dans la base de données en l'associant à l'utilisateur
      $insert_token = $conn->prepare('INSERT INTO user (user_id, reset_token, created_at) VALUES (?, ?, NOW())');
      $insert_token->execute([$user_id, $reset_token]);

      // Construisez le lien de réinitialisation avec le jeton
      $reset_link = "https://votresite.com/reset-password.php?token=$reset_token";

      // Vous devrez envoyer un e-mail contenant le lien de réinitialisation
      // Assurez-vous d'utiliser une bibliothèque de messagerie sécurisée pour cela.

      // Exemple d'envoi d'e-mail (utilisez une bibliothèque de messagerie sécurisée)
      $to = $recup_mail;
      $subject = "Réinitialisation de mot de passe";
      $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $reset_link";
      $headers = "From: webmaster@votresite.com\r\n";
    
      // Utilisez des en-têtes pour spécifier le format du message et le charset
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=UTF-8\r\n";

      if (mail($to, $subject, $message, $headers)) {
        echo 'Un e-mail de réinitialisation du mot de passe a été envoyé à ' . $recup_mail;
      } else {
        $error = "Échec de l'envoi de l'e-mail de réinitialisation.";
      }
    } else {
      $error = "Cette adresse e-mail n'existe pas dans notre base de données.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="connect">
  <form class="form" method="POST" style="padding:15px;">
    <h3 id="h3_reset">Mot de passe oublié</h3>
    <?php if(!empty($error)) { echo "<div class='error-message'>$error</div>"; } ?>
    
        <div class="form-group">
            <!-- <label for="recup_mail">Email</label> -->
            <input type="email" id="email" name="recup_mail" placeholder="Votre adresse e-mail" required>
        </div>
        <button class="form-submit-btn" type="submit" name="recup_submit">Réinitialiser votre mot de passe</button>
    </form>
</div>
</body>
</html>
