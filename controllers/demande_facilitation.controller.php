<?php
if (!isset($_SESSION['user']))
    header('location: ./connection.php');

include('./helpers/alert.php');

try {
    if (
        $_SESSION['user']['type_compte'] !== 'consommateur'
    ) throw new Error("Desolé vous n\'etes pas autoriser, Ce service est just pour les consommateurs");

    if (isset($_POST['demander'])) {
        if (empty($_POST['domaine']))
            throw new Error('Merci de remplire tous les champs !');

        Facilitation::demande($_POST['domaine']);
        alert('Merci pour votre demande');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    alert($e->getMessage());
}
