<?php

class Product
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addProduct($name, $description, $image, $tablename)
    {
        $uploadDirectory = "./image/";
        $dst = $uploadDirectory . $image;
        $dst_db = "image/" . $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $dst)) {
            $data = $this->database->getConnection();
            $name = mysqli_real_escape_string($data, $name);
            $description = mysqli_real_escape_string($data, $description);

            $sql = "INSERT INTO $tablename (name, description, image) VALUES ('$name', '$description', '$dst_db')";
            $result = mysqli_query($data, $sql);

            if (!$result) {
                die("Error: " . mysqli_error($data));
            }

            return true;
        }

        return false;
    }
}

?>
