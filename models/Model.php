<?php

namespace models;

use ArrayAccess;
use engine\Application;
use engine\components\Collection;
use engine\db\MysqlConnection;
use http\QueryString;
use IteratorAggregate;
use PDO;

abstract class Model implements ArrayAccess
{
    /**
     * @var MysqlConnection
     */
    protected MysqlConnection $connection;

    /**
     * @var string
     */
    protected string $table;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $db_config = Application::$configs;
        $this->connection = new MysqlConnection($db_config['DB_HOST'],$db_config['DB_USER'], $db_config['DB_PASSWORD'], $db_config['DB_NAME']);
        $this->table = $this->defineTable();
    }

    /**
     * @return string
     */
    private function defineTable(): string
    {
        return $this->table ?? basename(
            strtolower(static::class. 's')
        );
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        $query = sprintf('SELECT * FROM %s', $this->table);
        $statement = $this->connection->connect()->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();

        return (new Collection($items))
            ->transform(function ($item) {
                $model = new (static::class);
                $model->setAttributes($item);
                return $model;
            });
    }

    /**
     * @param $title
     * @param $content
     */
    /*public function insert($title, $content)
    {
        $query = sprintf("INSERT INTO %s VALUES (null, ?,?)", $this->table);
        $statement = $this->connection->connect()->prepare($query);
        $statement->execute([$title, $content]);
    }*/


    /**
     * @param array $attributes
     */
    public function insert(array $attributes)
    {

        $sql = "INSERT INTO %s VALUES (null, ";
        $count=0;
        foreach ($attributes as $value) {
            $count++;
            $sql .= ($count != count($attributes)) ? "'" . $value . "', " : "'" . $value . "'";
        }
        $sql .=  ")";
        $query = sprintf($sql, $this->table);
        $statement = $this->connection->connect()->prepare($query);
        $statement->execute();
    }

    /**
     * @param $title
     * @param $content
     * @param $id
     */
    public function update($attributes, $id)
    {
        /** @var
         * $sql
         */
        $sql = 'UPDATE %s SET ';
        $count=0;
        foreach ($attributes as $key => $value) {
            $count++;
            $sql .= ($count != count($attributes)) ? $key . ' = "' . $value . '",' : $key . ' = "' . $value . '"' ;
        }
        $sql .=  " WHERE id = $id";

        $query = sprintf($sql, $this->table);
        $statement = $this->connection->connect()->prepare($query);
        $statement->execute();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $query = sprintf("DELETE FROM %s WHERE id = ?", $this->table);
        $statement = $this->connection->connect()->prepare($query);
        $statement->execute([$id]);
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @param $name
     * @param $value
     */
    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    /**
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return isset($this->attributes[$offset]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }
}