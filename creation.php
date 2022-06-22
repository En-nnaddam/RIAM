<?php
include('./classes/DB.php');
include('./classes/Ferme.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Creation</title>
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
			<h2 class="form-container__form__header">Entrez les Donnees de votre ferme svp!</h2>

			<input type="text" name="nom" placeholder="nom" value="<?php if (isset($_POST['nom'])) echo $_POST['nom']; ?>" class="primary-input">
			<input type="text" name="commune" placeholder="commune" value="<?php if (isset($_POST['commune'])) echo $_POST['commune']; ?>" class="primary-input">
			<input type="text" name="adresse" placeholder="adresse" value="<?php if (isset($_POST['adresse'])) echo $_POST['adresse']; ?>" class="primary-input">
			<input type="text" name="region" placeholder="region" value="<?php if (isset($_POST['region'])) echo $_POST['region']; ?>" class=" primary-input">

			<input type="submit" name="inscrire" value="S'inscrire" class="primary-button">
		</form>
		<div class="se-connecter">
			<h1 class="se-connecter__header">Vous avez deja un compte ?<span>Connectez-vous maintenant !</span></h1>
			<a href="./demande_labilisation.php" class="primary-button">Se connecter</a>
		</div>
	</main>

	<?php include('./ui/footer.php');	?>
	<script src="./js/navigation.js"></script>
	<?php include('./controllers/creation.controller.php'); ?>
</body>

</html>