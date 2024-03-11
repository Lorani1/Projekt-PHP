<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "projekt";
    private $conn;

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function saveRecords($tbName, $n, $e, $m)
    {
        $stmt = $this->conn->prepare("INSERT INTO $tbName (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $n, $e, $m);
        if ($stmt->execute()) {
            // echo "Records Saved";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$obj = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['apply'])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
       
       
        if (empty($name) || empty($email) || empty($message)) {
            // Send error message to JavaScript
            echo "<script>displayAlert('Error: All fields are required.');</script>";
            
        } else {
            // Save records
            $obj->connect();
            $obj->saveRecords("contactus", $name, $email, $message);
            
            // Redirect to prevent form resubmission on refresh
            header("Location: contactUs_Signed.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactUs_Signed.css">
    <title>Contact Us</title>
</head>
<body>
    <div id="overlay">
    <header class="Bar">
      <a href="#home"><img src="img/Logo_Banner.jpg" alt="Lyra"></a>
  
      <nav class="Bar">
        <a href="Main_Signed.php" class="Bar-1">Home</a>
        <a href="About_Us_Signed.php">About Us</a>
        <a href="contactUs_Signed.php">Contact Us</a>
        <a href="Export.php">Export</a>
        <a href="Import.php">Import</a>
    </nav>
        <div class="icons">
          <i class="fas fa-bars" id="menu-bars"></i>       
          <i class="fas fa-search" id="search-icon"></i>
          <a href="#" class="fas fa-shopping-cart"></a>
        </div>

        
      </header>
        <form method="post" id="form">
            <h1>Contact Us</h1>
            <p id="error" style="color:red;"></p>

            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Your Name" name="name">
           

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Your email" name="email">
            

            <label for="message">Message:</label>
            <textarea id="message" placeholder="Your message" rows="10" name="message"></textarea>
         

            <div class="center">
                <input type="submit" id="submit" value="Apply" name="apply">
                <p id="success"></p>
            </div>
        </form>
    </div>

    <script>
        function displayAlert(message) {
    alert(message);
}

const username = document.getElementById("name");
const email = document.getElementById("email");
const message = document.getElementById("message");
const form = document.getElementById("form");
const errorValue = document.getElementById("error");

form.addEventListener('submit',(e)=>{

    let messages = [];

    if(username.value.trim() === ""){
        messages.push('name duhet te plotesohet');
    }
    if(/\d/.test(username.value) || /[^\w\d]/.test(username.value)){
        messages.push('name duhet te kete vetem shkronja');
    }
    if(email.value.trim() === ""){
        messages.push('email duhet te plotesohet');
    }
    if(!email.value.includes("@")){
        messages.push('Email duhet te kete karakterin @');
    }
    if(message.value.length<=6){
        messages.push('Message duhet te kete 6 ose me shume karaktere');
    }
    if(message.value.trim() === ""){
        messages.push('Message duhet te plotesohet');
    }

    if(messages.length > 0){
        e.preventDefault();

        errorValue.innerText = messages.join(', ');
    }

});

    </script>
</body>
</html>
