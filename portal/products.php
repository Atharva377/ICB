<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)) {
  header("Location: ./index.php");
}
if (!isset($_SESSION['type'])) {
  header("Location: ../index.html");
}
$searchOn = ''
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products Catalog: Care For Bharat</title>
  <link rel="stylesheet" href="./css/header.css" />
  <link rel="stylesheet" href="./css/product.css" />
  <link rel="stylesheet" href="./css/utils.css">
  <style>
    <?php include "./css/header.css" ?>
    <?php include "./css/search.css" ?>
    <?php include "./css/product.css" ?>
    <?php include "./css/productcard.css" ?>
  </style>
  <link rel="stylesheet" href="./css/bottomNav.css">
  <script src="./js/product_catalog.js" defer></script>
  <script src="./js/sideBar.js" defer></script>
  <script src="./js/searchBar.js" defer></script>  
  <script src="./js/sliderAccordian.js" defer></script>
  <script src="./js/sideBar.js" defer></script>
  <!-- <script src="./js/product_catalog.js" defer></script> -->
</head>

<body>
  <!-- Navigation Bar -->
  <?php
  include './header.php';
  ?>

<!-- Product Search Bar -->
  <div class="ProductSearch">
    <div class="ProductSearch__search_bar">
      <?php {
        include "./components/searchBar.php";
      }
      ?>
    </div>
    <!-- Relevance button -->
    <div class="ProductSearch__options">
      <img src="./images/sort.png" alt="Relevance Button" class="ProductSearch__options__icon" id="ProductSearch__options__icon__relevance">
      <div class="ProductSearch__options__relevance" id="ProductSearch__options__relevance">
        <div class="sort_options" id="relevance_sort_a_price">Sort By Price ↑</div>
        <div class="sort_options sort_options__active" id="relevance_sort_d_price">Sort By Price ↓</div>
        <div class="sort_options" id="relevance_sort_a_popularity">Sort By Popularity ↑</div>
        <div class="sort_options" id="relevance_sort_d_popularity">Sort By Popularity ↓</div>
        <div class="sort_options" id="relevance_sort_a_arrival">Sort By Arrival ↑</div>
        <div class="sort_options" id="relevance_sort_d_arrival">Sort By Arrival ↓</div>
      </div>
    </div>
    
    <!-- Filter button -->
    <div class="ProductSearch__options"><img src="./images/filter.png" alt="Filter Button" class="ProductSearch__options__icon">
  
    </div>
  </div>



  <div class="main-catalog">
        <div class="product-catalog">
            <div class="scroll-container">
                <!-- <?php
                for ($i = 0; $i < 16; $i++) {
                    include "./components/productcard_products.php";
                    if (($i + 1) % 3 === 0) {
                        // echo '<div class="clearfix"></div>';
                    }
                }
                ?> -->
                <!-- <div class="loading">↺</div> -->
            </div>
        </div>
    </div>
    <?php include "./components/bottomNav.php";?>
</body>

</html>