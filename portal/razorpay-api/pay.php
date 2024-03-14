<?php

require('config.php');
require('razorpay-php/Razorpay.php');

session_start();

$_SESSION['newUserFirstName'] = $mysqli->escape_string($_POST['firstName']);
$_SESSION['newUserLastName'] = $mysqli->escape_string($_POST['lastName']);
$_SESSION['newUsername'] = $_POST['firstName'].$_POST['lastName'];
$_SESSION['newUserFullName'] = $_POST['firstName']." ".$_POST['lastName'];
$_SESSION['newUserEmail'] = $mysqli->escape_string($_POST['email']);
$_SESSION['newUserDOB'] = date('Y-m-d', strtotime($_POST['dob']));
$_SESSION['newUserGender'] = $mysqli->escape_string($_POST['gender']);
$_SESSION['newUserAddress'] = $mysqli->escape_string($_POST['address']);
$_SESSION['newUserCity'] = $mysqli->escape_string($_POST['city']);
$_SESSION['newUserState'] = $mysqli->escape_string($_POST['state']);
$_SESSION['newUserPIN'] = $mysqli->escape_string($_POST['pin']);
$_SESSION['newUserMobile'] = $mysqli->escape_string($_POST['mobile']);
$_SESSION['newUserTelegram'] = $_POST['telegram'];
$_SESSION['newUserInstagram'] = $_POST['instagram'];
$_SESSION['newUserAadhaar'] = $mysqli->escape_string($_POST['aadhaar']);
$_SESSION['newUserPAN'] = $mysqli->escape_string($_POST['pan']);
$_SESSION['newUserType'] = $mysqli->escape_string($_POST['userType']);
$_SESSION['newUserInitiatives'] = "";
$_SESSION['newUserFee'] = $mysqli->escape_string($_POST['fee']);

if(isset($_POST['studentSave'])){
    if(isset($_POST['addOnTShirt'])){
        $_SESSION['newUserFee'] += 269;
    }
    if(isset($_POST['addOnCap'])){
        $_SESSION['newUserFee'] += 79;
    }
    if(isset($_POST['addOnBadge'])){
        $_SESSION['newUserFee'] += 19;
    }
    if(isset($_POST['addOnBag'])){
        $_SESSION['newUserFee'] += 0;
    }
    if(isset($_POST['contriMissionShiksha'])){
        $_SESSION['newUserInitiatives'] = $_SESSION['newUserInitiatives']."MissionShiksha;";
    }
    if(isset($_POST['contriMentalHealth'])){
        $_SESSION['newUserInitiatives'] = $_SESSION['newUserInitiatives']."MentalHealth;";
    }
    if(isset($_POST['contriAnimalSafety'])){
        $_SESSION['newUserInitiatives'] = $_SESSION['newUserInitiatives']."AnimalSafety;";
    }
    if(isset($_POST['contriEnvironment'])){
        $_SESSION['newUserInitiatives'] = $_SESSION['newUserInitiatives']."Environment;";
    }
    if(isset($_POST['contriSexEducation'])){
        $_SESSION['newUserInitiatives'] = $_SESSION['newUserInitiatives']."SexEducation;";
    }
}

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

// razorpay orders using orders API
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => $_SESSION['newUserFee'] * 100, // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

$data = [
    "key"                   => $keyId,
    "amount"                => $amount,
    "name"                  => "CareforBharat",
    "description"           => "by Bondsocially Foundation",
    "image"                 => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
    "prefill"               => [
        "name"              => $_SESSION['newUserFullName'],
        "email"             => $_SESSION['newUserEmail'],
        "contact"           => $_SESSION['newUserMobile'],
    ],
    "notes"                 => [
        "address"           => $_SESSION['newUserAddress'],
        "merchant_order_id" => "GmvV8mAVJt3y82",
    ],
    "theme"                 => [
        "color"             => "#1e40a0"
    ],
    "order_id"              => $razorpayOrderId,
];

if ($displayCurrency !== 'INR') {
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout.php")

?>