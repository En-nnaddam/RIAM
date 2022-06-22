<?php
session_start();

if (!isset($_SESSION['admin']))
    header('location: ./adminLogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenu <?= $_SESSION['admin']['type_compte'] ?></title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
</head>

<body>
    <?php include('./ui/navigation.php') ?>
    <main class="container column gap">
        <h1 class="primary-header">Bienvenu <?= $_SESSION['admin']['user_name'] ?></h1>
        <?php
        if ($_SESSION['admin']['type_compte'] === 'enqueteur')
            include('./consulte_enquetes.php');
        else if ($_SESSION['admin']['type_compte'] === 'coordinateur')
            include('./adminMissions.php');
        ?>
        <a href="./seDeconnecter.php" class="secondary-light-button">Deconnecter</a>
    </main>
    <?php include('./ui/footer.php') ?>
    <script src="./js/navigation.js"></script>
</body>

</html>