<?php
include 'auth.php';
include 'connect.php';

if ($_SESSION['user_type'] != 2) {
    // If user type is not 2, redirect back to login
    redirectToLogin();
}

$db = new Database();
$conn = $db->lidhu(); // Get the PDO object from the connection

if(isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_a = $_POST['user_a'];

    try {
        // Update query
        $sql = "UPDATE user SET username=?, email=?, password=?, user_a=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email, $password, $user_a, $id]);

        echo "User updated successfully";
    } catch(PDOException $e) {
        echo "Error updating user: " . $e->getMessage();
    }
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

        a {
            color: white;
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
        <a href="adminhome.php">Admin Home</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
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

        <?php
       if(isset($_GET['user_id'])) {
        $u_id = $_GET['user_id'];
        $sql = "SELECT * FROM user WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$u_id]);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($info) {
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $info['username']; ?>">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $info['email']; ?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password" value="<?php echo $info['password']; ?>">
            </div>
            <div>
                <label for="user_a">User_a:</label>
                <input type="text" id="user_a" name="user_a" value="<?php echo $info['user_a']; ?>">
            </div>
            <input type="submit" name="update_user" value="Update User" class="btn btn-success">
        </form>

        <?php
            } else {
                echo "No user found.";
            }
        } else {
            echo "User ID not provided.";
        }
        ?>

    </div>
</body>
</html>