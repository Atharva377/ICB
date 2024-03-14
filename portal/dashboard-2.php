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
  $searchOn = ''
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Learn: Care For Bharat</title>
    <link rel="stylesheet" href="./css/donate.css" />
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/utils.css">
    <style>
        <?php include "./css/header.css" ?>
        <?php include "./css/search.css" ?>
        <?php include "./css/course_card.css" ?>
        <?php include "./css/dashboard-2.css" ?>
        <?php include "./css/product_card.css" ?>
        <?php include "./css/course_slider.css" ?>
        <?php include "./css/testimonials.css" ?>
    </style>
    <link rel="stylesheet" href="./css/bottomNav.css">
<script src="./js/sideBar.js" defer></script>
    <script src="./js/sliderAccordian.js" defer></script>
    <script src="./js/sideBar.js" defer></script>
    <script src="./js/dashboard.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>
    <script src="./js/product_details_product_slider.js" defer></script>
</head>
  <body>
    <!-- Navigation Bar -->
    <?php
      include './header.php';
    ?>

    <section class="dashboard">
 <!-- Top part of dashboard -->
       <div class="dashboard__top">
            <div class="dashboard__top__layers">
                <div class="dashboard__top__layers__title">
                    <div class="dashboard__top__layers__title__dashboard">Dashboard</div>
                    <div class="dashboard__top__layers__title__user"><span class="dashboard__top__layers__title__user__message">Welcome&nbsp;to&nbsp;ICB,</span> <span class="dashboard__top__layers__title__user__id">UID: <?php echo $_SESSION['id'];?></span></div>
                </div>
                <div class="dashboard__top__layers__user_profile">
                    <img src="<?php echo $_SESSION['profile'];?>" style=<?php echo '"border: solid '.$_SESSION["profile_border"].' 2px;"'?> alt="user_profile_picture" class="dashboard__top__layers__user_profile__image">
                    <?php echo "<img class='check dashboard__top__layers__user_profile__check" . $display . "' src='" . $checkSrc . "' alt=''>"; ?>
                    <!-- <img src="" alt="user_profile_logo" class="check dashboard__top__layers__user_profile__check"></img> -->
                </div>
            </div>
            <div class="dashboard__top__layers">
                <div class="dashboard__top__layers__info">
                    <div class="dashboard__top__layers__info__icon">
                        <img src="./images/discount.png" alt="Total Sales" class="dashboard__top__layers__info__icon__image">
                    </div>
                    <span class="dashboard__top__layers__info__title">Total Sales</span>
                    <span class="dashboard__top__layers__info__earning">₹
                        <span class="dashboard__top__layers__info__earning__sales" id="dashboard_total_sales">
                            10,000.54<!-- Fetch real time value from backend -->
                        </span>
                    </span>
                </div>
                <div class="dashboard__top__layers__info">
                <div class="dashboard__top__layers__info__icon">
                        <img src="./images/rupee.png" alt="Total Sales" class="dashboard__top__layers__info__icon__image">
                </div>
                <span class="dashboard__top__layers__info__title">Total Earning</span>
                    <span class="dashboard__top__layers__info__earning">₹
                        <span class="dashboard__top__layers__info__earning__sales" id="dashboard_total_earning">
                        1,600.20 <!--fecth real time data -->
                        </span>
                    </span>
                </div>
                <div class="dashboard__top__layers__info">
                <div class="dashboard__top__layers__info__icon">
                    <img src="./images/people.png" alt="Total Sales" class="dashboard__top__layers__info__icon__image">
                </div>
                    <div class="dashboard__top__layers__info__btn">
                        <div class="dashboard__top__layers__info__btn__message">My Network</div>
                        <div id="dashboard__top__layers__info__btn__downline_count">2</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom part of dashboard -->
        <div class="dashboard__bottom">
        <!-- Search components included -->
            <?php include "./components/searchBar.php" ?>
            <div class="dashboard__bottom__referals">
                <div class="dashboard__bottom__referals__btn">Refer a Friend</div>
                <div class="dashboard__bottom__referals__btn">Add to Network</div>
            </div>
        </div>
    </section>

    <!-- My Products -->
        <section class="display_courses">
        <div class="myproducts__title">
            My Products
        </div>
            <div class="display_courses__slider">
                <div class='slider_btn slider_prev' id="myproducts_prev"><img src='./images/next-btn.png' alt='slider_before' /></div>
                <div class="display_courses__slider__course_display" id="myproducts_display">
                <div class="display_courses__slider__course" id="myproducts_slider">
                    <?php for($i=0;$i<9;$i++){ 
                        if($i%2 != 0){
                        $image_url = "./images/undefined6.png";
                        }else{
                        $image_url = "./images/pexels-alex-andrews-821651.jpg";
                        }
                        $course_action = "Pitch Product";
                        $course_card_class_name = "myproducts_card";
                        // $course_card_id = 
                        ?>
                    <?php include "./components/product_card.php"?>
                    <?php }; ?>
                </div>
                </div>
                <div class='slider_btn' id="myproducts_next"><img src='./images/next-btn.png' alt='slider_before' /></div>
            </div>
            </section>


            <!-- My Business Training -->
        <section class="display_courses">
        <div class="mybusinesstraining__title">
        My Business Training
        </div>
            <div class="display_courses__slider">
                <div class='slider_btn slider_prev' id="mybusinesstraining_prev"><img src='./images/next-btn.png' alt='slider_before' /></div>
                <div class="display_courses__slider__course_display" id="mybusinesstraining_display">
                <div class="display_courses__slider__course" id="mybusinesstraining_slider">
                    <?php for($i=0;$i<9;$i++){ 
                        $course_action=="Manage";
                        if($i%2 != 0){
                        $image_url = "./images/undefined6.png";
                        }else{
                        $image_url = "./images/pexels-alex-andrews-821651.jpg";
                        }
                        // $course_action = "Pitch Product";
                        $course_card_class_name = "mybusinesstraining_card";
                        // $course_card_id = 
                        ?>
                    <?php include "./components/product_card.php"?>
                    <?php }; ?>
                </div>
                </div>
                <div class='slider_btn' id="mybusinesstraining_next"><img src='./images/next-btn.png' alt='slider_before' /></div>
            </div>
            </section>

            <!-- Slider -->
<!-- 
            <div class="bannerslider">
                <div class="banner__display">
                    <div class="banner__slider">
                        <div class="banner__slide">
                            <img src="https://source.unsplash.com/random/1200x500" alt="Unsplash random image" class="banner__image">
                            <div class="message left-center">
                                <div class="message__title">Random title</div>
                                <div class="message__message">This is a rondom message</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="bannerslider">
            <section class="splide splide_banner" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="banner__slide">
                                    <img src="https://source.unsplash.com/random/1200x500" alt="Unsplash random image" class="banner__image">
                                    <div class="message left-center">
                                        <div class="message__title">Random title</div>
                                        <div class="message__message">This is a rondom message</div>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="splide__slide">
                            <div class="banner__slide">
                                    <img src="https://source.unsplash.com/random/1210x500" alt="Unsplash random image" class="banner__image">
                                    <div class="message left-center">
                                        <div class="message__title">Random title</div>
                                        <div class="message__message">This is a rondom message</div>
                                    </div>
                                </div>
                            </li>

                            <li class="splide__slide">
                            <div class="banner__slide">
                                    <img src="https://source.unsplash.com/random/1230x500" alt="Unsplash random image" class="banner__image">
                                    <div class="message left-center">
                                        <div class="message__title">Random title</div>
                                        <div class="message__message">This is a rondom message</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                </div>
            </section>
            </div>

        <section class="testimonials">
            <div class="testimonials_title">Success Story</div>

            <section class="splide splide__testimonials" aria-label="Testimonials of our services">
                <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>
                            <li class="splide__slide">
                                <?php 
                                    include "./components/testimonials.php";
                                ?>
                            </li>
                            <li class="splide__slide">
                                <?php 
                                include "./components/testimonials.php";
                                ?>
                            </li>

                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>

                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>


                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>

                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>


                            <li class="splide__slide">
                            <?php 
                                include "./components/testimonials.php";
                            ?>
                            </li>
                        </ul>
                </div>
            </section>
        </section>

<?php include "./components/bottomNav.php";?>
  </body>
</html>
