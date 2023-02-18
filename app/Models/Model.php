<?php

namespace app\Models;

use app\Database\Dbconnection as DB;
use app\Request;

class Model
{
    public function all()
    {
        $model_child = get_called_class();
        $className = str_replace(__NAMESPACE__ . '\\', '', $model_child);
        $table = camelCaseToSnakeCase($className);
        $table = singularToPlural($table);


        $stmt = DB::conn('TEST')
            ->pdo->prepare("SELECT * FROM $table  WHERE deleted_at is null");


        if ($stmt->execute()) {
            $result = [];
            $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($data as $register) {
                $child = new $model_child($register, $model_child);
                self::setModel($register, $child);

                $result[] = $child;
            }
        }
        return $result;
    }

    public function create(array $data)
    {
        $model_child = get_called_class();
        $className = str_replace(__NAMESPACE__ . '\\', '', $model_child);
        $table = camelCaseToSnakeCase($className);
        $table = singularToPlural($table);

        $conn = new DB('TEST');

        $fields = array_keys($data);
        $fields = implode(',', $fields);
        $values = "'" . implode("','", $data) . "'";

        $stmt = $conn->pdo->prepare("INSERT INTO $table ($fields)
                VALUES ($values);
            ");

        $stmt->execute();

        return  $conn->pdo->lastInsertId();
    }

    public function update($id, array $data)
    {
        $model_child = get_called_class();
        $className = str_replace(__NAMESPACE__ . '\\', '', $model_child);
        $table = camelCaseToSnakeCase($className);
        $table = singularToPlural($table);

        $conn = new DB('TEST');

        $fieldsValues = [];

        foreach ($data as $field => $value) {
            $fieldsValues[] = " $field = '$value' ";
        }

        $fieldsValues = implode(',', $fieldsValues);


        $stmt = $conn->pdo->prepare("UPDATE $table set 
                $fieldsValues 
                WHERE id = $id
            ");

        return $stmt->execute();
    }

    public function softDelete($id)
    {
        $model_child = get_called_class();
        $className = str_replace(__NAMESPACE__ . '\\', '', $model_child);
        $table = camelCaseToSnakeCase($className);
        $table = singularToPlural($table);

        $conn = new DB('TEST');

        $stmt = $conn->pdo->prepare("UPDATE $table set 
                 deleted_at = NOW()
                 WHERE id = $id
             ");
        return $stmt->execute();
    }


    public function setModel(array $register, Model &$child)
    {
        foreach ($register as $key => $value) {
            $key =  snakeCaseToCamelCase($key);
            if (method_exists($child, "set{$key}")) {
                $child->{"set{$key}"}($value);
            }
        }
    }
}
