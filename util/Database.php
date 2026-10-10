<?php

namespace util;

use PDO;
use PDOStatement;

class Database {

    public PDO $connection;
    public PDOStatement $statement;

    /**
     * Build sql database connection
     */
    public function __construct(
        array $config, 
        string $username = 'root', 
        string $password = ''
    ) {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * Write SQL query
     */
    public function query(string $query, array $params = []): object
    {
        // Prepare the query statement
        $this->statement = $this->connection->prepare($query);

        // Execute the statement together with the parameters
        $this->statement->execute($params);

        return $this;
    }

    /**
     * Fetch the query statement
     */
    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    /**
     * Fetch the query statement. Else, fail the execution
     */
    public function findOrFail(): mixed
    {
        $result = $this->find();

        if (! $result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

    /**
     * Fetch all the results of the query statement
     */
    public function get(): array
    {
        return $this->statement->fetchAll();
    }

    public function lastInsertId(): string|false
    {
        return $this->connection->lastInsertId();
    }
}