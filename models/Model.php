<?php

namespace models;

use engine\db\MysqlConnection;
use JetBrains\PhpStorm\Pure;

abstract class Model
{
    /**
     * @var MysqlConnection
     */
    protected MysqlConnection $connection;

    /**
     * Model constructor.
     */
    #[Pure] public function __construct()
    {
        $this->connection = new MysqlConnection();
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return basename(
            strtolower(static::class. 's')
        );
    }

    public function all()
    {
        if($this->connection) {
            return "connected";
        } else {
            return "Disconnected";
        }
    }
}