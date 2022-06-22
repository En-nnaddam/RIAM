<?php
include('./helpers/alert.php');
try {
    if (isset($_POST['update'])) {
        $res = Compte::updateById(
            $_SESSION['user']['idCompte'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            $_POST["pays"],
            $_POST['adresse'],
            $_POST['profession'],
            $_POST['ddn']
        );
        alert('Compte Updated Successfuly');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    alert($e->getMessage());
}
