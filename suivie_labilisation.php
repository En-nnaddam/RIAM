<?php
session_start();

if (!isset($_SESSION['user']))
    header('location: ./connection.php');

include('./classes/DB.php');
include('./classes/Labilisation.php');
include('./ui/errorAlert.php');

try {
    if ($_SESSION['user']['type_compte'] !== 'producteur')
        throw new Error("Desolé vous n'etes pas autoriser, Ce service est just pour les producteurs");

    $demandes = Labilisation::displayAllByCompteId($_SESSION['user']['idCompte']);
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    $errorMessage = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivie la Demande de Facilitation</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/demande.css">
</head>

<body>
    <?php include('./ui/navigation.php'); ?>

    <main class="demande__container">
        <?php
        if (isset($demandes))
            echo $demandes;
        else if (isset($errorMessage))
            errorAlert($errorMessage);
        ?>
    </main>

    <?php include('./ui/footer.php'); ?>
    <script src="./js/navigation.js"></script>
</body>

</html>