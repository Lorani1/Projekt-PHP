<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projekt";

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("INSERT INTO export (Cname, Country, pName, Cexport, Price, message, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdss", $Name, $Country, $pName, $eCountry, $Price, $txt, $image);

    $Name = $_POST["Name"];
    $Country = $_POST["Country"];
    $pName = $_POST["pName"];
    $eCountry = $_POST["eCountry"];
    $Price = $_POST["Price"];
    $txt = $_POST["txt"]; 
    $image = $_FILES["image"]["name"]; 

    if (empty($Name) || empty($Country) || empty($pName) || empty($eCountry) || empty($Price) || empty($txt) || empty($image)) {
        
        echo "<script>displayAlert('Error: All fields are required.');</script>";
        
    } else {
       
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();

        header("Location: Export.php");
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Export.css">
    <style>
        .SubmitGroup {
            position: absolute;
            top: 850px; 
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
    <title>Export</title>
</head>
<body>
    <nav class="Bar">
       <a href="Main_Signed.html"><img src="Logo_Banner.jpg" alt="Lyra"></a> 
        <div class="links">
            <a href="About_Us_Signed.php">About Us</a>
            <a href="contactUs_Signed.php">Contact Us</a>
            <a href="Import.php">Import</a>
            <a href="Export.php">Export</a>
        </div>
    </nav>

    <form method="post" enctype="multipart/form-data"> <!-- Changed form action to submit.php -->
        <div class="Info">
            <div class="InputGroup">
                <label for="Name">Name of the Company:</label>
                <input type="text" name="Name" id="Cname" placeholder="Enter company name">
            </div>
            <div class="InputGroup SelectGroup">
                <label for="Country">Country:</label>
                <select name="Country" id="Country">
                    <option value="Kosova">Kosova</option>
                    <option value="Albania">Albania</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Srbia">Srbia</option>
                    <option value="North Macedonia">North Macedonia</option>
                    <option value="Bosnia and Herezegovina">Bosnia and Herezegovina</option>
                    <option value="Montenegro">Montenegro</option>
                </select>
            </div>
            <div class="InputGroup">
                <label for="pName">Product Name:</label>
                <input type="text" name="pName" id="pName" placeholder="Enter product name">
            </div>
            <div class="InputGroup">
                <label for="eCountry">Country to Export:</label>
                <input type="text" name="eCountry" id="Cexport" placeholder="Enter export country">
            </div>
            <div class="InputGroup">
                <label for="Price">Price:</label>
                <input type="text" name="Price" id="Price" placeholder="Enter price">
            </div>
            <div class="TextAreaGroup">
                <label for="txt">Info for Product:</label>
                <textarea name="txt" id="message" cols="30" rows="10" placeholder="Enter product info"></textarea>
            </div>
            <div class="hero" id="hero-1">
                <label for="input-file-1" class="drop-area">
                    <input type="file" accept="image/*" id="input-file-1" name="image" class="input-file" hidden> <!-- Added name for file input -->
                    <div class="img-view">
                        <img src="Upload.jpg" alt="Upload">
                        <p>Drag Icon and Upload</p>
                        <span>Upload any image from desktop</span>
                    </div>
                </label>
            </div>
            <div class="SubmitGroup">
                 <input type="submit" value="Submit"> 
            </div>
        </div>
    </form>
    <script src="Export.js"></script>
</body>
</html>

