<?php
class Admin
{
    public static function fetch($userName, $password)
    {
        $conn = DB::connect();
        $sql = 'SELECT * FROM admin WHERE user_name = ? AND password = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userName, $password]);
        return $stmt->fetch();
    }
}
