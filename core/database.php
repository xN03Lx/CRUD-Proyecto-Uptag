<?php
class Database
{
    public static function StartDb()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=control_registro_pnfi;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
