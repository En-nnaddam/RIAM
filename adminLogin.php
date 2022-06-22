<?php
session_start();

include('./classes/DB.php');
include('./classes/Admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="./styles/navigation.css">
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/primary-form.css">
</head>

<body>
    <?php include('./ui/navigation.php'); ?>
    <main class="container">
        <form method="post" action="" class="form-container__form">
            <h2 class="form-container__form__header ">Admin Login</h2>
            <input type="text" placeholder="User Name" name="user_name" class="primary-input" value="<?php if (isset($_POST['user_name'])) echo $_POST['user_name'] ?>">
            <input type="password" placeholder="password" name="password" class="primary-input">
            <input type="submit" value="Se connecter" name="se_connecter" class="primary-button">
        </form>
    </main>
    <?php include('./ui/footer.php'); ?>
    <script src="./js/navigation.js"></script>
    <?php include('./controllers/adminLogin.controller.php'); ?>
</body>

</html>