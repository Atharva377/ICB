<?php
    include "../config.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Getting the hash values
    $order_id = $mysqli->escape_string($_POST['ordId']);
    $assocaiate_id = $_SESSION['id'];
    $cust_id = $mysqli->escape_string($_POST['customer_id']);
    $quantity = $mysqli->escape_string($_POST['quantity']);
    $customer_name = $mysqli->escape_string($_POST['customer_name']);
    $whatsapp = $mysqli->escape_string($_POST['whatsapp']);
    $email = $mysqli->escape_string($_POST['email']);
    $state = $mysqli->escape_string($_POST['state']);
    $city = $mysqli->escape_string($_POST['city']);
    // $cust_whatasapp= $mysqli->escape_string($_POST['cust_whatasapp']);
    $address = $mysqli->escape_string($_POST['address']);
    $pin = $mysqli->escape_string($_POST['pin']);

    // Getting hashed value from the database.
    $getting_hash = "select order_hash from order_table where order_id = ".$order_id." and associate_id= ".$assocaiate_id.";";
    $result = mysqli_query($mysqli, $getting_hash) or die("Error to fetch order id");
    // // Store in the hash_id
    $hash_id = ($result -> fetch_assoc())['order_hash'];
    
    // // Format of hash message (int) order_id and (int) associate_id 
    $order_hash_message = "".(int)$order_id."".(int)$assocaiate_id."";
    
    // // Verifying the details
    if(password_verify($order_hash_message, $hash_id)){
    //     // $sql_fetch_order = "SELECT product.id, product.name product_name, order_table.quantity, customer.name customer_name, customer.whatsapp, customer.email, customer.state, customer.city, customer.address, customer.pin FROM order_table inner join customer on order_table.customer_id = customer.id inner join product on order_table.product_id=product.id where order_table.order_id = ".$order_id." and order_table.associate_id = ".$assocaiate_id."; ";
    //     // $result_fetch_order = mysqli_query($mysqli, $sql_fetch_order) or die("Error in fecthing details");
    //     // $fetched_order = $result_fetch_order -> fetch_assoc();
    //     // echo '{"id":"'.$fetched_order["id"].'", "product_name": "'.$fetched_order["product_name"].'", "quantity": "'.$fetched_order["quantity"].'", "customer_name": "'.$fetched_order["customer_name"].'", "whatsapp": "'.$fetched_order["whatsapp"].'" , "email": "'.$fetched_order["email"].'", "state": "'.$fetched_order["state"].'", "city":"'.$fetched_order["city"].'", "address":"'.$fetched_order["address"].'", "pin":"'.$fetched_order["pin"].'"}';
        $sql_fetch_price = "select price from product where id = (select product_id from order_table where order_id=".$order_id.");";
        $result_price = mysqli_query($mysqli, $sql_fetch_price);
        $price = ($result_price -> fetch_assoc())["price"];
        $sql_order_table_update = "update order_table set quantity=".$quantity." , 	total_price = ".($quantity*$price)." where order_id=".$order_id.";";
        $result_update = mysqli_query($mysqli, $sql_order_table_update);

        $sql_customer_update = "update customer set 	name='".$customer_name."' ,email ='".$email."', address='".$address."',city='".$city."', state='".$state."', pin='".$pin."', whatsapp=".$whatsapp."  where id=".$cust_id.";";
        // echo $sql_customer_update;
        $result_update = mysqli_query($mysqli, $sql_customer_update);
        mysqli_close($mysqli);
        header("Location: ../salesCRM.php");
    }else{
        echo "Error in request made";
        mysqli_close($mysqli);
    }

?>