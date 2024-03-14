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


    include "../../config.php";

    $sql = "select id, name, productImg from product where owner_id=".$_SESSION["id"].";";
    $result = mysqli_query($mysqli, $sql) or die("error in fetching data");
    
    include "../../sql_to_json.php";
    $converter = new sqlToJson();
    $converter->sql_to_json($result);
?>