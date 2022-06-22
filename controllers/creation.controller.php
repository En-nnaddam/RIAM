
<?php
try {
    if (isset($_POST['inscrire'])) {
        if (empty($_POST['nom']) || empty($_POST['region']) || empty($_POST['commune']) || empty($_POST['adresse']))
            throw new Error('Merci de remplire tous les champs !');

        if (Ferme::isRegistred($_POST['nom']))
            throw new Error('Ce nom deja exist, essayer un autre');

        Ferme::create($_POST['nom'], $_POST['region'], $_POST['commune'], $_POST['adresse']);

        header('location:./demande_labilisation.php');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    echo "<script>alert('" . $e->getMessage() . "')</script>";
}
