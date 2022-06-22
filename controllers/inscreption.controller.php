<?php
include('./helpers/alert.php');

try {
    if (isset($_POST['inscrire'])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["mail"];
        $tel = $_POST["tel"];
        $pays = $_POST["pays"];
        $adresse = $_POST["adresse"];
        $ddn = $_POST["ddn"];
        $profession = $_POST["profession"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];
        $type_compte = $_POST['type_compte'];

        if (
            empty($nom)
            || empty($prenom)
            || empty($email)
            || empty($tel)
            || empty($pays)
            || empty($adresse)
            || empty($ddn)
            || empty($profession)
            || empty($password1)
            || empty($password2)
        )
            throw new Error('Merci de remplire tous les champs !');

        if ($password1 != $password2)
            throw new Error('Le deuxieme mot de passe est incorrecte !');

        $password = password_hash($password1, PASSWORD_DEFAULT);

        if (Compte::isRegistred($email))
            throw new Error('Email deja inscrit!');

        $isInscrit = Compte::create(
            $nom,
            $prenom,
            $tel,
            $pays,
            $email,
            $adresse,
            $ddn,
            $profession,
            $type_compte,
            $password
        );

        alert('Vous avez inscrit avec success!');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    alert($e->getMessage());
}
