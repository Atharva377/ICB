<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)){
    header("Location: ./dashboard.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ../login.php");
  }

  // Fetching the request ID
  if(!isset($_GET['pid'])){
    header('Location: ./error.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/root-partner.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/bottomNav.css">
    <link rel="stylesheet" href="../css/components/company-details.css">
    <link rel="stylesheet" href="./css/product_page.css">
    <style>
      <?php include "./css/product_page.css"; ?>
    </style>
    <script src="../js/sliderAccordian.js" defer></script>
    <script src="../js/sideBar.js" defer></script>
    
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>
    <!-- Chars js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script src="js\product\slider.js" defer></script>
    <script src="js\product\fetchProductDetail.js" defer></script>
    <script src="js\product\salesReport.js" defer></script>
    <script src="js\product\popup_common.js" defer></script>
    <script src="js\product\about_edit.js" defer></script>
    <script src="js\product\features_edit.js" defer></script>
    <script src="js\product\additionalInfo_edit.js" defer></script>
    <script src="js\product\faq_edit.js" defer></script>
    <script src="js\product\price_edit.js" defer></script>

    <title><?php echo "Product Page"; ?> : I Care for Bharat</title>
</head>
<body>
    <!-- Header -->
  <?php
      include "./header.php";
  ?>

  <header>
    <?php 
      include "./components/company-details.php";
    ?>
  </header>

  <div class="popup_edit" id="edit_popup">
      <div class="popup_edit__background" id="popup_edit__background"></div>
      <div class="display_form">
        <div class="popup_close" id="popup_close"><i class="fa-solid fa-close"></i></div>
        <div class="form_display" id="form_display"></div>
      </div>
    </div>
  <main>
    

    
    <div class="product_tri" id="section_1">
      <h1 class="product_title sd" id="product_name">Web Development Service</h1>
      <div class="image_slider" id="product_image_slider">
        <div class="image_slider__photos_edit">
          <button class="product_details__container_btn btn_circle photos_edit_btn" id="photos_edit"><i class="fa-solid fa-edit"></i></button>
        </div>
      <section id="product_crousal" class="splide" aria-label="Product_image_preview">
        <div class="splide__track">
                <ul class="splide__list" id="splide__track" class="product_details__image_container__preview">
                    
                </ul>
        </div>
      </section>
      </div>
    </div>
    <div class="product_tri product_details" id="section_2">
      <!-- About -->
      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">About Product</h3>
          <button class="product_details__container_btn" id="about_edit"><i class="fa-solid fa-edit"></i> Edit</button>
        </div>
        <div class="product_details__container__details" id="description">
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </div>
      </div>

      <!-- Features -->
      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">Features</h3>
          <button class="product_details__container_btn" id="features_edit"><i class="fa-solid fa-edit"></i> Edit</button>
        </div>
        <div class="product_details__container__details">
          <ul id="features_list">
          </ul>

        </div>
      </div>

      <!-- Additional Information -->
      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">Additional Information</h3>
          <button class="product_details__container_btn" id="additionalInfo_edit"><i class="fa-solid fa-edit"></i> Edit</button>
        </div>
        <div class="product_details__container__details" id="additioanl_info">
        <!-- <div class="product_details__container__details_additional">
          <div class="product_details__container__details_additional_key">Company Name</div>
          <div class="product_details__container__details_additional_value">Mandet India Pvt Ltd.</div>
        </div>
        <div class="product_details__container__details_additional">
          <div class="product_details__container__details_additional_key">Company Name</div>
          <div class="product_details__container__details_additional_value">Mandet India Pvt Ltd.</div>
        </div>
        </div> -->
      </div>
      </div>



      <!-- FAQ -->
      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">FAQs</h3>
          <button class="product_details__container_btn" id="faq_edit"><i class="fa-solid fa-edit"></i> Edit</button>
        </div>
        <div class="product_details__container__details" id="faq">
          <!-- <div class="product_details__container__details__faq">
            <div class="product_details__container__details__faq__header">
              <div class="product_details__container__details__faq__question" id="faq_question_1">Q: Does the service has free maintenance service?</div>
              <button class="product_details__container__details__faq__btn" id="faq_btn_1">+</button>
            </div>
            <div class="product_details__container__details__faq__answer" id="faq_answer_1">We offer free maintenance service for the first six months. Post which you have to pay for making changes in the web.</div>
          </div> -->

        </div>
      </div>

    </div>

    </div>

    <!-- Section 3 -->
    <div class="product_tri" id="section_3">
      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">Price</h3>
          <button class="product_details__container_btn" id="edit_price"><i class="fa-solid fa-edit"></i> Edit</button>
        </div>
        <div class="product_details__container__details" id="price">
          <div class="product_details__container__details__price">
            <div class="product_details__container__details__price__title">MRP</div>
            <div class="product_details__container__details__price__value" id="mrp_value">6,000 /-</div>
          </div>
          <div class="product_details__container__details__price">
            <div class="product_details__container__details__price__title">ICB Price</div>
            <div class="product_details__container__details__price__value" id="price_value">4,000 /-</div>
          </div>
        </div>
      </div>

      <div class="product_details__container">
        <div class="product_details__container__header">
          <h3 class="product_details__container__title">Sales Report</h3>
          <!-- <button class="product_details__container_btn" id="edit_price"><i class="fa-solid fa-edit"></i> Edit</button> -->
        </div>
        <div class="product_details__container__details" id="price">
        <canvas id="salesReport"></canvas>
        </div>
      </div>
    </div>

  </main>
  <!-- Bottom Navbar -->
  <?php
    include "./bottomNav.php"
  ?>

  <script>
    
  </script>
</body>
</html>