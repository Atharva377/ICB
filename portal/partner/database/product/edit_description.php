<?php
    include "../config.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"]) && $_POST["submit"]=="description"){
        $description = $mysqli->real_escape_string($_POST["description"]);
        $id = $mysqli->real_escape_string($_POST["pid"]);

        $sql = 'update product_details set description = "'.$description.'" where id = '.$id.';';
        $result = mysqli_query($mysqli, $sql) or die("Error in updating");
        header("Location: ../../product.php?pid=".$id);
    }else{
        $_SESSION["message"] = "Error in request made";
        header("Location: ../../error.php");
    }

?>