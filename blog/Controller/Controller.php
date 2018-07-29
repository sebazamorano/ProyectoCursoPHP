<?php
namespace Blog\Controller;

use PDO;

class Controller
{
    public function view($name, $data = [])
    {
        extract($data);

        return require "views/{$name}.view.php";
    }

    public function connection()
    {

    }
}