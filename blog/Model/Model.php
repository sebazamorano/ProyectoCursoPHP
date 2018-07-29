<?php
namespace Blog\Model;

use Blog\DataBase\{Connection, QueryBuilder};

class Model
{
    protected $query;

    public function __construct()
    {
        $this->query = new QueryBuilder(Connection::run());
    }
}