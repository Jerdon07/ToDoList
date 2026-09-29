<?php

class Database {

    public PDO $connection;

    public function __construct()
    {
        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'product_db',
            'charset' => 'utf8mb4',
        ];

        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query): object
    {
        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}