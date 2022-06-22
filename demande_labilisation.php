<?php
session_start();

include('./classes/DB.php');
include('./classes/Labilisation.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de labilisation</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/primary-form.css">
    <link rel="stylesheet" href="./styles/se-connecter.css">
</head>

<body>
    <?php include('./ui/navigation.php'); ?>
    <main class="form-container">
        <form method="post" class="form-container__form">
            <h1 class="form-container__form__header">Merci de Demander une Ferme</h1>
            <input type="text" name="idFerme" placeholder="id Ferme" class="primary-input" value="<?php if (isset($_POST['idFerme'])) echo $_POST['idFerme'] ?>" />
            <?= Labilisation::displayJours() ?>
            <input type="submit" name="demander" value="Demander" class="primary-button">
        </form>
        <div class="se-connecter">
            <h1 class="se-connecter__header">Vous n'avez pas un compte de ferme ?<span>Creez-le maintenant !</span></h1>
            <a href="./creation.php" class="primary-button">Creer Un Compte</a>
        </div>
    </main>
    <?php include('./ui/footer.php'); ?>
    <script src="./js/navigation.js"></script>
    <?php include('./controllers/demande_labilisation.controller.php'); ?>
</body>

</html>