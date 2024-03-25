<?php
include 'auth.php';
class AdminDashboard
{
    private $data;

    public function __construct($host, $user, $password, $db)
    {
        $this->data = mysqli_connect($host, $user, $password, $db);

        if ($this->data === false) {
            die("Connection error: " . mysqli_connect_error());
        }
    }

    public function fetchContactUsData()
    {
        $sql = "SELECT * FROM export";
        $result = mysqli_query($this->data, $sql);

        if ($result === false) {
            die("Error in SQL query: " . mysqli_error($this->data));
        }

        return $result;
    }

    public function deleteContactUsData($id)
    {
        $sql = "DELETE FROM export WHERE id = $id";
        $result = mysqli_query($this->data, $sql);

        if ($result === false) {
            die("Error in SQL query: " . mysqli_error($this->data));
        }

        return $result;
    }

    public function closeConnection()
    {
        mysqli_close($this->data);
    }
}

// Replace these values with your database details
$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

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

        if ($result->num_rows > 0) {
            ?>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Company name</th>
                    <th style="padding: 20px; font-size: 15px;">Country</th>
                    <th style="padding: 20px; font-size: 15px;">Product Name</th>
                    <th style="padding: 20px; font-size: 15px;">Country to Export</th>
                    <th style="padding: 20px; font-size: 15px;">Price</th>
                    <th style="padding: 20px; font-size: 15px;">Message</th>
                    <th style="padding: 20px; font-size: 15px;">Image</th>
                    <th style="padding: 20px; font-size: 15px;">Delete</th>
                    <th style="padding: 20px; font-size: 15px;">Update</th>
                </tr>
                <?php
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td style="padding: 20px;"><?php echo $info['Cname']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['country']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['Pname']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['Cexport']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['price']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['message']; ?></td>
                        <td style="padding: 20px;"><img src="<?php echo $info['image']; ?>" style="width:100px;"></td>
                        <td style="padding: 20px;color:black;">
                            <?php echo "<a onclick=\"javascript:return confirm('Are you sure you wanna delete this'); \" 
                             href='delete.php?student_id={$info['id']}'>Delete</a>"; ?>
                        </td>
                        <td style="padding: 20px;color:black;">
                            <?php echo " <a href='update_export.php?export_id={$info['id']}' class='btn btn-primary'>Update</a>";
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
