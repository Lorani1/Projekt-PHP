<?php

class ContactFormHandler {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function insertContactData($name, $email, $message) {
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $message = $this->conn->real_escape_string($message);
    
        $query = "INSERT INTO contactus (name, email, message) VALUES ('$name', '$email', '$message')";
    
        if ($this->conn->query($query)) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
            return false;
        }
    }


    public function closeConnection() {
        $this->conn->close();
    }
}

?>
