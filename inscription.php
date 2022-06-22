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
	<title>Inscription</title>
	<link rel="stylesheet" href="./styles/global.css">
	<link rel="stylesheet" href="./styles/navigation.css">
	<link rel="stylesheet" href="./styles/footer.css">
	<link rel="stylesheet" href="./styles/primary-form.css">
	<link rel="stylesheet" href="./styles/se-connecter.css">
</head>

<body>
	<?php include('./ui/navigation.php'); ?>
	<main class="form-container">
		<form method="post" action="" class="form-container__form">
			<h1 class="form-container__form__header">Creez votre compte et profitez de notre services des maintenant</h1>

			<input type="text" name="nom" placeholder="Nom" value="<?php if (isset($_POST["nom"])) echo $_POST['nom']; ?>" class="primary-input">
			<input type="text" name="prenom" placeholder="Prenom" value="<?php if (isset($_POST["prenom"])) echo $_POST['prenom']; ?>" class="primary-input">
			<input type="email" name="mail" placeholder="E-mail" value="<?php if (isset($_POST["mail"])) echo $_POST['mail']; ?>" class="primary-input">
			<input type="text" name="tel" placeholder="tel" value="<?php if (isset($_POST["tel"])) echo $_POST['tel']; ?>" class="primary-input">
			<input type="text" name="pays" placeholder="pays" value="<?php if (isset($_POST["pays"])) echo $_POST['pays']; ?>" class="primary-input">
			<input type="text" name="adresse" placeholder="adresse" value="<?php if (isset($_POST["adresse"])) echo $_POST['adresse']; ?>" class="primary-input">
			<input type="text" name="profession" placeholder="profession" value="<?php if (isset($_POST["profession"])) echo $_POST['profession']; ?>" class="primary-input">
			<input type="date" name="ddn" placeholder="date de naissance" value="<?php if (isset($_POST["ddn"])) echo $_POST['ddn']; ?>" class="primary-input">
			<?= Compte::displayTypes() ?>
			<input type="password" name="password1" placeholder="Mot de passe" value="<?php if (isset($_POST["password1"])) echo $_POST['password1']; ?>" class="primary-input">
			<input type="password" name="password2" placeholder="Confirmer le Mot de passe" value="<?php if (isset($_POST["password2"])) echo $_POST['password2']; ?>" class="primary-input">
			<input type="submit" name="inscrire" value="S'inscrire" class="primary-button">
		</form>
		<div class="se-connecter">
			<h1 class="se-connecter__header">Vous avez deja un compte ?<span>Connectez-vous maintenant !</span></h1>
			<a href="./connection.php" class="primary-button">Se connecter</a>
		</div>
	</main>
	<?php include('./ui/footer.php'); ?>
	<script src="./js/navigation.js"></script>
	<?php include('./controllers/inscreption.controller.php'); ?>
</body>

</html>