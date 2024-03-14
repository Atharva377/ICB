<?php
    require '../config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ((isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)) {
        header("Location: dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Css -->
    <link rel="stylesheet" href="./css/root-partner.css">
    <link rel="stylesheet" href="./css/partner_prelogin_design.css">
    <link rel="stylesheet" href="./css/login.css">

    <title>Welcome to ICB! Log In</title>
</head>
    <body>
        <!-- Header -->
        <?php include"./components/header_pre_login.php";?>
        
        
        <!-- Login -->
        <form action="./database/login.php" method="post" class="login_form">
            <legend class="login_form__input">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" required>
            </legend>
            <legend class="login_form__input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required>
            </legend>
            <div class="login_form__btns">
                <button type="submit" name="login" class="login_btn">Login</button>
                <a href="./forgetPassword.php">Forget Password?</a>
            </div>
        </form>
    </body>
</html>