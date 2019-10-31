<?php

declare(strict_types=1);

namespace Src\Init;

abstract class Bootstrap
{
    private $routes;

    /**
     * Essa classe é instânciada assim que entra na Index, fazendo Classe Route chamar o método "initRoutes"
     * para adicionar todas as Rotas da aplicação.
     * Em seguida método "run" é executado pegando a Rota em que se encontra e executa Ação do Controller.
     */
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    /**
     * Nesse método que adicionamos todas as Rotas da aplicação, após finalizar devemos chamar o método "setRoutes"
     * passando uma variável(Array) das Rotas definidas.
     */
    abstract protected function initRoutes();

    /**
     * Motor das Rotas, caso a Rota exista instância o Controller e executa Ação quando solicitamos alguma página.
     *
     * @param string $url
     *
     * @return void
     */
    protected function run(string $url): void
    {
        array_walk($this->routes, function ($route) use ($url) {
            if ($url == $route['route']) {
                $class = "App\\Controller\\" . ucfirst($route['controller']);
                $controller = new $class();
                $action = $route['action'];
                $controller->$action();
            }
        });
    }

    /**
     * Pega as rotas adicionadas em App\Route.php
     *
     * @return void
     */
    protected function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    /**
     * Retorna somente o path, que é após a porta. Ex: localhost:8000/path
     *
     * @return string
     */
    protected function getUrl(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
