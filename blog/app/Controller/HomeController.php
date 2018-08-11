<?php
namespace Blog\Controller;


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

        $this->view('home.twig', compact('tareas', 'nombre'));
    }
}