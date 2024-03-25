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
     
 } elseif ($_SESSION['user_type'] == 2) {
    
     redirectToAdminHome();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: white;
    color: black;
    margin: 0;
}

.Bar {
  display: flex;
  text-decoration: none;
  padding: 0;
  margin: 0;
  justify-content: flex-start;
  border: none;
  background-color: lightgrey; /* Light grey background color for navbar */
  height: 50px;
  overflow: hidden;
}

.Bar a {
  padding: 14px 16px;
  display: inline-block;
  text-decoration: none;
  color: #fff; /* White text color */
}

.Bar a:hover {
  background-color: #27ae60; /* Green background color on hover */
  height: 55px;
}

.Bar-1 {
  background-color: #1a1a1a; /* Dark gray background color */
  height: 50px;
  width: 40px;
}

.Bar-2 {
  height: 50px;
  width: 75px;
  float: right;
}
header {
    text-align: center;
    padding: 20px;

}

.team-member {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
}

.team-member img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.member-info {
    text-align: center;
}

.member-info h2 {
    margin-bottom: 5px;
}

.member-info p {
    margin: 0;
}

    </style>
</head>
<body>  
    <nav class="Bar">
        <a href="Home_Signed.php" class="Bar-1">Home</a>
        <a href="contactUs_Signed.php">Contact Us</a>
        <a href="About_Us_Signed.php">About Us</a>
        <a href="Import.php" class="Bar-2">Import</a>
        <a href="Export.php">Export</a>
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
