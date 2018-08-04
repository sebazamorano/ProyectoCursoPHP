<?php
namespace Blog\Controller;


class Controller
{
    public function view($name, $data = [])
    {
        extract($data);

        return require "../views/{$name}.view.php";
    }

    public function connection()
    {

    }
}