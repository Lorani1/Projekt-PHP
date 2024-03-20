<?php

class Database{
    private $connection;

    public function __construct($host, $user, $password, $db)
    {
        $this->connection = new mysqli($host, $user, $password, $db);

        if ($this->connection->connect_error) {
            die("Connection error: " . $this->connection->connect_error);
        }
    }
    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection->close();
    }
}

?>
