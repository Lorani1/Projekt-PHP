<?php
class About
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function addProduct($name, $position, $description, $image, $tableName)
    {
        $conn = $this->db->lidhu();

        $sql = "INSERT INTO $tableName (name, position, description, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $position, $description, $image]);

        return true; // Or handle success as needed
    }
}
?>
