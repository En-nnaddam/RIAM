<?php
include('./helpers/arrayToSelect.php');
include('./helpers/getEnums.php');

class Facilitation
{
    public static function demande($domaine)
    {
        $conn = DB::connect();
        $sql = 'INSERT INTO demande_facilitation(idCompte, domaine) VALUES(?,?)';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$_SESSION['user']['idCompte'], $domaine]);
    }

    public static function getDomains()
    {
        return getEnums('demande_facilitation', 'domaine');
    }

    public static function fetchAllByCompteId($idCompte)
    {
        $conn = DB::connect();
        $sql = 'SELECT * FROM demande_facilitation WHERE idCompte = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idCompte]);
        return $stmt->fetchAll();
    }

    public static function fetchAllForAdmin()
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM demande_facilitation WHERE status = 'en traitement'";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
    }

    public static function upadateStatus($demandeId, $status)
    {
        $conn = DB::connect();
        $sql = "UPDATE demande_facilitation
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
    public static function displayDomaines()
    {
        $domaines = self::getDomains();
        return arrayToSelect($domaines, 'domaine');
    }

    public static function display($facilitation)
    {
        return <<<HTML
            <div class="demande">
                <h2 class="demande__header">DemandeID : {$facilitation['id']}</h2>
                <div class="row gap">
                    <h3>Domaine:</h3>
                    <p>{$facilitation['domaine']}</p>
                </div>
                <div class="row gap">
                    <h3>Status:</h3>
                    <p class='demande__status'>{$facilitation['status']}</p>
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

    public static function displayForAdmin($facilitation)
    {
        return <<<HTML
            <form method="post" class="demande">
                <input type="text" name='demandeId' class='display-none' value="{$facilitation['id']}">
                <h2 class="demande__header">DemandeID : {$facilitation['id']}</h2>
                <div class="row gap">
                    <h3>CompteID:</h3>
                    <p>{$facilitation['idCompte']}</p>
                </div>
                <div class="row gap">
                    <h3>Domaine:</h3>
                    <p>{$facilitation['domaine']}</p>
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
