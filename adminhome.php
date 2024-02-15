<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Add your CSS styles here */

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
        a{
            color:white;
        }

        /* Additional style for nested lists */
        ul.nested {
            display: none;
        }

        li:hover ul.nested {
            display: block;
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
                <a href="contactus._admin.php">Contact Us</a>
            </li>
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
                <a href="aboutus_addmission.php">About Us</a>
            </li>
        </ul>
    </aside>

    <div class="content">

            <h1>WELCOME TO ADMIN DASHBOARD</h1>
           
 
    </div>
</body>
</html>
