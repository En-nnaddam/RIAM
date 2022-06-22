<?php
try {
    if (isset($_POST['validation'])) {
        if ($_POST['validation'] === "Refuser")
            Labilisation::refuse($_POST['demandeId']);
        else if ($_POST['validation'] === "Approuver")
            Labilisation::approuve($_POST['demandeId']);
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    $errorMessage = $e->getMessage();
}
