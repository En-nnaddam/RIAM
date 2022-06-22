<?php
session_start();

if (!isset($_SESSION['user']))
    header('location: ./connection.php');

include_once('./classes/DB.php');
include_once('./classes/Compte.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Compte</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/compte.css">
    <link rel="stylesheet" href="./styles/primary-form.css">
</head>

<body>
    <?php include('./ui/navigation.php'); ?>
    <main class="container">
        <?php
        $compte = Compte::fetchById($_SESSION['user']['idCompte']);
        echo Compte::display($compte);

        echo Compte::updateForm($_SESSION['user']['idCompte']);
        ?>
    </main>
    <?php include('./ui/footer.php'); ?>
    <script src="./js/navigation.js"></script>
    <?php include('./controllers/updateCompte.controller.php') ?>
</body>

</html>