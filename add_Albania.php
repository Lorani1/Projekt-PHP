<?php
include_once "Database.php";
include_once "Product.php";

$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

$database = new Database($host, $user, $password, $db);
$product = new Product($database);

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $image = $_FILES['image']['name'];

    // Get the table name dynamically based on the page name
    $tableName = strtolower(substr(basename($_SERVER['PHP_SELF']), 4, -4));

    if ($product->addProduct($name, $description, $image, $tableName)) {
    } else {
        echo "Failed to add product.";
    }
}

$database->closeConnection();
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
                    <li><a href="products.php">Albania</a></li>
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
                    <li><a href="add_product.php">Albania</a></li>
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
                <a href="">Export</a>
            </li>
            <li>
                <a href="contactus._admin.php">Contact Us</a>
            </li>
            <li>
                <a href="aboutus_addmission.php">About Us</a>
            </li>
        </ul>
    </aside>

    <div class="content">

            <h1>WELCOME TO ADMIN DASHBOARD</h1>
    
            <form action="#" method="POST" enctype="multipart/form-data">
            <div>
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="desc">Description:</label>
                <textarea id="desc" name="desc"></textarea>
            </div>
            <div>
                <label for="img">Image:</label>
                <input type="file" id="img" name="image">
            </div>
            <div>
                <input type="submit" name="add_product" value="Add Product">
            </div>
        </form>

        
    </div>
</body>
</html>
