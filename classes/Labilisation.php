<?php
include('./helpers/arrayToSelect.php');
include('./helpers/getEnums.php');

class Labilisation
{
    public static function demande($idFerme, $jour)
    {
        $conn = DB::connect();
        $sql = "INSERT INTO demande_labilisation(idCompte, idFerme ,jour) VALUES(?,?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$_SESSION['user']['idCompte'], $idFerme, $jour]);
    }

    public static function getJours()
    {
        return   getEnums('demande_labilisation', 'jour');
    }

    public static function fetchAllByCompteId($idCompte)
    {
        $conn = DB::connect();
        $sql = 'SELECT * FROM demande_labilisation WHERE idCompte = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idCompte]);
        return $stmt->fetchAll();
    }

    public static function fetchAllForAdmin()
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM demande_labilisation WHERE status = 'en traitement'";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
    }

    public static function upadateStatus($demandeId, $status)
    {
        $conn = DB::connect();
        $sql = "UPDATE demande_labilisation
        SET status = ?
        WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$status, $demandeId]);
    }

    public static function approuve($demandeId)
    {
        return self::upadateStatus($demandeId, 'approuver');
    }

    public static function refuse($demandeId)
    {
        return self::upadateStatus($demandeId, 'refuser');
    }

    // User Interfaces :
    public static function displayJours()
    {
        $jours = self::getJours();
        return arrayToSelect($jours, 'jour');
    }

    public static function display($labilisation)
    {
        return <<<HTML
            <div class="demande">
                <h2 class="demande__header">DemandeID : {$labilisation['id']}</h2>
                <div class="row gap">
                    <h3>FermeID:</h3>
                    <p>{$labilisation['idFerme']}</p>
                </div>
                <div class="row gap">
                    <h3>Jour:</h3>
                    <p>{$labilisation['jour']}</p>
                </div>
                <div class="row gap">
                    <h3>Status:</h3>
                    <p class='demande__status'>{$labilisation['status']}</p>
                </div>
            </div>
        HTML;
    }

    public static function displayAllByCompteId($idCompte)
    {
        $demandes = self::fetchAllByCompteId($idCompte);
        $ui = '';
        foreach ($demandes as $demande) {
            $ui .= self::display($demande);
        }
        return $ui;
    }

    public static function displayForAdmin($labilisation)
    {
        return <<<HTML
            <form method="post" class="demande">
                <input type="text" name='demandeId' class='display-none' value="{$labilisation['id']}">
                <h2 class="demande__header">DemandeID : {$labilisation['id']}</h2>
                <div class="row gap">
                    <h3>CompteID:</h3>
                    <p>{$labilisation['idCompte']}</p>
                </div>
                <div class="row gap">
                    <h3>FermeID:</h3>
                    <p>{$labilisation['idFerme']}</p>
                </div>
                <div class="row gap">
                    <h3>Jour:</h3>
                    <p>{$labilisation['jour']}</p>
                </div>
                <div class="row gap">
                    <input type="submit" value='Approuver' name='validation' class="primary-button">
                    <input type="submit" value='Refuser' name='validation' class="secondary-button">
                </div>
            </form>
        HTML;
    }
    public static function displayAllforAdmin()
    {
        $demandes = self::fetchAllForAdmin();
        $ui = '';
        foreach ($demandes as $demande) {
            $ui .= self::displayForAdmin($demande);
        }
        return $ui;
    }
}
