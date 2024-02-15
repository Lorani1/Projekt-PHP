<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactUs_Signed.css">
    <title>Contact Us</title>
</head>
<body>
    <nav class="Bar">
        <a href="Home_Signed.php"><img src="Logo_Banner.jpg" alt="Lyra"></a>
        <div class="links">
            <a href="About_Us_Signed.php">About Us</a>
            <a href="contactUs_Signed.php">Contact Us</a>
            <a href="Import.php">Import</a>
            <a href="Export.php">Export</a>
        </div>
    </nav>
    <div id="overlay">
        <form method="post" action="contactUs_Signed.php" onsubmit="event.preventDefault(); validateForm()">

            <h1>Contact Us</h1>

            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Your Name" name="name">
            <small class="error"></small>

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Your email" name="email">
            <small class="error"></small>

            <label for="message">Message:</label>
            <textarea id="message" placeholder="Your message" rows="10" name="message"></textarea>
            <small class="error"></small>

            <div class="center">
                <button type="submit" value="Send Message">Submit</button>
                <p id="success"></p>
            </div>
        </form>
    </div>

    <script src="contactUs_Signed.js"></script>
</body>
</html>
