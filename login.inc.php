<?php
include "connect.php";
include "LoginClass.php";

$database = new Database();
$db = $database->lidhu();
$logincheck = new LogIn($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logincheck->username = $username;
    $logincheck->password = $password;

    if ($logincheck->login()) {
        // Login successful, redirect to appropriate page
        if ($_SESSION['user_a'] == 1) {
            header("Location: Home_Signed.php");
            exit();
        } elseif ($_SESSION['user_a'] == 2) {
            header("Location: adminhome.php");
            exit();
        }
    } else {
        // Login failed, handle accordingly (display error message?)
        echo "Login failed";
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
            <form action="" method="post" name="Formfill" onsubmit="return validation()">
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
