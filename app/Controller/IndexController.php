<?php

declare(strict_types=1);

namespace App\Controller;

use Src\Controller\Action;
use Src\DI\Container;

class IndexController extends Action
{
    #========================================================================================================================
    #                                               COMO TRABALHAR COM CONTROLLER
    #------------------------------------------------------------------------------------------------------------------------
    # Todos Controllers do diretório App tem que ser extendido de Action, e cumprir as seguintes exigências:
    # 1) Nome do Método deve ser igual ao nome do arquivo no diretório App\View que o método irá renderizar
    # 2) Utilizar método estático do Container passando o nome da Model a ser instânciado
    # 3) Chamar o método do Model para atribuir seu retorno no atributo "view" herdado de Action, detalhe: encadeando um
    # outro atributo de acordo com a informação/dados. Exemplo: $this->view->users ou $this->view->cars
    # 4) Chamar método herdado "render", onde 1ºparam = nome arquivo View e 2ºparam se irá usar o layout Padrão
    #========================================================================================================================

    public function index()
    {
        $products = Container::getModel('Products');
        $this->view->products = $products->list();
        $this->render('index', false);
    }

    public function contact()
    {
        $products = Container::getModel('Products');
        $this->view->products = $products->list();
        $this->render('contact');
    }
}
