<?php
class Contact {
 
 private $conn;
 private $table_name = 'contactus';

 public $id;
 public $name;
 public $email;
 public $message;

 public function __construct($db){
     $this->conn = $db;
 }

 public function insert(){
     $query = 'INSERT INTO ' . $this->table_name . ' (name,email,message) VALUES (:name,:email,:message)';
     $stmt = $this->conn->prepare($query);

     $this->name = htmlspecialchars(strip_tags($this->name));
     $this->email = htmlspecialchars(strip_tags($this->email));
     $this->message = htmlspecialchars(strip_tags($this->message));

     $stmt->bindParam(":name", $this->name);
     $stmt->bindParam(":email", $this->email);
     $stmt->bindParam(":message", $this->message);

     if($stmt->execute()){
         return true;
     }

     printf("Error: %s.\n", $stmt->error);

     return false;
 }

 public function getAll(){
     $query = 'SELECT * FROM ' . $this->table_name;
     $stmt = $this->conn->prepare($query);
     $stmt->execute();
     return $stmt->fetchAll();
 }

 public function delete(){
     $query = 'DELETE FROM ' . $this->table_name . ' WHERE id=:id';
     $stmt = $this->conn->prepare($query);
     $stmt->bindParam(":id", $this->id);
     if($stmt->execute()){
         return true;
     }
     printf("Error: %s.\n", $stmt->error);
     return false;
 }
}
?>