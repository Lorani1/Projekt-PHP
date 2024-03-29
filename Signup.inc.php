<?php

include 'connect.php';
include 'Sign_UP_C.php';

$database = new Database();
$db = $database->lidhu();

$sign = new Sign($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['pwdrepeat'];

    // Validate password confirmation
    if ($password !== $password_confirm) {
        echo 'Password and password confirmation do not match.';
        exit;
    }

    // Always set user_a to 1 for student during user creation
    $user_a = 1;

    $sign->username = $username;
    $sign->email = $email;
    $sign->password = $password;
    $sign->user_a = $user_a;

    if ($sign->create()) {
        header("Location: login.inc.php");
        exit;
    } else {
        echo 'Failed to create user.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Sign_Up.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="" method="post" name="Formfill" onsubmit="return validation()">
                <h2>Sign Up</h2>
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="username" placeholder="Username" id="Username">
                </div>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <input type="email" name="email" placeholder="Email" id="Email">
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="password" placeholder="Password" id="Password">
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="pwdrepeat" placeholder="Confirm Password" id="CPassword">
                </div>
                <div class="button">
                    <input type="submit" name="submit" class="btn" onclick="validation()" value="Register">
                </div>
                <div class="group">
                    <span><a href="#">Forget Password</a></span>
                    <span><a href="login.inc.php">Login</a></span>
                </div>
            </form>
        </div>
    </div>

    <script src="Sign_Up.js"></script>
</body>
</html>
