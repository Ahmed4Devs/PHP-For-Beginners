<?php

// Connect to the database, and execute a query.
// this :: mean Scope Resolution Operator
class Database
{
  public $connection;

  public function __construct($config, $username = 'root', $password = 'toor')
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = [])
  {
    $statement = $this->connection->prepare($query);

    $statement->execute($params);

    return $statement;
  }
}



/* Version 1 of Database Class
class Database
{
  public $connection;

  public function __construct()
  {
    $dsn = 'mysql:host=localhost;post=3306;dbname=myapp;user=root;password=toor;charset=utf8mb4';

    $this->connection = new PDO($dsn);
  }

  public function query($query)
  {
    $statement = $this->connection->prepare($query);

    $statement->execute();

    return $statement;
  }
}*/