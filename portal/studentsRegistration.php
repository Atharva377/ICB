<?php

require "config.php";

use Razorpay\Api\Api;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
    header("Location: ./index.php");
}
if (!(isset($_SESSION['type']) && ($_SESSION['type']=='admin' || $_SESSION['type']=='core-team'))){
    header("Location: ../index.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Registration</title>
    <link rel="stylesheet" href="./css/studentsRegistration.css">
</head>


<body>
    <h1 id="title">Students Registration</h1>
    <form id="survey-form" action="./database/addUser.php" method="POST">
        <div class="form-group">
            <label id="name-label" for="firstname" class="required">First Name </label>
            <input id="firstname" type="text" name="firstName" required placeholder="first name">
            <span class="validity"></span>
        </div>
        <div class="form-group">
            <label id="name-label" for="lastname" class="required">Last Name </label>
            <input id="lastname" type="text" name="lastName" required placeholder="last name">
            <span class="validity"></span>
        </div>

        <div class="form-group">
            <label id="email-label" for="email" class="required">Email </label>
            <input id="email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required placeholder="email">
            <span class="validity"></span>
        </div>
        
        <div class="form-group">
            <label id="college-label" for="college" class="required">College </label>
            <input id="college" type="text" name="college" required placeholder="college name">
            <span class="validity"></span>
        </div>

        <!-- DOB : -->
        <div class="form-group">
            <label id="number-label" for="dob" class="required">DOB </label>
            <input id="dob" type="date" name="dob" required>
            <span class="validity"></span>
        </div>

        <!-- gender  -->
        <div class="form-group">
            <label id="role-label" for="dropdown" class="required">Gender </label>
            <select id="dropdown" name="gender" required>
                <option value="" disabled selected>Select an option</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <!-- address -->
        <div class="form-group">
            <label id="textarea-label" for="comments" class="required">Current Address </label>
            <textarea id="comments" placeholder="address" name="address" cols="30" rows="5" required></textarea>
        </div>

        <!-- city -->
        <div class="form-group">
            <label id="name-label" for="city" class="required">City </label>
            <input id="city" type="text" name="city" required placeholder="city">
            <span class="validity"></span>
        </div>

        <!-- State -->
        <div class="form-group">
            <label id="name-label" for="state" class="required">State </label>
            <input id="state" type="text" name="state" required placeholder="state">
            <span class="validity"></span>
        </div>

        <!-- pin -->

        <div class="form-group">
            <label id="name-label" for="pin" class="required">PIN </label>
            <input id="pin" type="number" name="pin" min="100000" pattern="[0-9]{6}" required placeholder="6 digit area pin code">
            <span class="validity"></span>
        </div>

        <!-- whatsapp mobile number -->
        <div class="form-group">
            <label id="name-label" for="mobile" class="required">Mobile </label>
            <input id="mobile" type="number" name="mobile" min="6000000000" pattern="[0-9]{10}" required placeholder="add 10 digit WhatsApp Number only">
            <span class="validity"></span>
        </div>

        <!-- telegram -->
        <div class="form-group">
            <label id="name-label" for="telegram">Telegram&nbsp;&nbsp;</label>
            <input id="telegram" type="url" name="telegram" pattern="https://t.me/.*" placeholder="add Telegram Link">
            <span class="validity"></span>
        </div>

        <!-- instagram -->
        <div class="form-group">
            <label id="name-label" for="instagram">Instagram&nbsp;&nbsp;</label>
            <input id="instagram" type="url" name="instagram" pattern="https://www.instagram.com/.*" placeholder="add Instagram Link">
            <span class="validity"></span>
        </div>

        <!-- contribution -->

        <div class="form-group">
            <p>Initiatives I will contribute for</p>
            <div class="input-group">
                <label><input type="checkbox" name="contriMissionShiksha" value="Mission-Shiksha"> Mission Shiksha</label>
                <label><input type="checkbox" name="contriMentalHealth" value="Mental-Health"> Mental Health</label>
                <label><input type="checkbox" name="contriAnimalSafety" value="Animals-Safety"> Animals Safety</label>
                <label><input type="checkbox" name="contriArtandCraft" value="Art-&-Craft"> Art & Craft</label>
                <label><input type="checkbox" name="contriEnvironment" value="Environment"> Environment</label>
                <label><input type="checkbox" name="contriSexEducation" value="Sex-Education"> Sex Education</label>
            </div>
        </div>

        <div class="form-group">
            <p class="required">Type of Registration </p>
            <div class="input-group">
                <label for="yes"><input id="yes" type="radio" name="user-rating" value="yes" checked> Student Leadership Training Program (₹ 199/-)</label>
            </div>
        </div>

        <!-- Interests -->
        <div class="form-group">
            <p>Interests</p>
            <div class="input-group">
                <label><input type="checkbox" name="interestPublicRelation" value="Public-Relations"> Public Relations</label>
                <label><input type="checkbox" name="interestSpeakingandCommunication" value="Speaking-&-Communication"> Speaking & Communication</label>
                <label><input type="checkbox" name="interestOperations" value="Operations"> Operations</label>
                <label><input type="checkbox" name="interestSocialMediaManager" value="Social-Media-Manager"> Social Media Manager</label>
                <label><input type="checkbox" name="interestGraphicDesigner" value="Graphic-Designer"> Graphic Designer</label>
                <label><input type="checkbox" name="interestContentWriter" value="Content-Writer"> Content Writer</label>
                <label><input type="checkbox" name="interestAdminBodyManagement" value="Admin-Body-Management"> Admin Body Management</label>
                <label><input type="checkbox" name="interestLegalandFinance" value="Logal-&-Finance"> Legal & Finance</label>
            </div>
        </div>

        <!-- Do you want any of these-->
        <div class="form-group">
            <p>Do you want any of these&nbsp;&nbsp;</p>
            <div class="input-group">
                <label><input type="checkbox" name="addOnTShirt" value="TShirt"> TShirt (₹ 269/-)</label>
                <label><input type="checkbox" name="addOnCap" value="Cap"> Cap (₹ 79/-)</label>
                <label><input type="checkbox" name="addOnBadge" value="Badge"> Badge (₹ 19/-)</label>
                <label><input type="checkbox" name="addOnBag" value="Bag"> Bag (Not Available)</label>
            </div>
        </div>

        <!-- terms and condition -->
        <div class="form-group terms">
            <div class="input-group">
                <label><input type="checkbox" name="termsandconditions" value="events" checked required disabled> I agree to all the <a href="">Terms & Conditions</a> </label>
            </div>
        </div>
        <input type="hidden" name="userType" value="student">
        <input type="hidden" name="fee" value="199">
        <div class="form-group">
            <button id="rzp-button1" class="button" type="submit" name="studentSave">Save and Continue</button>
            </div>
    </form>
</body>
</html>