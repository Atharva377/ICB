<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)){
    header("Location: ./dashboard.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ../login.php");
  }

//   $sql = "select "

?>

