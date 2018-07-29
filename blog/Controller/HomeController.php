<?php
namespace Blog\Controller;

use Blog\Model\Usuario;

class HomeController extends Controller
{
    public function home ()
    {
        $tareas = [
            'Tarea 1',
            'Tarea 2',
            'Tarea 3',
            'Tarea 4',
            'Tarea 5',
        ];
        $nombre = 'Sebastian Zamorano';

        $this->view('home', compact('tareas', 'nombre'));
    }

    public function usuarios ()
    {
        $usuario = new Usuario();

        $usuarios = $usuario->allBy('nombre', 'Pepito');

        $this->view('usuarios', compact('usuarios'));
    }

    public function store ()
    {
        $usuario = new Usuario();
        $usuario->nombre = $_POST['nombre'];
        $usuario->email = $_POST['email'];
        $usuario->password = $_POST['password'];
        $usuario->create();
    }
}