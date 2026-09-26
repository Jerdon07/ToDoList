<?php

class Database {

    public PDO $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=product_db;user=root;charset=utf8mb4";

        $this->connection = new PDO($dsn);
    }

    public function query(string $query): object
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}