<?php
namespace Blog\Model;


class Usuario extends Model
{
    protected $table = 'usuarios';
    public $nombre;
    public $email;
    public $password;

    public function all()
    {
        return $this->query->getAll($this->table);
    }

    public function allBy($column, $value)
    {
        return $this->query
            ->selectAllBy($this->table, $column, $value);
    }

    public function create()
    {
        $this->pdo->prepare(
            "INSERT INTO usuarios VALUES(:nombre, :email, :password)"
        );

        return $this->query->execute([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'password' => md5($this->password)
        ]);
    }
}