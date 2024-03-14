<?php
    include "../config.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"]) && $_POST["submit"]=="submit"){
        $additional_info_data = "{";
        $i = 0;
        // var_dump($_POST);
        while(isset($_POST["additional_key_".$i]) && isset($_POST["additional_value_".$i])){
            $additional_info_data.='"'.$mysqli->escape_string($_POST["additional_key_".$i]).'" : "'.$mysqli->escape_string($_POST["additional_value_".$i]).'",';
            $i++;
        }

        $additional_info_data = substr($additional_info_data,0,-1);
        $additional_info_data .= "}"; 

        // echo $additional_info_data;
        $id = $mysqli->real_escape_string($_POST["pid"]);

        $sql = "update product_details set additional_info = '".$additional_info_data."' where id = ".$id.";";
        // echo  $sql;
        $result = mysqli_query($mysqli, $sql) or die("Error in updating");
        header("Location: ../../product.php?pid=".$id);
    }else{
        $_SESSION["message"] = "Error in request made";
        header("Location: ../../error.php");
    }

?>