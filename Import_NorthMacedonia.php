<?php
include 'auth.php';
$host = "localhost";
$user = "root";
$password = "";
$db = "projekt";

$data = mysqli_connect($host,$user,$password,$db);

$sql = "SELECT * FROM macedonia";

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
    <link rel="stylesheet" href="Import_NorthMacedonia.css">
    <title>North Macedonia</title>
</head>
<body>
    <nav class="Bar">
        <a href="Main_Signed.html" class="Bar-1">Home</a>
        <a href="About_Us_Signed.html">About Us</a>
        <a href="contactUs_Signed.html">Contact  Us</a>
        <a href="Import.html" class="Bar-2">Import</a>
        <a href="Export.html">Export</a>
    </nav>

    <h1 style="text-align: center;">ALL THE THINGS WE EXPORT FROM NORTH MACEDONIA</h1>

    <div class="container">
        <?php
            while ($info = $result->fetch_assoc()) {
        ?>
            <article class="card">
                <div class='card-background'>
                    <img src="<?php echo $info['image']; ?>" alt="background" width="100px" height="50px" style="margin-top: 0px;">
                </div>
                <div class='content'>
                    <h1 style="text-align: center;"><?php echo $info['name']; ?></h1>
                    <p><?php echo $info['description']; ?></p>
                </div>
                <a href="#"><button><strong>ORDER</strong></button></a>
            </article>
        <?php
            }
        ?>
    </div>
</body>
</html>