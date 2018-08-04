<?php

namespace Blog\DataBase;

use PDO;

class QueryBuilder
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll($table)
    {
        $query = $this->pdo->prepare(
            "SELECT * FROM {$table}"
        );
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectAllBy($table, $column, $value, $conditions = '=')
    {
        $query = $this->pdo->prepare("
            SELECT * FROM {$table} where {$column} {$conditions} '{$value}'
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function insertData($data, $columns)
    {
        $values = [];

        foreach ($data as $d){
            $values[] = '?';
        }

        $values = implode(',', $values);

        $columns = implode(',', $columns);

        $query = $this->pdo->prepare(
            "INSERT INTO usuarios ({$columns}) VALUES({$values})"
        );

        $query->execute($data);

        return $this->pdo->lastInsertId();
    }

}