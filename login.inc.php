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
                    <input type="text" name="uid" placeholder="Username">
                </div>
                <div class="input-box">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="pwd" placeholder="Password">
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
        var uid = document.forms["Formfill"]["uid"].value;
        var pwd = document.forms["Formfill"]["pwd"].value;

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
