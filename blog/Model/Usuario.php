<?php
namespace Blog\Model;


class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $columns = [
        'nombre',
        'email',
        'password'
    ];
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
        $data = [
            $this->nombre,
            $this->email,
            password_hash($this->password, PASSWORD_BCRYPT)
        ];

        $this->id = $this->query->insertData($data, $this->columns);

        return $this;
    }
}