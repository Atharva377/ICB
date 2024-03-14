<?php
/*
 Title: This page provide link to registration form.

 Dependencies:
 - None
*/

 // 1. session_status() checks for the status of session.
    if (session_status() == PHP_SESSION_NONE) {
         // If session_status is equal to PHP_SESSION_NONE
        // Then start the session using session_start()
        session_start();
    }
    // 2. Checking if session variable logged_in is set not null and logged_in value is true
    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
        // Redirect to index.php page for login.
        header("Location: ./index.php");
    }
    // 3. If session type variable is not  set
    if (!(isset($_SESSION['type']) && ($_SESSION['type']=='admin' || $_SESSION['type']=='core-team'))){
        // Redirect to index.html page.
        header("Location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/addMarshalls.css">
    <link rel="stylesheet" href="./css/utils.css">
    <link rel="stylesheet" href="./css/bottomNav.css">
    <style>
        <?php include "./css/header.css" ?>
    </style>
    <title>CareforBharat</title>
</head>
<body>

    <!-- Navigation Bar -->
    <?php
        include './header.php';
    ?>

    <!-- Button for Registration Form -->
    <div class="addMarshall">
        <div class="marshalls">
            <a target="_blank" href="./membersRegistration.php" class="addMember">
                <div class="details">
                    <div>Member</div>
                    <div>Membership Fee: &#8377; 00/-</div>
                    <div>Eligibility: 18+ Only</div>
                </div>
            </a>
            <!-- <a target="_blank" class="addSchool">
                <div class="details">
                    <div>School</div>
                    <div>SLTP Fee: &#8377;199/-</div>
                    <div>Eligibility: Must be enrolled in School</div>
                </div>
            </a> -->
            <!-- <a target="_blank" class="addVolunteer">
                <div class="details">
                    <div>Volunteers</div>
                    <div>(Not Now)</div>
                </div>
            </a> -->
        </div>
    </div>

    <?php include "./components/bottomNav.php";?>
    <script src="./js/sideBar.js" defer></script>
    <script src="./js/sliderAccordian.js" defer></script>
</body>

</html>