<?php
    include "../../config.php";
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)){
    header("Location: ./dashboard.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ../login.php");
  }

  if(isset($_GET['pid']) && $_SESSION['id']){
    $pid = $mysqli->escape_string($_GET['pid']);

    $sql_check_user = "select count(*) from product where id=".$pid." and owner_id=".$_SESSION['id'].";";
    $result = $mysqli->query($sql_check_user) or die("Error in fetching data");

    if(mysqli_num_rows($result) > 0){
        $fetching_data_sql = "select p.id as id, p.name as name, p.owner_id owner_id, p.price price, p.mrp mrp, pd.description description, pd.features features, pd.photos_paths photos_paths,pd.additional_info additional_info, pd.faq faq, pd.rating rating from product p inner join product_details pd  on p.id=pd.id where p.id=".$pid.";";
        $data = mysqli_query($mysqli, $fetching_data_sql) or die("Error in fetching data");
        // $data = mysqli_fetch_array($data);
        include "./sql_to_json.php";
        $converter = new sqlToJson();
        $product_details = $converter->sql_to_json_json_embedded($data);
        echo $product_details;
    }else{
        echo "Invalid Request";
    }

  }else{
    echo "Invalid Request";
  }

?>