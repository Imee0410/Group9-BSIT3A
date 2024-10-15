<?php
require 'config/dbcon.php'; // Include the database connection file

if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirmpassword = mysqli_real_escape_string($con, $_POST["confirmpassword"]);

    // Check for duplicate username or email
    $duplicate = mysqli_query($con, "SELECT * FROM man WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email already taken');</script>";
    } else {
        // Check if passwords match
        if ($password === $confirmpassword) {
            // Insert the user into the database
            $query = "INSERT INTO man (username, email, password) VALUES ('$username', '$email', '$password')";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Registration successful');</script>";
            } else {
                echo "<script>alert('Error in registration: " . mysqli_error($con) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        /* Your CSS styles here */
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            padding: 0 10px;
        }

        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: green;
            opacity: 0.3;
        }

        .LOG {
            width: 400px;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            background: rgba(0, 128, 0, 0.3);
            backdrop-filter: blur(8px);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .input-field {
            position: relative;
            border-bottom: 2px solid #ccc;
            margin: 15px 0;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #fff;
            font-size: 16px;
            pointer-events: none;
            transition: 0.15s ease;
        }

        .input-field input {
            width: 100%;
            height: 40px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 16px;
            color: #fff;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            font-size: 0.8rem;
            top: 10px;
            transform: translateY(-120%);
        }

        button {
            background: #fff;
            color: #000;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        button:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.15);
        }

        .register {
            text-align: center;
            margin-top: 30px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="LOG">
        <form action="" method="POST" autocomplete="off">
            <h2>Sign Up</h2>
            <div class="input-field">
                <input type="text" name="username" id="username" required>
                <label>UserName</label>
            </div>
            <div class="input-field">
                <input type="email" name="email" id="email" required>
                <label>Enter your email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter a password</label>
            </div>
            <div class="input-field">
                <input type="password" name="confirmpassword" required>
                <label>Confirm password</label>
            </div>
            <button type="submit" name="submit">Sign Up</button>
            <div class="register">
                <p>Already have an account? <a href="login.php">Log in</a></p>
            </div>
        </form>   
    </div>
</body>
</html>