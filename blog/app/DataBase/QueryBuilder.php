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

    public function insert($table, $data, $columns)
    {
        $values = [];

        foreach ($data as $v) {
            $values[] = '?';
        }

        $values = implode(',', $values);
        $columns = implode(',', $columns);

        $query = $this->pdo->prepare(
            "INSERT INTO {$table} ({$columns}) VALUES ({$values})"
        );

        $query->execute($data);

        return $this->pdo->lastInsertId();
    }

    public function updateResource($table, $data, $id)
    {
        $values = [];
        $insert = [];

        foreach ($data as $key => $v) {
            $values[] = $key.'=?';
            $insert[] = $v;
        }
        //nombre=?, email=?
        $values = implode(',', $values);

        $query = $this->pdo->prepare(
            "UPDATE {$table} SET {$values} WHERE id = ?"
        );

        array_push($insert, $id);

        return $query->execute($insert);
    }

    public function removeResource($table, $id)
    {
        $query = $this->pdo->prepare(
            "DELETE FROM {$table} WHERE id = :id"
        );

        $query->execute([
            'id' => $id
        ]);
    }
}