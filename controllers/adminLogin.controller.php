<?php
include('./helpers/alert.php');
try {
    if (isset($_POST['se_connecter'])) {
        if (
            empty($_POST['user_name']) ||
            empty($_POST['password'])
        ) throw new Error('Merci de remplire tous les champs');

        $admin = Admin::fetch($_POST['user_name'], $_POST['password']);

        if (!$admin) throw new Error('UserName or password incorrect');

        $_SESSION['admin'] = [
            'user_name' => $admin['user_name'],
            'type_compte' => $admin['type_compte']
        ];

        header('location: ./admin.php');
    }
} catch (PDOException $e) {
    die('Database Problem: ' . $e->getMessage());
} catch (Exception $e) {
    die('Problem: ' . $e->getMessage());
} catch (Error $e) {
    alert($e->getMessage());
}
