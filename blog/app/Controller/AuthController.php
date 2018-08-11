<?php

namespace Blog\Controller;


use Blog\Model\Usuario;

class AuthController extends Controller
{

    public function loginForm()
    {
        return $this->view('auth/login.twig');
    }

    public function access()
    {
        $usuario = new Usuario();
        $usuario = $usuario->getUsuarioByEmail($_POST['email']);

        if (password_verify($_POST['password'], $usuario->password)) {
            $_SESSION['user'] = $usuario;
            header('Location: /usuarios');
        } else {
            header('Location: /login');
        }
    }

}