<?php
namespace Blog\Controller;


use Blog\Model\Usuario;
use Valitron\Validator;

class UsuarioController extends Controller
{
    public function usuarios ()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->all();

        $this->view('usuario/usuarios', compact('usuarios'));
    }

    public function create()
    {
        $this->view('usuario/crearUsuario');
    }

    public function store ()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['nombre', 'email', 'password']);
        $v->rule('email', 'email');

        if ($v->validate()) {
            $usuario = new Usuario();
            $usuario->nombre = $_POST['nombre'];
            $usuario->email = $_POST['email'];
            $usuario->password = $_POST['password'];
            $usuario->create();
            return header('Location: /usuarios');
        } else {
            return $this->view('/crearUsuario', [
                'errors' => $v->errors()
            ]);
        }
    }

    public function formActualizar($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->allBy('id', $id);
        $usuario = array_pop($usuario);

        return $this->view('usuario/actualizarUsuarios', compact('usuario'));
    }

    public function update($id)
    {
        $usuario = new Usuario();
        $usuario->nombre = $_POST['nombre'];
        $usuario->email = $_POST['email'];
        $usuario->id = $id;
        $usuario->update();

        return header('Location: /usuarios');

    }

    public function eliminar($id)
    {
        $usuario = new Usuario();
        $usuario->delete($id);

        return header('Location: /usuarios');
    }
}