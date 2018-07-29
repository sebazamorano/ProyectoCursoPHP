<?php
namespace Blog\DataBase;

use PDO;

class Connection
{
    protected $pdo;

    public static function run()
    {
        return new PDO('mysql:host=127.0.0.1;dbname=blog',
            'root',
            'sebazamorano');
    }
}