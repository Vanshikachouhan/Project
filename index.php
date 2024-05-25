<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Airline</title>
   
</head>
<style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.contact-form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

.contact-form h1 {
    margin-bottom: 15px;
    font-size: 24px;
}

.contact-form label {
    display: block;
    margin: 10px 0 5px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.contact-form button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #0056b3;
}

.submission-message {
    font-size: 18px;
    color: rgb(2, 2, 31);
    margin-top: 20px;
}

    </style>
<body>
    <div class="contact-form">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $server = "localhost";
            $username = "root";
            $password = "";
            $con = mysqli_connect($server, $username, $password);
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            $sql = "INSERT INTO airline.airline (name, email, message, dt) VALUES ('$name', '$email', '$message', current_timestamp())";
            
            if ($con->query($sql) === TRUE) {
                echo "<div class='submission-message'>Thank you for your submission, $name. We will get back to you at $email soon.</div>";
            } else {
                echo "<div class='submission-message'>Error: $sql <br> $con->error</div>";
            }
            
            $con->close();
        } else {
        ?>
       
        <h1>Contact Us</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Submit</button>
        </form>
      
        <?php
        }
        ?>
    </div>
</body>
</html>
