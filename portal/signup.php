<?php
/*
 Title: This page provides UI for users to sign up into platform.
 Backend
 Dependencides:
 - config.php
 - phpMailer
*/
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// 1. Session start
session_start();

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $newUserFirstName = $mysqli->escape_string($_POST['firstName']);
        $newUserLastName = $mysqli->escape_string($_POST['lastName']);
        $newUsername = $_POST['firstName'] . $_POST['lastName'];
        $newUserFullName = $_POST['firstName'] . " " . $_POST['lastName'];
        $newUserEmail = $mysqli->escape_string($_POST['email']);
        $newUserMobile = $mysqli->escape_string($_POST['mobile']);

        $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $mysqli->escape_string(hash('sha512', md5(rand(99, 9999))));
        date_default_timezone_set("Asia/Kolkata");
        $newUserRegistrationDate = date("Y-m-d");
        $newUserExpirationDate = date("Y-m-d", strtotime($newUserRegistrationDate . "+365 days"));

        $result = $mysqli->query("SELECT * FROM users WHERE email='$newUserEmail'") or die($mysqli->error);
        if ($result->num_rows > 0) {
            $_SESSION['message'] = 'User with this email exists!';
            header("location: ./index.php");
            
            
        } else {
            $sql_a = "INSERT INTO users (username, type, email, password, hash, firstName, lastName, registrationDate, expirationDate, profilepic, bio, mobile)" .
                "VALUES ('$newUsername','volunteer','$newUserEmail','$password', '$hash', '$newUserFirstName', '$newUserLastName', '$newUserRegistrationDate', '$newUserExpirationDate', './images/defaultprofile.png', 'Welcome!', '$newUserMobile')";
            $sql_b = "INSERT INTO stats (userEmail, username, type) VALUES ('$newUserEmail', '$newUsername', 'volunteer')";
            $mysqli->query($sql_a);
            $mysqli->query($sql_b);
            // Redirect to login page after successful signup
            echo '<script>alert("Registration Successful. Click OK to proceed to login page."); window.location.href = "index.php";</script>';
            // header("location: ./index.php");
           
            exit; // Make sure to exit to prevent further execution
        }
        
    }
    
}
?>

<!-- Front End -->
<!DOCTYPE html>
<html lang="en-IN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- main css -->
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Signup | Member</title>
</head>

<body>
    <div class="container">
        <form action="./signup.php" method="POST" class="login-email">
            <p class='login-text'>Sign-Up</p>
            <div class="input-group">
                <input type="text" placeholder="First Name" name="firstName" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Last Name" name="lastName" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" autocomplete="off" required>
            </div>
            <div class="input-group">
                <input type="tel" placeholder="Phone Number(10 digits)" name="mobile" autocomplete="off" pattern="[0-9]{10}" required>
            </div>
            <input type="hidden" id="fee" name="fee" value="100">
            <div class="input-group">
                <button class="btn rzp-button1" name="signup">Sign-Up</button>
            </div>
        </form>
    </div>
</body
