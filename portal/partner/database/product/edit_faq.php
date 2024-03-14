<?php
    include "../config.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"]) && $_POST["submit"]=="submit"){
        $faq_data = "{";
        $i = 1;
        // var_dump($_POST);
        while(isset($_POST["question".$i]) && isset($_POST["answer".$i])){
            $faq_data.='"question'.$i.'" : "'.$mysqli->escape_string($_POST["question".$i]).'",';
            $faq_data.='"answer'.$i.'" : "'.$mysqli->escape_string($_POST["answer".$i]).'",';            
            $i++;
        }

        $faq_data = substr($faq_data,0,-1);
        $faq_data .= "}"; 

        // echo $additional_info_data;
        $id = $mysqli->real_escape_string($_POST["pid"]);

        $sql = "update product_details set faq = '".$faq_data."' where id = ".$id.";";
        // echo  $sql;
        $result = mysqli_query($mysqli, $sql) or die("Error in updating");
        header("Location: ../../product.php?pid=".$id);
    }else{
        $_SESSION["message"] = "Error in request made";
        header("Location: ../../error.php");
    }

?>