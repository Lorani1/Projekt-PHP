<?php
include 'auth.php';
include 'connect.php';

class AdminHome {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAboutUsInfo($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM aboutus WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function updateAboutUs($id, $name, $position, $description, $image) {
        $name = $this->conn->quote($name);
        $position = $this->conn->quote($position);
        $description = $this->conn->quote($description);

        $dst = "./image/" . $image;
        $dst_db = "image/" . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        $sql = ($image)
            ? "UPDATE aboutus SET name=$name, description=$description, position=$position, image='$dst_db' WHERE id=:id"
            : "UPDATE aboutus SET name=$name, description=$description WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "<script>alert('Update Success');</script>";
        } else {
            echo "<script>alert('Update Failed');</script>";
        }
    
    }
}

$data = new Database();
$conn = $data->lidhu(); 

if ($_GET['aboutus_id']) {
    $adminHome = new AdminHome($conn);
    $info = $adminHome->getAboutUsInfo($_GET['aboutus_id']);
}

if (isset($_POST['update_aboutus'])) {
    $adminHome = new AdminHome($conn);
    $adminHome->updateAboutUs($_POST['id'], $_POST['name'], $_POST['position'], $_POST['description'], $_FILES['image']['name']);
}

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
            color:white;
        }

        aside {
            width: 20%; /* Sidebar width as percentage */
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
            margin-left: 20%; /* Adjusted margin for content */
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
        .nav{
            color:white;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            aside {
                width: 100%; /* Full width on smaller screens */
                position: relative; /* Remove fixed positioning */
            }
            .content {
                margin-left: 0; /* No margin on smaller screens */
            }
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            padding: 10px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
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

            <h1>Update the product</h1>
            <!-- action="#" method="POST" enctype="multipart/form-data" -->
            <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $info['name']; ?>">
    </div>
    <div>
        <label for="name">Position:</label>
        <input type="text" id="name" name="position" value="<?php echo $info['position']; ?>">
    </div>
    <div>
        <label for="desc">Description:</label>
        <textarea id="desc" name="description"><?php echo $info['description']; ?></textarea>
    </div>
    <div>
        <label for="desc">Product old Image:</label>
        <img width="100px" height="100px" src="<?php echo $info['image']; ?>">
    </div>
    <div>
        <label for="img">Image:</label>
        <input type="file" id="img" name="image">
    </div>
    <div>
        <input type="submit" name="update_aboutus" value="Update About Us">
    </div>
</form>


    </div>
</body>
</html>
