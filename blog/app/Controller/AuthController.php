<?php
namespace Blog\Controller;


use Blog\Model\Usuario;

class AuthController extends Controller
{
    public function loginForm()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        $usuario = new Usuario();
        $data = $usuario->allBy('email', $_POST['email']);

        if (count($data) > 0 && password_verify($_POST['password'], $data[0]->password)) {
            $_SESSION['usuario'] = $data[0];
            header('Location: /usuarios');
            return null;
        } else {
            return header('Location: /login');
        }
    }

    public function logout()
    {
        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: /');
    }
}