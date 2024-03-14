<?php

    $keyId = 'rzp_test_13G2isdzTpKXkK';
    $keySecret = '7NnSu0AIlRNFcodK20JLKyVn';
    $displayCurrency = 'INR';
    
    //These should be commented out in production
    // This is for error reporting
    // Add it to config.php to report any errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    /* Database connection settings */
    $host = 'localhost';
    $user = 'u272159814_bs_portal';
    $pass = '6R!rNvqU6Zqw#Zcc';
    $db = 'u272159814_careforbharat';
    $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);