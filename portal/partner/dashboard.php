<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)){
    header("Location: ./dashboard.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ./login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/bottomNav.css">
    <link rel="stylesheet" href="../css/components/company-details.css">
    <link rel="stylesheet" href="../css/components/product_card.css">
    <link rel="stylesheet" href="../css/partner-dashboard.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../js/sliderAccordian.js" defer></script>
    <script src="../js/sideBar.js" defer></script>

    <style>
    <?php 
      include "../css/partner-dashboard.css";
    ?>
    </style>
    <title>Dashboard: I Care for Bharat</title>
</head>
<body>
    <!-- Header -->
<?php
    include "./header.php";
?>

<main>
    <!-- Company logo section -->
    <?php 
    include "./components/company-details.php";
    ?>

    <div class="main_dashboard">
        <div class="main_dashboard_sub" id="main_dashboard__charts">
            <div class="main_dashboard_sub__title">Charts</div>
            <div class="main_dashboard_sub__display">
                <div class="main_dashboard_sub__display__stats" id="revenue">
                    <i class="fa-solid fa-indian-rupee-sign main_dashboard_sub__display__stats__image"></i>
                    <!-- <img src="" alt="" class="main_dashboard_sub__display__stats__image"> -->
                    <div class="main_dashboard_sub__display__stats__value" id="revenue__value">20L+</div>
                    <div class="main_dashboard_sub__display__stats__title">Revenue</div>
                </div>
                <div class="main_dashboard_sub__display__stats" id="associate">
                    <i class="fa-solid fa-user main_dashboard_sub__display__stats__image"></i>
                    <!-- <img src="" alt="" class="main_dashboard_sub__display__stats__image"> -->
                    <div class="main_dashboard_sub__display__stats__value" id="associate__value">21+</div>
                    <div class="main_dashboard_sub__display__stats__title">Associates</div>
                </div>
                <div class="main_dashboard_sub__display__stats" id="clients">
                    <i class="fa-solid fa-users main_dashboard_sub__display__stats__image"></i>
                    <!-- <img src="" alt="" class="main_dashboard_sub__display__stats__image"> -->
                    <div class="main_dashboard_sub__display__stats__value" id="clients__value">120+</div>
                    <div class="main_dashboard_sub__display__stats__title">Clients</div>
                </div>
                <div class="main_dashboard_sub__display__stats" id="services">
                    <i class="fa-solid fa-box main_dashboard_sub__display__stats__image"></i>
                    <!-- <img src="" alt="" class="main_dashboard_sub__display__stats__image"> -->
                    <div class="main_dashboard_sub__display__stats__value" id="services__value">250+</div>
                    <div class="main_dashboard_sub__display__stats__title">Services</div>
                </div>
            </div>
        </div>
        <div class="main_dashboard_sub" id="main_dashboard__sales">
            <div class="main_dashboard_sub__title">Product Sales Chart</div>
            <div class="main_dashboard_sub__display">
            <canvas id="mySales"></canvas>

            </div>
        </div>
        <div class="main_dashboard_sub" id="main_dashboard__orders">
            <div class="main_dashboard_sub__title">Orders</div>
            <div class="main_dashboard_sub__display">
                <i class="fa-solid fa-box main_dashboard_sub__display__order__image"></i>
                <div class="main_dashboard_sub__display__order__value">21+</div>
                <div class="main_dashboard_sub__display__order__order_list">Orders This Month <i class="fa-solid fa-circle-arrow-right"></i></div>
            </div>
        </div>
    </div>

    <div class="main_dashboard">
      <div class="main_dashboard_sub" id="order-recieved">
        <div class="main_dashboard_sub__title">Orders Received</div>
        <div class="main_dashboard_sub__display">
            <div class="main_dashboard_sub__display__table">
              <div class="main_dashboard_sub__display__table__header main_dashboard_sub__display__table__design">
                <div class="tr">
                  <div class="th col-1">Client Name</div>
                  <div class="th col-2">Service</div>
                  <div class="th col-3"></div>
                </div>
              </div>

              <div class="main_dashboard_sub__display__table__content">
                  <?php
                    for($i=0;$i<=20;$i++){
                      echo "
                      <div class='tr'>
                        <div class='td col-1'>Client Name</div>
                        <div class='td col-2'>Porduct Name ".$i."</div>
                        <div class='td col-3'>
                          <div class='order_details' id='order_id".$i."'>Details  
                          <i class='fa-solid fa-circle-arrow-right color-neon-600'></i>
                          </div>            
                        </div>
                      </div>
                      ";
                    }
                  ?>
              </div>
              <div class="main_dashboard_sub__display__table__total main_dashboard_sub__display__table__design">
                <div class="tr">
                  <div class="th col-1">Total</div>
                  <div class="th col-2">20</div>
                  <div class="th col-3"></div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="main_dashboard_sub" id="product-catlog">
        <div class="main_dashboard_sub__title">My Product Catalog </div>
        <div class="main_dashboard_sub__display" id="my_product_catalog">
        <!-- <div class="main_dashboard_sub__display"> -->
            <div class="main_dashboard_sub__display__stats my_products_product" id="product_101">
              <span class="product_rating" id="p_101">4.0</span>  
              <img src="../images/pexels-alex-andrews-821651.jpg" alt="Product Image" class="product_image">
              <div class="my_products_product__title">Product Name</div>
            </div>
            <div class="main_dashboard_sub__display__stats my_products_product" id="product_101">
              <span class="product_rating" id="p_101">4.0</span>  
              <img src="../images/pexels-alex-andrews-821651.jpg" alt="Product Image" class="product_image">
              <div class="my_products_product__title">Product_Name</div>
            </div>
            <!-- <div class="main_dashboard_sub__display__stats my_products_product" id="product_101">
              <span class="product_rating" id="p_101">4.0</span>  
              <img src="../images/pexels-alex-andrews-821651.jpg" alt="Product Image" class="product_image">
              <div class="my_products_product__title">Product_Name</div>
            </div> -->
            <a href="./addproduct.php">
            <div class="main_dashboard_sub__display__stats my_products_product" id="products_view_more">
                <div class="my_products_product__more">Add New Product</div>
                <i class="fa-solid fa-plus my_products_product__more__arrow"></i>
            </div>
          </a>
          <a href="./myproducts.php">
            <div class="main_dashboard_sub__display__stats my_products_product" id="products_view_more">
              <div class="my_products_product__more">View More</div>
              <i class="fa-solid fa-circle-arrow-right my_products_product__more__arrow"></i>
            </div>
          </a>

        <!-- </div> -->
        </div>
      </div>

      <div class="main_dashboard_sub" id="query">
        <div class="main_dashboard_sub__title"></div>
        <div class="main_dashboard_sub__display" id="query_display">
            <div class="main_dashboard_sub__display__text">Got a Query</div>
            <!-- <div class="main_dashboard_sub__display__question_mark"></div> -->
            <i class="fa-solid fa-question main_dashboard_sub__display__order__image" style="color: #ffffff;" id="question-mark"></i>
            <a href="#"><div class="main_dashboard_sub__display__text" id="get_in_touch">Get in touch <i class="fa-solid fa-circle-arrow-right"></i></div></a>
        </div>
      </div>
    </div>
</main>
    

    <?php
        include "./bottomNav.php"
    ?>
    <script>
  const ctx = document.getElementById('mySales');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Sales in 2023',
        data: [12, 19, 33, 15, 21, 30, 32, 33, 40, 20],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: false
        }
      }
    }
  });
</script>
</body>
</html>