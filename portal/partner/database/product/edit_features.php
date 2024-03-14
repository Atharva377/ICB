<?php
    include "../config.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"]) && $_POST["submit"]=="submit"){
        $features = "{";
        $i = 1;
        var_dump($_POST);
        while(isset($_POST["feature_".$i])){
            $features.='"'.$i.'" : "'.$mysqli->escape_string($_POST["feature_".$i]).'",';
            $i++;
        }

        $features = substr($features,0,-1);
        $features .= "}"; 

        $id = $mysqli->real_escape_string($_POST["pid"]);

        $sql = "update product_details set features = '".$features."' where id = ".$id.";";
        // echo  $sql;
        $result = mysqli_query($mysqli, $sql) or die("Error in updating");
        header("Location: ../../product.php?pid=".$id);
    }else{
        $_SESSION["message"] = "Error in request made";
        header("Location: ../../error.php");
    }

?>