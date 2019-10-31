<?php

declare(strict_types=1);

namespace App;

use Src\Init\Bootstrap;

class Route extends Bootstrap
{
    #========================================================================================================================
    #                                              COMO TRABALHAR COM ROUTE
    #------------------------------------------------------------------------------------------------------------------------
    # Devemos definir as Rotas da aplicação pelo método abstract herdado de Bootstrap, seguir as seguintes exigências:
    # 1) Criar uma variável já com uma chave onde essa será a Página/View, exemplo: $routes['home']
    # 2) Atribuir a essa variável outro array com as seguintes informações: Route, Controller e Action. Segue abaixo:
    # Exemplo: array('route' => '/category', 'controller' => 'categoryController', 'action' => 'category')
    # 3) Após definir todas as Rotas deve-se chamar o método herdado de Bootstrap "setRoutes($routes)", passando em seu
    # parâmetro a variável $routes.
    #========================================================================================================================

    protected function initRoutes()
    {
        $routes['home']    = array('route' => '/', 'controller' => 'indexController', 'action' => 'index');
        $routes['contact'] = array('route' => '/contact', 'controller' => 'indexController', 'action' => 'contact');
        $this->setRoutes($routes);
    }
}
