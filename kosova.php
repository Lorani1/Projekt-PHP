<?php
include 'auth.php';
include 'connect.php';
class AdminDashboard
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function fetchContactUsData()
    {
        $conn = $this->db->lidhu(); // Call the lidhu method to get the connection

        $sql = "SELECT * FROM kosova";
        $result = $conn->query($sql);

        if (!$result) {
            die("Error in SQL query: " . $conn->errorInfo()[2]);
        }

        return $result;
    }

    public function deleteContactUsData($id)
    {
        $conn = $this->db->lidhu(); // Call the lidhu method to get the connection

        $sql = "DELETE FROM kosova WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount() == 0) {
            die("Error in deleting record");
        }

        return true;
    }

    public function closeConnection()
    {
       $this->db->conn = null;
    }
}

$database = new Database(); 
$adminDashboard = new AdminDashboard($database);

if ($_SESSION['user_type'] != 2) {
    // If user type is not 2, redirect back to login
    redirectToLogin();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .logout {
            float: right;
            margin-right: 20px;
        }

        aside {
            width: 200px;
            height: 100%;
            position: fixed;
            background-color: #f1f1f1;
            padding-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #555;
            color: white;
        }

        .content {
            margin-left: 220px;
            padding: 16px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }


        /* Additional style for nested lists */
        ul.nested {
            position: absolute;
            left: 100%;
            top: 0;
            display: none;
        }

        li:hover .nested {
            display: block;
            background-color:lightgrey;
        }
    </style>
</head>
<body>

    <header class="header">
        <a href="adminhome.php" style="color:white;">Admin Home</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary" style="color:white;">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li>
                <a href="products.php">Products</a>
                <ul class="nested">
                    <li><a href="albania.php">Albania</a></li>
                    <li><a href="kosova.php">Kosova</a></li>
                    <li><a href="serbia.php">Serbia</a></li>
                    <li><a href="slovenia.php">Slovenia</a></li>
                    <li><a href="bulgaria.php">Bulgaria</a></li>
                    <li><a href="bosnia.php">Bosnia Hrezegovina</a></li>
                    <li><a href="macedonia.php">North Macedonia</a></li>
                    <li><a href="montenegro.php">Montenegro</a></li>
                    <li><a href="greece.php">Greece</a></li>
                    <li><a href="hungary.php">Hungary</a></li>
                </ul>
            </li>
            <li>
                <a href="">Add Products</a>
                <!-- Nested list for Add Products -->
                <ul class="nested">
                    <li><a href="add_Albania.php">Albania</a></li>
                    <li><a href="add_kosova.php">Kosova</a></li>
                    <li><a href="add_serbia.php">Serbia</a></li>
                    <li><a href="add_slovenia.php">Slovenia</a></li>
                    <li><a href="add_bulgaria.php">Bulgaria</a></li>
                    <li><a href="add_bosnia.php">Bosnia Hrezegovina</a></li>
                    <li><a href="add_macedonia.php">North Macedonia</a></li>
                    <li><a href="add_montenegro.php">Montenegro</a></li>
                    <li><a href="add_greece.php">Greece</a></li>
                    <li><a href="add_hungary.php">Hungary</a></li>
                </ul>
            </li>
            <li>
                <a href="export_db.php">Export</a>
            </li>
            <li>
                <a href="contactus._admin.php">Contact Us</a>
            </li>
            <li>
                <a href="aboutus_addmission.php">About Us</a>
            </li>
            <li>
                <a href="Users.php">Users</a>
            </li>
            <li>
                <a href="add_user.php">Add Users</a>
            </li>
        </ul>
    </aside>

    <div class="content">
        <h1>Applied for Admission</h1>

        <?php
        $result = $adminDashboard->fetchContactUsData();

        if ($result->rowCount() > 0) {
            ?>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Description</th>
                    <th style="padding: 20px; font-size: 15px;">Image</th>
                    <th style="padding: 20px; font-size: 15px;">Delete</th>
                    <th style="padding: 20px; font-size: 15px;">Update</th>
                </tr>
                <?php
                while ($info = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td style="padding: 20px;"><?php echo $info['name']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['description']; ?></td>
                        <td style="padding: 20px;"><img src="<?php echo $info['image']; ?>" style="width:100px;"></td>
                        <td style="padding: 20px;color:black;">
                            <?php echo "<a onclick=\"javascript:return confirm('Are you sure you wanna delete this'); \" 
                             href='delete.php?student_id={$info['id']}'>Delete</a>"; ?>
                        </td>
                        <td style="padding: 20px;color:black;">
                            <?php echo " <a href='update_kosova.php?kosova_id={$info['id']}' class='btn btn-primary'>Update</a>";
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "No records found.";
        }

        $adminDashboard->closeConnection();
        ?>
    </div>
</body>
</html>
