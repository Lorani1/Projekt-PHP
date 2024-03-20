<?php

class User
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addUser($username, $email, $password, $user_a, $tableName)
    {
        $data = $this->database->getConnection();
        $username = mysqli_real_escape_string($data, $username);
        $email = mysqli_real_escape_string($data, $email);
        $password = mysqli_real_escape_string($data, $password);
        $user_a = mysqli_real_escape_string($data, $user_a);
    
        $sql = "INSERT INTO $tableName (username, email, password, user_a) VALUES ('$username', '$email', '$password', '$user_a')";
        $result = mysqli_query($data, $sql);
    
        if (!$result) {
            die("Error: " . mysqli_error($data));
        }
    
        return true;
    }
}
?>
