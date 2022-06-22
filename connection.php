<?php
session_start();

if (isset($_SESSION['user']))
    header('location:' . $_SERVER['HTTP_REFERER']);

include('./classes/DB.php');
include('./classes/Compte.php');
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/primary-form.css">
    <link rel="stylesheet" href="./styles/se-connecter.css">
</head>

<body>
    <?php include('./ui/navigation.php') ?>
    <main class="form-container">
        <form method="post" action="" class="form-container__form">
            <h1 class="form-container__form__header">Pouvez vous identifier svp!</h1>
            <input type="text" name="email" placeholder="E-mail" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" class="primary-input">
            <input type="password" name="password" placeholder="Mot de passe" class="primary-input">
            <input type="submit" name="connecter" value="Se connecter" class="primary-button">
        </form>
        <div class="se-connecter">
            <h1 class="se-connecter__header">Vous n'avez pas un compte ?<span>Creez-le maintenant !</span></h1>
            <a href="./inscription.php" class="primary-button">Creer Un Compte</a>
        </div>
    </main>
    <?php include('./ui/footer.php'); ?>
    <script src="./js//navigation.js"></script>
    <?php include('./controllers/connection.controller.php'); ?>
</body>

</html>