<?php
try {
    if (isset($_POST['connecter'])) {
        if (
            empty($_POST['email'])
            || empty($_POST['password'])
        ) throw new Error('Merci de remplire tous les champs !');

        $compte = Compte::connect($_POST['email'], $_POST['password']);
        if ($compte)
            $_SESSION['user'] = [
                "nom" => $compte['nom'],
                "prenom" => $compte['prenom'],
                "idCompte" => $compte['idCompte'],
                "email" => $compte['email'],
                "type_compte" => $compte['type_compte']
            ];

        header('location:./index.php');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    echo "<script>alert('" . $e->getMessage() . "')</script>";
}
