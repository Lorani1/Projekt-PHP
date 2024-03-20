<?php
 include 'auth.php';

$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

$data = mysqli_connect($host,$user,$password,$db);

$sql = "SELECT * FROM aboutus";

$result = mysqli_query($data,$sql);

 if ($_SESSION['user_type'] == 1) {
     // User type is 1, continue with regular user functionality
 } elseif ($_SESSION['user_type'] == 2) {
     // User type is 2, redirect to admin home
     redirectToAdminHome();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="About_Us_Signed.css">
    <link rel="stylesheet" href="about.css">
    <title>About Us</title>
</head>
<body>
    <nav class="Bar">
        <a href="Home_Signed.php" class="Bar-1">Home</a>
        <a href="About_Us_Signed.php">About Us</a>
        <a href="contactUs_Signed.php">Contact Us</a>
        <a href="Export.php">Export</a>
        <a href="Import.php">Import</a>
    </nav>
    <header>
        <h1>About Our Team</h1>
    </header>
    <?php
    while($info = $result->fetch_assoc()){

        ?>
    <section class="team-member">
        <img src="<?php echo $info['image'];?>" alt="Person 1">
        <div class="member-info">
            <h2><?php echo $info['name'];?></h2>
            <p><?php echo $info['position']; ?></p>
            <p><?php echo $info['description'];?></p>
        </div>
    </section>
    <?php
    }
    ?>
</body>
</html>
