<?php
namespace Core;

use Exception;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\BadRouteException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

class Route
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];
    protected $collection;

    /*
     * Carga las rutas que están en el aruhivo
     * routes.php
     */
    public static function load()
    {
        $route = new static();
        $route->collection = new RouteCollector();

        include "../routes.php";

        return $route;
    }

    /*
     * Guarda una ruta para metodo GET
     */
    public function get($route, $controller)
    {
        $this->collection->get($route, $this->callAction($controller));
    }

    /*
     *
     * Guarda una ruta para metodo POST
     */
    public function post($route, $controller)
    {
        $this->collection->post($route, $this->callAction($controller));
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
        try {
            $dispatcher = new Dispatcher($this->collection->getData());
            $response = $dispatcher->dispatch($method, $uri);
            return $response;
        } catch (HttpMethodNotAllowedException $ex) {
            echo 'No existe la acción';
        } catch (HttpRouteNotFoundException $ex) {
            echo 'No existe la ruta';
        }
    }

    protected function addingFilterAuth()
    {
        $this->collection->filter('auth', function () {
            if (isset($_SESSION['user'])) {
                header('Location: /login');
                return false;
            }
        });
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