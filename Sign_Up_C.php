<?php

class Sign {
 
    private $conn;
    private $table_name = 'user';

    public $id;
    public $username;
    public $email;
    public $password;
    public $user_a;

    public function __construct($db){
        $this->conn = $db;
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table_name . ' (username,email,password,user_a) VALUES (:username,:email,:password,:user_a)';
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->user_a = htmlspecialchars(strip_tags($this->user_a));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":user_a", $this->user_a);

        if($stmt->execute()){
            return true;
        }

        printf("Error %s. \n ", $stmt->error);

        return false;
    }

    public function printAll(){
        $query = 'SELECT * FROM ' . $this->table_name;
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}

?>
