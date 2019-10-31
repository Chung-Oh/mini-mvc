<?php

declare(strict_types=1);

namespace Src\Model;

abstract class Table
{
    /**
     * Guarda a conexão com o BD.
     */
    protected $conn;

    /**
     * Nome da tabela é atribuído a esse atributo na classe que herdar de Table.
     */
    protected $table;

    /**
     * Pegando a conexão ao BD quando a classe que extender Table for instânciada.
     */
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }
}
