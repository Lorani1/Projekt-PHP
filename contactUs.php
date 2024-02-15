<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style_ContacUs.css">
            <title>Contact Us</title>
        </head>
        <body>
            <div id="overlay">
                <form onsubmit="event.preventDefault(); validateForm()">
                    <h1>Contact Us</h1>

                    <label for="name">Name:</label>
                    <input type="text" id="name" placeholder="Your Name">
                    <small class="error"></small>

                    <label for="email">Email:</label>
                    <input type="text" id="email" placeholder="Your email">
                    <small class="error"></small>

                    <label for="message">Message:</label>
                    <textarea id="message" placeholder="Your message" rows="10"></textarea>
                    <small class="error"></small>

                    <div class="center">
                        <input type="submit" value="Submit">
                        <p id="success"></p>
                    </div>
                </form>
            </div>
            <script src="contactUs.js"></script>
        </body>
        </html>