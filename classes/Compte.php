<?php
include('./helpers/arrayToSelect.php');
include('./helpers/getEnums.php');

class Compte
{
    public static function getTypes()
    {
        return getEnums('compte', 'type_compte');
    }

    public static function isRegistred($email)
    {
        if (self::fetchByEmail($email))
            return true;
        return false;
    }

    public static function fetchByEmail($email)
    {
        $conn = DB::connect();
        $sql = "SELECT
                        *
                    FROM
                        compte
                    WHERE email = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public static function fetchById($id)
    {
        $conn = DB::connect();
        $sql = "SELECT
                        *
                    FROM
                        compte
                    WHERE idCompte = $id 
            ";
        $res = $conn->query($sql);
        return $res->fetch();
    }

    public static function create(
        $nom,
        $prenom,
        $tel,
        $pays,
        $email,
        $adresse,
        $ddn,
        $profession,
        $type_compte,
        $password,
    ) {
        $conn = DB::connect();
        $sql = "INSERT INTO compte(nom,prenom,tel,pays,email,adresse,ddn,profession,type_compte,password) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$nom, $prenom, $tel, $pays, $email, $adresse, $ddn, $profession, $type_compte, $password]);
    }

    public static function connect($email, $password)
    {
        $compte = self::fetchByEmail($email);
        if (!$compte) throw new Error('Email incorrect !');
        if (!password_verify($password, $compte['password']))
            throw new Error('Password incorrect !');
        return $compte;
    }

    public static function updateById(
        $idCompte,
        $nom,
        $prenom,
        $email,
        $tel,
        $pays,
        $adresse,
        $profession,
        $ddn
    ) {
        $conn = DB::connect();
        $sql = "UPDATE compte 
            SET nom = ?, prenom = ?, email = ?, tel = ?,
            pays = ?, adresse = ?, profession = ?, ddn = ?
            WHERE idCompte = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$nom, $prenom, $email, $tel, $pays, $adresse, $profession, $ddn, $idCompte]);
    }

    // User interfaces
    public static function displayTypes()
    {
        $types = self::getTypes();
        return arrayToSelect($types, 'type_compte');
    }

    public static function display($compte)
    {
        return <<<HTML
                <div class='compte'>
                    <h2 class='compte__header'>Mon Compte</h2>
                    <div class='row gap'>
                            <h3>Nom:</h3>
                            <p>{$compte['nom']}</p>
                    </div>
                        <div class='row gap'>
                            <h3>prenom:</h3>
                            <p>{$compte['prenom']}</p>
                        </div>
                        <div class='row gap'>
                            <h3>Email:</h3>
                            <p>{$compte['email']}</p>
                        </div>
                        <div class='row gap'>
                            <h3>Adress:</h3>
                            <p>{$compte['adresse']}</p>
                        </div>
                        <div class='row gap'>
                            <h3>Tel:</h3>
                            <p>{$compte['tel']}</p>
                        </div>
                        <div class='row gap'>
                            <h3>Profession:</h3>
                            <p>{$compte['profession']}</p>
                        </div>
                        <div class='row gap'>
                            <h3>Date De Naissance:</h3>
                            <p>{$compte['ddn']}</p>
                        </div>
                    </h2>
                </div>
            HTML;
    }

    public static function updateForm($idCompte)
    {
        $compte = self::fetchById($idCompte);
        return <<<HTML
                <form method="post" action="" class="form-container__form mi-auto">
                <h1 class="form-container__form__header">Modifier votre compte</h1>

                <input type="text" name="nom" placeholder="Nom" value="{$compte['nom']}" class="primary-input">
                <input type="text" name="prenom" placeholder="Prenom" value="{$compte['prenom']}" class="primary-input">
                <input type="email" name="email" placeholder="E-mail" value="{$compte['email']}" class="primary-input">
                <input type="text" name="tel" placeholder="tel" value="{$compte['tel']}" class="primary-input">
                <input type="text" name="pays" placeholder="pays" value="{$compte['pays']}" class="primary-input">
                <input type="text" name="adresse" placeholder="adresse" value="{$compte['adresse']}" class="primary-input">
                <input type="text" name="profession" placeholder="profession" value="{$compte['profession']}" class="primary-input">
                <input type="date" name="ddn" placeholder="date de naissance" value="{$compte['ddn']}" class="primary-input">
                <?= Compte::displayTypes() ?>
                <input type="submit" name="update" value="Update" class="primary-button">
            </form>
        HTML;
    }
}
