<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=test_nuvola;charset=utf8', 'test', '122123');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);        	
        return $pdo;
    }
}