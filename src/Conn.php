<?php

declare(strict_types=1);

namespace Src;

class Conn
{
    public static function connection()
    {
        $conn = new \PDO('mysql:host=localhost;dbname=estoque', 'root', 'daniel');
        // Handle erros
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);

        return $conn;
    }
}
