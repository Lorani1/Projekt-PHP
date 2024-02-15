<?php

    include 'connect.php';
    include 'Sign_UP_C.php';

    $database = new Database();
    $db = $database->lidhu();

    $sign = new Sign($db);

    $is_admin = true;


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sign->username = $username;
        $sign->email = $email;
        $sign->password = $password;
        $sign->user_a = $is_admin ? 1:0;

       if($sign->create()){
        header("Location: login.inc.php");
        exit;
       }else{
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
        <div class="popup" id="popup">
            <ion-icon name="checkmark-circle-outline"></ion-icon>
            <h2>Thank you!</h2>
            <p>Your registration was successful. Thank you!</p>
            <a href="login.inc.php"><button onclick="CloseSlide()">OK</button></a>
        </div>
    </div>

    <script src="Sign_Up.js"></script>
</body>
</html>
