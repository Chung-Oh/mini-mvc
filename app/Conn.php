<?php

declare(strict_types=1);

namespace App;

class Conn
{
    public static function connection()
    {
        return new \PDO('mysql:host=localhost;dbname=estoque', 'root', 'daniel');
    }
}
