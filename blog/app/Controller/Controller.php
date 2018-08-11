<?php
namespace Blog\Controller;


class Controller
{
    protected $template;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('../views');
        $this->template = new \Twig_Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);
    }

    public function view($name, $data = [])
    {
        echo $this->template->render($name . '.twig', $data);
    }

}