<?php

declare(strict_types=1);

namespace Src\DI;

use Src\Conn;

/**
 * Dependency Injection
 */

class Container
{
    /**
     * Retorna a instância de um Model através do parâmetro passado.
     *
     * @param string $model
     *
     * @return object Model
     */
    public static function getModel(string $model): object
    {
        $class = 'App\\Model\\' . ucfirst($model);
        return new $class(Conn::connection());
    }
}
