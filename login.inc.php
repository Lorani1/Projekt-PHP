<?php
session_start(); // Start the session

$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

// Create a connection to the database
$data = mysqli_connect($host, $user, $password, $db);

if(!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($data, $_POST['username']);
    $password = mysqli_real_escape_string($data, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($data, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $user_a = $user_data['user_a'];
        
        // Set session variable for user type
        $_SESSION['user_type'] = $user_a;

        if($user_a == 1) {
            // Regular user, redirect to Home_Signed.php
            header("Location: Home_Signed.php");
            exit();
        } elseif($user_a == 2) {
            // Admin user, redirect to adminhome.php
            header("Location: adminhome.php");
            exit();
        }
    } else {
        // Login failed
        echo "<script>displayAlert('Error: Invalid Username or Password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign_Up.css">
    <title>Log In</title>
</head>
<body>
    <style>
    .button {
        display: flex;
        align-items: center;
    }

    .signup-link {
        margin-left: 20px; 
        text-decoration: none; 
        color: #3498db; 
    }

    </style>
    <div class="container">
        <div class="form-box">
            <form action="" method="POST" name="Formfill" onsubmit="return validation()">
                <h2>Log In</h2>
                <p id="result"></p>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div class="button">
                    <input type="submit" name="submit" class="btn" value="LogIn">
                    <a href="Home_Signed.php" class="signup-link">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    function validation() {
        var uid = document.forms["Formfill"]["username"].value;
        var pwd = document.forms["Formfill"]["password"].value;

        if (uid === "") {
            document.getElementById("result").innerHTML = "Please enter your username.";
            return false;
        }

        if (pwd === "") {
            document.getElementById("result").innerHTML = "Please enter your password.";
            return false;
        }

        return true;
    }
</script>
</body>
</html>
