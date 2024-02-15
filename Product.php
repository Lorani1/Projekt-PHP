<?php

class Product
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addProduct($name, $description, $image)
    {
        $uploadDirectory = "./image/";
        $dst = $uploadDirectory . $image;
        $dst_db = "image/" . $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $dst)) {
            $conn = $this->database->getConnection();
            $name = mysqli_real_escape_string($conn, $name);
            $description = mysqli_real_escape_string($conn, $description);

            $sql = "INSERT INTO bosnia (name, description, image) VALUES ('$name', '$description', '$dst_db')";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Error in SQL query: " . mysqli_error($conn));
            }

            return true;
        }

        return false;
    }
}

?>
