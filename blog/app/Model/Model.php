<?php
namespace Blog\Model;

use Blog\DataBase\{Connection, QueryBuilder};

class Model
{
    protected $query;
    protected $table;

    public function __construct()
    {
        $this->query = new QueryBuilder(Connection::run());
    }
}