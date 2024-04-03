<?php

class Product
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function addProduct($name, $description, $image, $tableName)
    {
        $uploadDirectory = "./image/";
        $dst = $uploadDirectory . $image;
        $dst_db = "image/" . $image;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $dst)) {
            try {
                $conn = $this->database->lidhu();
                
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO $tableName (name, description, image) VALUES (:name, :description, :image)");
                
                // Bind parameters
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $dst_db);
                
                // Execute the statement
                $stmt->execute();
                
                return true; // Product added successfully
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false; // Failed to add product
            }
        }

        return false; // Failed to upload image
    }
}

?>
