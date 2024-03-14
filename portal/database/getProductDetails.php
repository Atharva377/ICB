<?php 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  include "../config.php";
  
  $product_id = $mysqli->escape_string($_GET['product_id']);

  $sql = "select * FROM getproductdetails where product_id=".$product_id.";";
//   echo $sql;
  $result = mysqli_query($mysqli, $sql) or die("Couldn't fet Data");
//   $result = $result->fetch_assoc();
  
  include "../sql_to_json.php";
  $converter = new sqlToJson();
  $converter->sql_to_json_json_embedded($result);
?>