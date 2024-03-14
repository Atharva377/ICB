<?php
    include "../config.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
    //     header("Location: ./index.php");
    //   }
    // if (!isset($_SESSION['type'])){
    //     header("Location: ../index.html");
    // }

    $id = $_SESSION['id'];
    if($id!=null){
        $queryGetProducts = "select * from associate where id = '".$id."'";
        $result = mysqli_query($mysqli, $queryGetProducts) or die ("SQL Failed");
        $products = $result->fetch_assoc();
        echo $products['pitching_products'];
    }
    mysqli_close($mysqli);
?>