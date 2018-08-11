<?php
namespace Core;

use Exception;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;

class Route
{
    protected $collections;

    /*
     * Carga las rutas que están en el aruhivo
     * routes.php
     */
    public static function load()
    {
        $route = new static();
        $route->collections = new RouteCollector();
        session_start();
        include "../routes.php";

        $route->collections->filter('auth', function(){
            if(!isset($_SESSION['usuario']))
            {
                header('Location: /login');

                return false;
            }
        });

        return $route;
    }

    /*
     * Guarda una ruta para metodo GET
     */
    public function get($route, $controller, $filters = [])
    {
        $this->collections->get($route, $this->callAction($controller), $filters);
    }

    /*
     *
     * Guarda una ruta para metodo POST
     */
    public function post($route, $controller, $filters = [])
    {
        $this->collections->post($route, $this->callAction($controller), $filters);
    }

    /*
     * Executa el llamado a la accion del Controlador
     * que se encuentra en la ruta
     */
    /**
     * @param $uri
     * @param $method
     * @return mixed|null
     */
    public function execute($uri, $method)
    {
        $dispatcher = new Dispatcher($this->collections->getData());
        $response = $dispatcher->dispatch($method, $uri);
        return $response;
    }

    /*
     * Creacion del objeto Controller
     */
    protected function callAction($controller)
    {
        $controller = explode('@', $controller);

        return [
            "Blog\\Controller\\{$controller[0]}",
            $controller[1]
        ];
    }

}