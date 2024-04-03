<?php
include 'auth.php';
include 'connect.php';

class ExportHandler {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertExport($Name, $Country, $pName, $eCountry, $Price, $txt, $image) {
        try {
            $sql = "INSERT INTO export (Cname, Country, pName, Cexport, Price, message, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $Name);
            $stmt->bindParam(2, $Country);
            $stmt->bindParam(3, $pName);
            $stmt->bindParam(4, $eCountry);
            $stmt->bindParam(5, $Price);
            $stmt->bindParam(6, $txt);
            $stmt->bindParam(7, $image);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function closeConnection() {
        $this->conn = null; 
    }
}

$database = new Database(); 
$conn = $database->lidhu(); // Get PDO connection

$exportHandler = new ExportHandler($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        if ($exportHandler->insertExport($Name, $Country, $pName, $eCountry, $Price, $txt, $image)) {
            echo "New record created successfully";
        } else {
            echo "Error: Unable to insert record";
        }

        $exportHandler->closeConnection();

        header("Location: Export.php");
        exit();
    }
}

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
    
    <style>
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: white; 
        font-family: 'Arial', sans-serif;
        color: #fff;
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
        color: #fff; 
    }

    .Bar a:hover {
        background-color: #27ae60;
        height: 55px;
    }

    .Bar-1 {
        background-color: #1a1a1a; 
        height: 50px;
        width: 70px;
        
    }

    .Bar-2 {
        height: 50px;
        width: 75px;
        float: right;
    }
    .Info {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .Info .InputGroup {
        margin-bottom: 20px;
    }

    .Info .InputGroup label {
        display: block;
        margin-bottom: 5px;
    }

    .Info input[type="text"],
    .Info textarea,
    .Info select {
        width: 100%;
        padding: 10px;
        border: 1px solid #555;
        border-radius: 8px;
        background-color: #fff;
        color: #000;
        margin-top: 5px;
    }

    .Info input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
        background-color: #27ae60;
        color: #fff;
        cursor: pointer;
    }

    .Info input[type="submit"]:hover {
        background-color: #218e54;
    }

    .img-view {
        width: 100%;
        height: 200px;
        border-radius: 20px;
        border: 2px dashed #bbb5ff;
        background: #f7f8ff;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .img-view img {
        max-width: 100%;
        max-height: 100%;
    }

    .SubmitGroup {
        text-align: center;
    }

    </style>
    <title>Export</title>
</head>
<body>
<nav class="Bar">
        <a href="Home_Signed.php" class="Bar-1">Home</a>
        <a href="contactUs_Signed.php">Contact Us</a>
        <a href="About_Us_Signed.php">About Us</a>
        <a href="Import.php" class="Bar-2">Import</a>
        <a href="Export.php">Export</a>
    </nav>
    <p id="error" style="color:red;"></p>
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
    <script>
        const form = document.querySelector("form");
        const errorElement = document.getElementById("error");

form.addEventListener('submit', (e) => {
    let messages = [];
    
    const inputs = form.querySelectorAll('input, select, textarea');

    inputs.forEach(input => {
        const inputValue = input.value.trim(); 

     
        if (inputValue === '' || inputValue === null) {
            messages.push(`${input.name} is required`);
        }

    
        switch(input.name) {
            case 'Cname':
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                if (!/^[A-Z]/.test(inputValue)) {
                    messages.push(`${input.name} should start with an uppercase letter`);
                }
                if (!/\d/.test(inputValue)) {
                    messages.push(`${input.name} should contain at least 1 digit`);
                }
                break;
            case 'pName': 
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                break;
            case 'eCountry':
                if (inputValue.length <= 4) {
                    messages.push(`${input.name} should be longer than 4 characters`);
                }
                break;
            case 'Price': 
                if (isNaN(inputValue)) {
                    messages.push(`${input.name} should be a valid number`);
                }
                break;
            case 'image': 
                const file = input.files[0];
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!file) {
                    messages.push(`Please select an image`);
                } else if (!allowedExtensions.test(file.name)) {
                    messages.push(`Invalid file type. Only JPG, JPEG, PNG, or GIF files are allowed.`);
                }
                break;
        }
    });

   
    if (messages.length > 0) {
        e.preventDefault();
        errorElement.innerText = messages.join(', ');
    } else {
        errorElement.innerText = ''; // Clear any previous error messages
    }
});

    </script>
</body>
</html>

