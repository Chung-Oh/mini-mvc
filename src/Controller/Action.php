<?php

declare(strict_types=1);

namespace Src\Controller;

abstract class Action
{
    /**
     * Propriedade usada na classe que a estender, nesse atributo será atribuído dados para View.
     */
    protected $view;

    /**
     * Ação para os Controllers
     */
    private $action;

    /**
     * "\stdClass" é uma classe definida no conjunto padrão de funções incluídas na compilação do PHP.
     */
    public function __construct()
    {
        $this->view = new \stdClass();
    }

    /**
     * Renderiza uma View conforme a Action do Controller passado, e se layout for true herdará um template padrão.
     * Esse método é chamado pelas classes que estenderem essa classe, no diretório App\Controller.
     *
     * @param string $action
     * @param bool $layout
     *
     * @return view
     */
    protected function render(string $action, bool $layout = true)
    {
        $this->action = $action;

        if ($layout == true && file_exists('../../app/View/layout.phtml')) {
            include_once '../../app/View/layout.phtml';
        } else {
            $this->content();
        }
    }

    /**
     * Responsável por importar a View. As Views de um Controller tem seu próprio diretório em App.
     * Exemplo: App\Controller\ProductController => app\View\product\new.phtml
     * Observação: app\View\product\new.phtml => o nome do new.phtml tem que ser o nome do Método do Controller
     */
    protected function content()
    {
        // Pegando a classe que estende Controller
        $current = get_class($this);
        // Extraindo apenas o primeiro nome do Controller, para indicar o diretório de sua respectiva View
        $singleClassName = strtolower(str_replace('Controller', '', str_replace('App\\Controller\\', '', $current)));
        include '../../app/View/' . $singleClassName . '/' . $this->action . '.phtml';
    }
}
