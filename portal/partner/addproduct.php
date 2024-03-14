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
    <link rel="stylesheet" href="../css/components/status_bar.css">
    <link rel="stylesheet" href="../css/components/add_btn.css">
    <link rel="stylesheet" href="../css/components/next_btn.css">
    <link rel="stylesheet" href="../css/newProduct.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>
    <script src="../js/sliderAccordian.js" defer></script>
    <script src="../js/sideBar.js" defer></script>
    <script src="./js/addProduct/add-images.js" defer></script>
    <script src="./js/addProduct/section_traverse.js" defer></script>
    <script src="./js/addProduct/splider-slider.js" defer></script>
    <script src="./js/addProduct/data-save.js" defer></script>
    <script src="./js/addProduct/addInputs.js" defer></script>
    <script src="./js/addProduct/reloadData.js" defer></script>
    <title>Add Product</title>
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

    <main>
        <div class="new_product_panel">
            <?php include "./components/status_bar.php" ?>

            <div class="product_details">
                <form action="./database/addProduct.php" method="post"  enctype="multipart/form-data">
                <div class="product_details_sections" id="section_1">
                    <div class="product_details__image_container">
                        <div class="product_details__image_container__preview">
                        <section id="image_carousel" class="splide" aria-label="Product_image_preview">
                            <div class="splide__track">
                                    <ul class="splide__list" class="product_details__image_container__preview">
                                        <!-- <li class="splide__slide">
                                            <img src="../images/arduino 2.jpg" alt="">
                                        </li>
                                        <li class="splide__slide">
                                            <img src="../images/arduino 2.jpg" alt="">
                                        </li>
                                        <li class="splide__slide">
                                            <img src="../images/arduino 2.jpg" alt="">
                                        </li> -->
                                    </ul>
                            </div>
                        </section>
                        </div>
                        
                    </div>
                    <button type="button" class="product_images__btn" id="product_images__btn">+</button>
                        <input type="file" id="product_images" name="file[]" style="visibility:hidden" multiple>
                        <div class="product_images__info">Add Product Image</div>
                    </div>
                <div class="product_details_sections" id="secion-2">
                    <div class="product_details__parts" id="part1">
                        <div class="product_details__parts__title">New Product</div>
                        <div class="product_details__parts__input_fields">
                            <!-- Input Product Name -->
                            <label for="product_name" class="input_field_box">
                                <i class="fa-solid fa-box"></i>
                                <input type="text" class="input_field_80" name="product_name" placeholder="Product Name" required>
                            </label>
                            <!-- Keywords -->
                            <label for="keywords" class="input_field_box">
                                <i class="fa-solid fa-hashtag"></i>
                                <input type="text" class="input_field_80" name="keywords" placeholder="Keywords" required>
                            </label>

                            <!-- Keywords -->
                            <label for="category" class="input_field_box">
                                <i class="fa-solid fa-hashtag"></i>
                                <input type="text" class="input_field_80" name="category" placeholder="Category" required>
                            </label>
                        </div>

                        <div class="product_details__parts__title">Price</div>
                        <div class="product_details__parts__input_fields">
                            <!-- MRP -->
                            <label for="MRP" class="input_field_box">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <input type="text" class="input_field_80" name="mrp" placeholder="MRP" required>
                            </label>
                            <!-- Keywords -->
                            <label for="keywords" class="input_field_box">
                                <i class="fa-solid fa-indian-rupee-sign"></i>
                                <input type="text" class="input_field_80" name="icb_price" placeholder="ICB Price" required>
                            </label>

                        </div>


                        <!-- Description -->
                        <div class="product_details__parts__title">Details</div>
                        <div class="product_details__parts__title_sub">Description</div>
                        <div class="product_details__parts__input_fields product_details__parts__input_full">
                            <!-- Description -->
                            <label for="description" class="input_field_box input_field_box-90">
                                <i class="fa-solid fa-pen-clip"></i>
                                <input type="text" class="input_field_80 input_field_h10" name="description" placeholder="Describe about your product ..." required>
                            </label>    
                        </div>

                        <div class="product_details__parts__title_sub">Features</div>
                        <div class="product_details__parts__input_fields product_details__parts__input_full" id="features_div">
                            <!-- Features -->
                            <label for="features" class="input_field_box input_field_box-90 features">
                                <i class="fa-solid fa-circle-dot"></i>
                                <input type="text" class="input_field_80" name="feature_1" placeholder="Describe about your product ..." id="feature_1" required>
                            </label>
                            <!-- <label for="features" class="input_field_box input_field_box-90">
                                <i class="fa-solid fa-circle-dot"></i>
                                <input type="text" class="input_field_80" name="description" placeholder="Describe about your product ..." required>
                            </label> -->
                            
                            
                        </div>
                        <?php
                            $id="feature_add";
                             include "components/add_btn.php" ?>

                        <!-- Additional Specifications -->
                        <div class="product_details__parts__title_sub">Additional Specification</div>
                        <div class="product_details__parts__input_fields product_details__parts__input_full additional_spec_div">
                            <!-- Additional Specifications -->
                            <label for="additonal_spec_1" class="input_field_box input_field_box-90 additional_spec">
                                <input type="text" class="input_field_60" name="additional_spec_key_1" placeholder="Key" required>
                                <input type="text" class="input_field_80" name="additional_spec_value_1" placeholder="Value" required>
                            </label>
                            
                            <!-- <label for="features" class="input_field_box input_field_box-90">
                                <input type="text" class="input_field_60" name="feature_2_key" placeholder="Key">
                                <input type="text" class="input_field_80" name="feature_2_value" placeholder="Value">
                            </label> -->
                            
                        </div>
                        <?php $id="additional_spec_add"; 
                        include "components/add_btn.php" ?>

                        <!-- FAQ -->
                        <div class="product_details__parts__title_sub">FAQ</div>
                        <div class="product_details__parts__input_fields product_details__parts__input_full faq_div">
                            <!-- Additional Specifications -->
                            <label for="faq_1" class="input_field_box input_field_box-90 faq">
                                <input type="text" class="input_field_60" name="faq_1_key" placeholder="Question" required>
                                <input type="text" class="input_field_80" name="faq_1_value" placeholder="Answer" required>
                            </label>
                            
                            <!-- <label for="features" class="input_field_box input_field_box-90">
                                <input type="text" class="input_field_60" name="faq_2_key" placeholder="Key">
                                <input type="text" class="input_field_80" name="faq_2_value" placeholder="Value">
                            </label> -->
                            
                        </div>
                        <?php 
                        $id="faq_add"; 
                        include "components/add_btn.php" ?>

                        <!-- Form next section -->
                        <div class="add_products_btns">
                            <?php
                            $message = "Back";
                            $icon = "circle-chevron-left";
                            $btn_features="blue-btn";
                            $is_disabled = "disabled";
                            $btn_id = "back_1";
                            include "./components/next_btn.php";

                            $message = "Next";
                            $icon = "circle-chevron-right";
                            $btn_features="";
                            $is_disabled = "";
                            $btn_id = "next_1";
                            $btn_type = "submit";
                            include "./components/next_btn.php";

                            ?>
                        </div>
                    </div>

                    <!-- Part 2 of add products details collection -->
                    <div class="product_details__parts" id="part2">
                        <!-- Customer Default details -->
                        <div class="product_details__parts__title">Tick the information required about the client purchasing the product.</div>
                        <div class="product_details__parts__title_sub">Customer Details</div>
                        <div class="product_details__parts__input_fields">
                            <!-- Input Customer Name -->
                            <label  for="customer_name" class="input_field_box">
                                <input name="customer_name" type="checkbox" tool-tip="Tick the box if you want customer name. Always" checked readonly=true>
                                <i class="fa-solid fa-user"></i>
                                <input type="text" class="input_field_80" tool-tip="The name field isn't editable by you." placeholder="Customer Name" disabled >
                            </label>
                            <!-- Phone -->
                            <label for="phone" class="input_field_box">
                            <input name="customer_phone" for="phone" type="checkbox" tool-tip="Tick the box if you want customer name. Always" checked readonly=true>

                                <i class="fa-solid fa-phone"></i>
                                <input type="text" class="input_field_80" placeholder="Phone">
                            </label>

                            <!-- Email -->
                            <label name="" for="quantity" class="input_field_box">
                                <input for="email" name="email" type="checkbox" tool-tip="Tick the box if you want customer name. Always" checked readonly=true>

                                <i class="fa-solid fa-envelope"></i>
                                <input type="text" class="input_field_80" placeholder="Email">
                            </label>

                            <!-- Email -->
                            <label name="" for="quantity" class="input_field_box">
                                <input name="order_quantity" for="order_quantity" type="checkbox" tool-tip="Tick the box if you want customer name. Always" checked readonly=true>

                                <i class="fa-solid fa-boxes-stacked"></i>
                                <input type="text" class="input_field_80" placeholder="Quantity">
                            </label>
                        </div>

                        <!-- Optional Parameters -->
                        <div class="product_details__parts__title_sub">Optional Parameters</div>
                        <div class="product_details__parts__input_fields">
                            <!-- Input Customer Name -->
                            <label  for="pan_card" class="input_field_box">
                                <input name="pan_card" type="checkbox" tool-tip="Tick the option if you want customers Pan card details.">
                                <i class="fa-solid fa-address-card"></i>
                                <input type="text" class="input_field_80" tool-tip="The name field isn't editable by you." placeholder="Pan card" disabled >
                            </label>
                            <!-- Phone -->
                            <label for="aadhar_card" class="input_field_box">
                            <input name="aadhar_card" for="aadhar_card" type="checkbox" tool-tip="Tick the option if you want customers Aadhard card details.">

                                <i class="fa-solid fa-address-card"></i>
                                <input type="text" class="input_field_80" placeholder="Aadhar">
                            </label>

                        </div>

                        <!-- Addtional Details -->
                        <div class="product_details__parts__title_sub">Additional Data required</div>
                        <div class="product_details__parts__input_fields product_details__parts__input_full data_req_div">
                            <!-- Additional Specifications -->
                            <!-- <label for="features" class="input_field_box input_field_box-90 data_req">
                                <input type="text" class="input_field_60" name="faq_1_key" placeholder="Key" required>
                                <input type="text" class="input_field_80" name="faq_1_value" placeholder="Value" required>
                            </label>
                            
                            <label for="features" class="input_field_box input_field_box-90 data_req">
                                <input type="text" class="input_field_60" name="faq_2_key" placeholder="Key">
                                <input type="text" class="input_field_80" name="faq_2_value" placeholder="Value">
                            </label> -->

                        </div>
                            <?php
                            $id = "data_req_add"; 
                            include "components/add_btn.php" ?>

                        <!-- Form next section -->
                        <div class="add_products_btns">
                            <?php
                            $message = "Back";
                            $icon = "circle-chevron-left";
                            $btn_features="blue_btn";
                            $is_disabled = "";
                            $btn_id = "back_2";
                            include "./components/next_btn.php";

                            $message = "Next";
                            $icon = "circle-chevron-right";
                            $btn_features="";
                            $is_disabled = "";
                            $btn_id = "next_2";
                            include "./components/next_btn.php";

                            ?>
                        </div>
                    </div>
                    <div class="product_details__parts" id="part3">
                        <div class="product_details_summary">
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_name_title">Product Name:</div>
                                <div class="product_details_td td2" id="summary_p_name_value summary_product_name">Sample Name</div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_details_title">Keywords</div>
                                <div class="product_details_td td2" id="summary_p_details_value">#sample word</div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_category_title">Category</div>
                                <div class="product_details_td td2" id="summary_p_category_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_mrp_title">MRP</div>
                                <div class="product_details_td td2" id="summary_p_mrp_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_icb_price_title">ICB Price</div>
                                <div class="product_details_td td2" id="summary_p_icb_price_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_description_title">Description</div>
                                <div class="product_details_td td2" id="summary_p_description_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_features_title">Features</div>
                                <div class="product_details_td td2" id="summary_p_features_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_addtionalspecification_title">Additional Specification</div>
                                <div class="product_details_td td2" id="summary_p_addtionalspecification_value"></div>
                            </div>
                            <div class="product_details_tr">
                                <div class="product_details_td td1" id="summary_p_faq_title">FAQ</div>
                                <div class="product_details_td td2" id="summary_p_faq_value"></div>
                            </div>
                        </div>
                        <!-- <input type="submit" name="add-product" value="Add Product">  -->
                        <!-- Form save data -->
                        <div class="add_products_btns">
                            <?php
                            $message = "Back";
                            $icon = "circle-chevron-left";
                            $btn_features="blue_btn";
                            $is_disabled = "";
                            $btn_id = "back_3";
                            include "./components/next_btn.php";

                            $message = "Save";
                            $icon = "circle-chevron-right";
                            $btn_features="";
                            $is_disabled = "";
                            $btn_id = "save";
                            $btn_type = "submit";
                            include "./components/next_btn.php";

                            ?>
                    </div>
                </div>
                </form>
                </div>
        </div>
    </main>

    <!-- Bottom Navbar -->
    <?php
    include "./bottomNav.php"
?>
</body>
</html>