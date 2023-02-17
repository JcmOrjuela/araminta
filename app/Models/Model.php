<?php

namespace app\Models;

use app\Database\Dbconnection as DB;

class Model
{
    public function all()
    {
        $model_child = get_called_class();
        $className = str_replace(__NAMESPACE__ . '\\', '', $model_child);
        $table = camelCaseToSnakeCase($className);
        $table = singularToPlural($table);


        $stmt = DB::conn('TEST')
            ->pdo
            ->prepare("SELECT * FROM :table");

        $result = $stmt->execute(['table' => $table]);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function hasMany(Model $class, $foreignKey = 'id', $primaryKey)
    {
        return 'Este modelo';
    }
}
