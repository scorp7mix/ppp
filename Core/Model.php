<?php

namespace Core;

use Core\DB;

abstract class Model
{
    protected static $schema;

    public $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    protected static function fullSQL()
    {
        $schema = static::$schema;
        $fields = [];
        $joins = [];

        foreach ($schema['fields'] as $ownField) {
            $fields[] = $schema['table'] . '.' . $ownField;
        }

        if (isset($schema['joins'])) {
            foreach ($schema['joins'] as $joinParams) {
                $joins[] = 'LEFT JOIN ' . $joinParams['table'] . ' AS ' . $joinParams['as'] . ' ON ' . $joinParams['on'];
                foreach ($joinParams['fields'] as $joinField) {
                    $fields[] = $joinParams['as'] . '.' . $joinField . ' AS ' . $joinParams['as'] . '_' . $joinField;
                }
            }
        }

        $sql = 'SELECT ' . implode(', ', $fields) . ' FROM ' . $schema['table'] . ' ' . implode(' ', $joins);

        return $sql;
    }

    /**
     * @return array
     */
    public static function read()
    {
        $sql = static::fullSQL();

        $db = DB::getInstance();

        $result = $db->query($sql, get_called_class());

        $data = [];
        foreach ($result as $row) {
            $data[] = $row->data;
        }

        return $data;
    }

    /**
     * @return array
     */
    public static function readByColumnValue($column, $value)
    {
        $sql = static::fullSQL();
        $sql .= ' WHERE ' . static::$schema['table'] . '.' . $column . ' = :' . $column;

        $db = DB::getInstance();

        $result = $db->query($sql, get_called_class(), [':' . $column => $value]);

        $data = [];
        foreach ($result as $row) {
            $data[] = $row->data;
        }

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function readById($id)
    {
        $sql = static::fullSQL();
        $sql .= ' WHERE ' . static::$schema['table'] . '.id = :id';

        $db = DB::getInstance();

        $res = $db->query($sql, get_called_class(), [':id' => $id]);

        if ($res) {
            return $res[0];
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function create()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = '
            INSERT INTO' . ' ' . static::$schema['table'] . '
            (' . implode(', ', $cols) . ')
            VALUES
            (' . implode(', ', array_keys($data)) . ')
        ';

        $db = DB::getInstance();
        return $db->execute($sql, $data);
    }

    /**
     * @return bool
     */
    public function update()
    {
        $cols = static::$schema['fields'];
        $fields = [];
        $data = [];

        foreach ($cols as $col) {
            $fields[] = $col . ' = :' . $col;
            $data[':' . $col] = $this->data[$col];
        }

        $sql = '
            UPDATE ' . static::$schema['table'] . '
            SET ' . implode(', ', $fields) . '
            WHERE id = :id
        ';

        $db = DB::getInstance();
        return $db->execute($sql, $data);
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $data = [':id' => $this->data['id']];

        $sql = '
            DELETE FROM' . ' ' . static::$schema['table'] . '
            WHERE id = :id
        ';

        $db = DB::getInstance();
        return $db->execute($sql, $data);
    }
}