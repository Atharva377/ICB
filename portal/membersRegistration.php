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
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Registration</title>
    <link rel="stylesheet" href="./css/membersRegistration.css">
</head>

<body>
    <h1 id="title">Members Registration</h1>
    <form id="survey-form" action="./database/addUser.php" onsubmit="return validate()" method="POST">
        <div class="form-group">
            <label id="name-label" for="name" class="required">First Name </label>
            <input id="name" type="text" name="firstName" required placeholder="first name">
            <span class="validity"></span>
        </div>
        <div class="form-group">
            <label id="name-label" for="name" class="required">Last Name </label>
            <input id="name" type="text" name="lastName" required placeholder="last name">
            <span class="validity"></span>
        </div>

        <div class="form-group">
            <label id="email-label" for="email" class="required">Email </label>
            <input id="email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required placeholder="email">
            <span class="validity"></span>
        </div>

        <!-- DOB : -->
        <div class="form-group">
            <label id="number-label" for="number" class="required">DOB </label>
            <input type="date" name="dob" id="dob" required>
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
        <div class="form-group" class="required">
            <label id="textarea-label" for="comments" class="required">Current Address </label>
            <textarea id="comments" placeholder="address" cols="30" rows="5" name="address" required></textarea>
        </div>

        <!-- city -->
        <div class="form-group">
            <label id="name-label" for="name" class="required">City </label>
            <input id="name" type="text" name="city" required placeholder="city">
            <span class="validity"></span>
        </div>

        <!-- State -->
        <div class="form-group">
            <label id="name-label" for="name" class="required">State </label>
            <input id="name" type="text" name="state" required placeholder="state">
            <span class="validity"></span>
        </div>

        <!-- pin -->

        <div class="form-group">
            <label id="name-label" for="name" class="required">PIN </label>
            <input id="name" type="number" name="pin" min="100000" pattern="[0-9]{6}" required placeholder="6 digit area pin code">
            <span class="validity"></span>
        </div>

        <!-- whatsapp mobile number -->
        <div class="form-group">
            <label id="name-label" for="name" class="required">Mobile </label>
            <input id="name" type="number" name="mobile" min="6000000000" pattern="[0-9]{10}" required placeholder="add 10 digit WhatsApp Number only">
            <span class="validity"></span>
        </div>

        <!-- telegram -->
        <div class="form-group">
            <label id="name-label" for="name">Telegram Username&nbsp;&nbsp;</label>
            <input id="name" type="text" name="telegram" placeholder="add Telegram Username without @">
            <span class="validity"></span>
        </div>

        <!-- instagram -->
        <div class="form-group">
            <label id="name-label" for="name">Instagram Username&nbsp;&nbsp;</label>
            <input id="name" type="text" name="instagram" placeholder="add Instagram Username without @">
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
            <p class="required">Type of Registration</p>
            <div class="input-group">
                <label for="yes"><input id="yes" type="radio" name="user-rating" value="yes" required checked> Member (₹ 0/-)</label>
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

        <!-- aadhaar card number -->
        <div class="form-group">
            <label id="name-label" for="name" class="required">Aadhaar Card </label>
            <input id="name" type="number" name="aadhaar" required placeholder="12 digit aadhaar number">
            <span class="validity"></span>
        </div>

        <!-- pan card number -->
        <div class="form-group">
            <label id="name-label" for="name" class="required">PAN </label>
            <input id="name" type="text" name="pan" required placeholder="pan card number {format: AJCHB7489N}">
            <span class="validity"></span>
        </div>

        <!-- terms and condition -->
        <div class="form-group terms">
            <div class="input-group">
                <label class="required"><input type="checkbox" name="termsandconditions" value="events" required checked disabled> I agree to all the <a href="">Terms & Conditions</a> </label>
            </div>
        </div>
        <input type="hidden" name="userType" value="member">
        <input type="hidden" name="fee" value="499">
        <div class="form-group">
            <button id="rzp-button1" class="button" type="submit" name="memberSave">Save and Continue</button>
            </div>
    </form>
</body>
<script>
    function validate(){
        var curryear = new Date().getFullYear();
        var userdob = document.getElementById('dob').value;
        var birthyear = userdob.split('-')[0];
        var age = curryear - birthyear;
        var errMsg = "";
        if(age < 18){
            errMsg = errMsg + "User should be at least 18 years old";
        }
        if(errMsg !== ""){
            alert(errMsg);
            return false;
        }
        return true;
    }
</script>
</html>