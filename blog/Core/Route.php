<?php
namespace Core;

use Exception;

class Route
{
    protected $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /*
     * Carga las rutas que están en el aruhivo
     * routes.php
     */
    public static function load()
    {
        $route = new static();

        include "../routes.php";

        return $route;
    }

    /*
     * Guarda una ruta para metodo GET
     */
    public function get($route, $controller)
    {
        $this->routes['GET'][$route] = $controller;
    }

    /*
     *
     * Guarda una ruta para metodo POST
     */
    public function post($route, $controller)
    {
        $this->routes['POST'][$route] = $controller;
    }

    /*
     * Executa el llamado a la accion del Controlador
     * que se encuentra en la ruta
     */
    /**
     * @param $uri
     * @param $method
     * @throws Exception
     */
    public function execute($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            $action = explode('@', $this->routes[$method][$uri]);
            $this->callAction($action[0], $action[1]);
        } else {
            throw new Exception('No Existe la ruta', 404);
        }
    }

    /*
     * Creacion del objeto Controller
     */
    protected function callAction($controller, $action)
    {
        //Escribo el nombre de espacio
        $controller =  "Blog\\Controller\\{$controller}";
        //instancio el objeto controller
        $controller = new $controller;
        if (method_exists($controller, $action)) {
            return $controller->$action();
        }
        throw new Exception('No Existe la acción', 404);
    }

}