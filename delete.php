<?php

class DatabaseHandler {
    private $conn;

    public function __construct($host, $user, $password, $db) {
        $this->conn = new mysqli($host, $user, $password, $db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function deleteRecord($table, $user_id) {
        $sql = "DELETE FROM $table WHERE id='$user_id'";

        return $this->conn->query($sql);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

$dataHandler = new DatabaseHandler($host, $user, $password, $db);

if (isset($_GET['student_id'])) {
    $user_id = $_GET['student_id'];

    $tablesToDeleteFrom = ['contactus', 'albania', 'kosova', 'bosnia', 'hungary', 'bulgaria', 'macedonia', 'serbia', 'slovenia', 'montenegro', 'bulgaria', 'greece', 'aboutus','export','user'];

    foreach ($tablesToDeleteFrom as $table) {
        $result = $dataHandler->deleteRecord($table, $user_id);
        if (!$result) {
            echo "Error deleting record from $table";
            break;
        }
    }

    $dataHandler->closeConnection();

    header("location: {$_SERVER['HTTP_REFERER']}"); 
    exit();
}
?>
