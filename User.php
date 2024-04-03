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
        $conn = $this->database->lidhu(); // Assuming lidhu() method returns a PDO connection

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO $tableName (username, email, password, user_a) VALUES (:username, :email, :password, :user_a)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_a', $user_a);

        // Execute the statement
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
