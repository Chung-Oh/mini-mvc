<?php

declare(strict_types=1);

namespace App\Model;

use Src\Model\Table;

#========================================================================================================================
#                                               COMO TRABALHAR COM MODEL
#------------------------------------------------------------------------------------------------------------------------
# 1) Atribuir nome da Tabela para atributo "$table".
# 2) Todos os métodos com Modelo de Negócio devem ser implementados e devem estar em classes com namespace App\Model.
#========================================================================================================================

class Products extends Table
{
    /**
     * Atribuindo nome da Tabela para o atributo da classe pai.
     */
    protected $table = 'produtos';

    /**
     * Retorna lista
     *
     * @return array
     */
    public function list(): array
    {
        $query = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($query);

        return $result->fetchAll(\PDO::FETCH_CLASS);
    }
}
