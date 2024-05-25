<!DOCTYPE html>
<html>
<head>
    <title>Book Now</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
           color:rgb(2, 2, 31);
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="datetime-local"],
        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .submission-message {
    font-size: 18px;
    color: rgb(2, 2, 31);
    margin-top: 20px;
    justify-content: center;
    align-items:center;
}
    </style>

</head>
<body>
    <h2>Book Your Flight</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $server = "localhost";
        $username = "root";
        $password = "";
       
        $con = mysqli_connect($server, $username, $password);
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $name = htmlspecialchars($_POST['full_name']);
        $dob = htmlspecialchars($_POST['dob']);
        $gender = htmlspecialchars($_POST['gender']);
        $email = htmlspecialchars($_POST['email']);
        $departure_date_time = htmlspecialchars($_POST['departure_date_time']);
        $return_date_time = htmlspecialchars($_POST['return_date_time']);
        $passengers = htmlspecialchars($_POST['passengers']);
        $passport_no = htmlspecialchars($_POST['passport_no']);
        

        $sql = "INSERT INTO button.info (`Full name`, `D.O.B`, `Gender`, `Email Address`, `Departure Date and Time`, `Return Date and Time`, `No. of Passengers`, `Passport no. (for international travel)`, `dt`) VALUES ('$name', '$dob', '$gender', '$email', '$departure_date_time', '$return_date_time', '$passengers', '$passport_no',  current_timestamp())";
        
        if ($con->query($sql) === TRUE) {
            echo "<div class='submission-message'>Thank you for your submission, $name. We will get back to you at $email soon. Online payment is currently unavailable. So please contact our customer service at[wxyz] to complete your booking. </div>";
        } else {
            echo "<div class='submission-message'>Error: $sql <br> $con->error</div>";
        }
        
        $con->close();
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="departure_date_time">Departure Date and Time:</label>
        <input type="datetime-local" id="departure_date_time" name="departure_date_time" required><br><br>
        
        <label for="return_date_time">Return Date and Time:</label>
        <input type="datetime-local" id="return_date_time" name="return_date_time" required><br><br>
        
        <label for="passengers">No. of Passengers:</label>
        <input type="number" id="passengers" name="passengers" min="1" required><br><br>
        
        <label for="passport_no">Passport No. (for international travel):</label>
        <input type="text" id="passport_no" name="passport_no"><br><br>
        
        <input type="submit" value="Book Now">
    </form>
</body>
</html>
