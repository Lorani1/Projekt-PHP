<?php

    class LogIn{
        private $conn;
        private  $table_name = 'user';


        public $username;
        public $password;
        public $user_a;

        public function __construct($db){
            $this->conn=$db;
        }

        public function create(){

            $query = 'INSERT INTO ' . $this->table_name . ' (username,password,user_a) VALUES (:username,:password,:user_a)';

            $stmt = $this->conn->prepare($query);

            
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->user_a = htmlspecialchars(strip_tags($this->user_a));

        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$this->password);
        $stmt->bindParam(":user_a",$this->user_a);

        if($stmt->execute()){
            return true;
        }

        printf("Error %s .\n",$stmt->errorInfo());

        return false;

        }

        public function login(){
            $query = "SELECT * FROM user WHERE username=:username AND  password=:password ";

            $stmt = $this->conn->prepare($query);


                   
        $this->username = htmlspecialchars(strip_tags($this->username));

        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$this->password);


        if($stmt->execute()){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                if(password_verify($this->password,$user['password'])){

                    if($user['user_a']==1 || $user['user_a']==2){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['user_a']=$user['user_a'];
                    
                    return true;
                    }else{
                    return false;
                    }   
                }
            }
        }

       return false;
        }

        }
        
?>