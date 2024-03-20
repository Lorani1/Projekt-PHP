<?php
include 'auth.php';
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
    <link rel="stylesheet" href="Import.css">
    <title>Import</title>
</head>
<body>
    <nav class="Bar">
        <a href="Main_Signed.php" class="Bar-1">Home</a>
        <a href="About_Us_Signed.php">About Us</a>
        <a href="contactUs_Signed.php">Contact Us</a>
        <a href="Export.php">Export</a>
        <a href="Import.php">Import</a>
    </nav>

    <h1>Countries we export/import from</h1>

    <div class="Box">
        <div class="Country">
            <a href="Import_Albania.php"><img src="Albania.jpg" alt="" class="img"></a>
    <div class="views_date">
        <p>Albania</p>
            </div>
        </div>
        <div class="Country">
           <a href="Import_Kosova.php"><img src="Kosovo.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Kosovo</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Greece.php"><img src="Greece.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Greece</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_NorthMacedonia.php"><img src="NorhMacedonia.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>North Macedonia</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Bulgaria.php"><img src="Bulgaria.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Bulgaria</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Serbia.php"><img src="Serbia.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Serbia</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Hungary.php"><img src="Hungary.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Hungary</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Hungary.php"><img src="Bosnia.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Bosnia Herzegovina</p>
            </div>
        </div>
        <div class="Country">
            <a href="Import_Slovenia.php"><img src="Slovenia.jpg" alt="" class="img"></a>
            <div class="views_date">
                <p>Slovenia</p>
            </div>
        </div>
        <div class="Country">
           <a href="Import_Montenegro.php"><img src="Montenegro.jpg" alt="" class="img" style="margin-top: 30px;"></a>
            <div class="views_date">
                <p>Montenegro</p>
            </div>
        </div>

</body>
</html>