<?php
class Ferme
{
    public static function create(
        $nom,
        $region,
        $commune,
        $adresse
    ) {
        $conn = DB::connect();
        $sql = "INSERT INTO ferme(nom, region, commune, adresse)
            VALUES(?,?,?,?) 
        ";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$nom, $region, $commune, $adresse]);
    }

    public static function fetchByName($nom)
    {
        $conn = DB::connect();
        $sql = "SELECT * FROM ferme WHERE nom = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom]);
        return $stmt->fetch();
    }

    public static function isRegistred($nom)
    {
        if (self::fetchByName(($nom)))
            return true;
        else return false;
    }
}
