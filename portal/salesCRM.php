<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
    header("Location: ./index.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ../index.html");
  }

  $searchOn = '';

  $productList = '';
  $_SESSION['message'] = "Current";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="widdiv=device-widdiv, initial-scale=1.0" />
    <title>Sales CRM: Care For Bharat</title>
    <link rel="stylesheet" href="./css/donate.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/utils.css">
    <link rel="stylesheet" href="./css/salesCRM.css">
    <style>
        <?php include "./css/header.css" ?>
        <?php include "./css/search.css" ?>
        <?php include "./css/salesCRM.css" ?>  
        <?php include "./css/notification.css" ?>
    </style>
    <link rel="stylesheet" href="./css/bottomNav.css">
<!-- <script src="./js/sideBar.js" defer></script> -->
    <?php 
      echo "<script>localStorage.setItem('id', ".$_SESSION['id'].");</script>";
    ?>
    <script src="./js/sliderAccordian.js" defer></script>
    <script src="./js/sideBar.js" defer></script>
    <script src="./js/salesCRM.js" defer></script>
    <script src="./js/searchBar.js" defer></script>
    <script src="./js/notification.js" defer></script>
    
</head>
  <body>
    <!-- Navigation Bar -->
    <?php
      include './header.php';
    ?>
    <?php
      include './components/searchBar.php';
    ?>

<!-- Edit Details Form -->
<div id="edit-form-details" class="make-sticky">
  <img src="https://cdn-icons-png.flaticon.com/128/463/463612.png" alt="close" id="edit_form_close" class="close_add-details"/>

          <form method="post" action="database/updateDetailsProspectusOrder.php" id="order_edit_form" class="order_edit_form">
            <div class="edit_order_details">
              <h2>Edit Order Details</h2>
              <div class="edit_order_area">
                <div class="edit_order_area__image">
                  <img src="" alt="Product Image" id="edit_image"/>
                </div>
                <div class="edit_order_area__details">
                <div id="edit_order_area__details__product_id"><span>Product Id:</span><div id="edit_order_area__details__product_id__details"></div></div>
                <div id="edit_order_area__details__product_name">Temp ProductNmae</div>
                <div id="edit_order_area__details__product_qty"><input type="number" id="edit_order_area__details__product_qty__product_qty" for="quantity" name="quantity" max="10" min="1" value="1" placeholder="Quantity" class="input_details"></div>
                </div>
              </div>
            </div>
            <div class="edit_customer_details">
            <h4>Edit Customer Details</h4>
            <div class="edit_customer_details">
              <input name="customer_name" for="customer_name" id="edit_customer_details__customer_name" class="input_details_50" value="Temp" placeholder="Customer Name" minlength="2" required /> 
              <input name="whatsapp" for="whatsapp" id="edit_customer_details__whatsapp" class="input_details_50" value="9876543212" placeholder="Phone Number" min="1000000000" max="9999999999" required /> 
              <input name="email" for="email" id="edit_customer_details__email" class="input_details" value="abc@gmail.com" placeholder="Email" required /> 
              <input name="state" for="state" id="edit_customer_details__state" class="input_details_50" value="" placeholder="State" required /> 
              <input name="city" for="city" id="edit_customer_details__city" class="input_details_50" value="" placeholder="City" required /> 
              <input name="address" for="address" id="edit_customer_details__address" type="textarea" class="input_details" value="" placeholder="Address" required /> 
              <input name="pin" for="pin" id="edit_customer_details__pin" class="input_details_50" value="" placeholder="Pin Code" min="100000" max="999999" required /> 
            </div>
            </div>
            <input type="number" name="ordId" id="ordId" value="" required/>
            <input type="number" name="customer_id" id="customer_id" value="" required/>
            <input type="submit" class="form_btn" value="Update" id="edit_update_btn"/>
          </form>
        </div>

        <!-- Show details -->

        <div id="show-form-details" class="make-sticky">
  <img src="https://cdn-icons-png.flaticon.com/128/463/463612.png" alt="close" id="show_form_close" class="close_add-details"/>

          <!-- <form method="post" action="database/updateDetailsProspectusOrder.php" id="order_edit_form" class="order_edit_form"> -->
            <div class="edit_order_details">
              <h4>Order Details</h4>
              <div class="edit_order_area"><
                <div class="edit_order_area__image">
                  <img src="" alt="Product Image" id="details_image"/>
                </div>
                <div class="edit_order_area__details">
                <div id="show_order_area__details__product_id">Product Id:<div id="show_order_area__details__product_id__details"></div></div>
                <div id="show_order_area__details__product_name">Temp ProductNmae</div>
                <div id="show_order_area__details__product_qty"><div id="show_order_area__details__product_qty__product_qty" class="input_details"></div>
                </div>
              </div>
            </div>
            <div class="edit_customer_details">
            <h4>show Customer Details</h4>
            <div class="edit_customer_details">
              <div id="show_customer_details__customer_name" class="data_details_50"> </div>
              <div id="show_customer_details__whatsapp" class="data_details_50"></div> 
              <div id="show_customer_details__email" class="data_details"> </div>
              <div id="show_customer_details__state" class="data_details_50"> </div>
              <div id="show_customer_details__city" class="data_details_50"> </div>
              <div id="show_customer_details__address" class="data_details"> </div>
              <div id="show_customer_details__pin" class="data_details_50"> </div>
            </div>
            </div>
          <!-- </form> -->
        </div>
        </div>

        <!-- Add new details -->
<div class="add-details">
  <h2 class="add-details__title">New Entry</h2>
  <img src="https://cdn-icons-png.flaticon.com/128/463/463612.png" alt="close" id="close_add-details" class="close_add-details"/>
  <div id="content"></div>
          <form action="database/addCustomer.php" method="post">
          <label for="product_id" class="form_label"><div>Product ID:</div> 
              <select name="product_id" id="product_id" class="form-input" required>
              </select>
            </label>
            <label for="product_name" class="form_label"><div>Product Name: </div>
              <select name="product_name" id="product_name" class="form-input" required>

              </select></label>
            <label class="form_label" for="product_qty"><div>Quantity: </div><input for="product_qty"  class="form-input" name="product_qty" placeholder="1,2,..." required/></label>
            <!-- <label for="product_name">Customer ID: <input for="customer_id" name="customer_id"/></label> -->
            <label class="form_label" for="product_cust_name"><div>Customer Name: </div><input class="form-input" for="customer_name" name="product_cust_name" required/></label>
            <label class="form_label" for="cust_email"><div>Email: </div><input class="form-input" for="product_name" name="cust_email" required/></label>
            <label class="form_label" for="cust_whatasapp"><div>Whatsapp Number: </div><input class="form-input" for="cust_whatasapp" name="cust_whatasapp" required /></label>
            <label class="form_label" for="cust_address"><div>Address: </div><input class="form-input" for="cust_address" name="cust_address" required/></label>
            <label class="form_label" for="cust_city"><div>City: </div><input class="form-input" for="cust_city" name="cust_city" required/></label>
            <label class="form_label" for="cust_state"><div>State: </div><input class="form-input" for="cust_state" name="cust_state" required/></label>
            <label class="form_label" for="cust_pin"><div>Pin: </div><input class="form-input" for="cust_pin" name="cust_pin" required/></label>
            <label for="status" class="form_label"><div>Status:</div> 
              <select name="status" id="status" class="form-input" required>
                <option value="1">Pitching</option> //Pitching: 1
                <option value="2">Closed</option> // Closed: 2
                <option value="0">Cancelled</option> // Canclled: 0
              </select>
            </label>
            <input type="submit">
          </form>
        </div>

    <div class="sales">
      <div class="sales-tab">
        <div class="sale-tab active-option" id="sale-tab-1">Prospectus</div>
        <div class="sale-tab" id="sale-tab-2">Sold</div>
      </div>
      <div class="sales-table" id="table-1">
      <div class="tr" id="prospectus_table_header">
            <div class="th prospectus_product_name">Product Name</div>
            <div class="th prospectus_qty">Quantity</div>
            <div class="th prospectus_cust_id">Cust ID</div>
            <div class="th prospectus_cust_name">Customer Name</div>
            <div class="th prospectus_phone">Phone Number</div>
            <div class="th prospectus_email" id="prospectus_email">Email</div>
            <div class="th prospectus_status" id="prospectus_status">Status</div>
            <div class="th prospectus_options">More</div>
          </div>
        <div class="table" id="prospectus">
        <!-- <table> -->
          
          
        <!-- </table> -->

      </div>
      <button class="add_new" title="Add new entry"><img src="./images/add.png" class="add" alt="Add new details"/></button>

      </div>
      <div class="sales-table table-hide" id="table-2">
      <div class="tr" id="sold_table">
            <div class="th sold_check_column">&nbsp;&nbsp;&nbsp;</div>
            <div class="th sold_product_name">Product Name</div>
            <div class="th sold_quantity">Quantity</div>
            <div class="th sold_customer_id">Customer ID</div>
            <div class="th sold_customer_details">Customer Details</div>
            <div class="th sold_total_price">Total Price</div>
            <div class="th sold_pay">Pay</div>
            <div class="th sold_status">Status</div>
          </div>
      <div class="table" id="sold">
      
        <form method="post" action="#">
          
          <div id="sold_table_data"></div>


      </div>
</form>
    </div>

</div>
  <div class="total-amount" id="total_amount">
            <div>Grand Total:</div>
            <div id="payment-amount">
              <?php
                $totalPay = "20370";
                echo "₹".$totalPay."/-";
                ?>
            </div>
            <form action="post" action="#"><input type="submit" class="form_btn" value="Pay" name="total_pay"></form>
      </div>
    <h1 id="response"></h1>

    <?php include "./components/notification.php";?>
    <?php include "./components/bottomNav.php";?>
  </body>
  <script defer>
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let ids = "";
        let names = "";
        let products = JSON.parse(this.responseText);
        for(const key in products){
          ids+=`<option value='${key}'>${key}</option>`;
          names+=`<option value='${products[key]}'>${products[key]}</option>`;
        }
        document.getElementById("product_id").innerHTML = ids;
        document.getElementById("product_name").innerHTML = names;
      }
    };
    xmlhttp.open("GET",`database/getProductList.php`,true);
    xmlhttp.send();
  </script>

  <script defer>
  </script>
   
</html>
