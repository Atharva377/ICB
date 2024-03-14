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
  <title>Associate Dashboard-Care for Bharath</title>
  <link rel="stylesheet" href="./css/donate.css" />
  <link rel="stylesheet" href="./css/header.css" />
  <link rel="stylesheet" href="./css/utils.css" />
  <link rel="stylesheet" href="./css/dashboard.css" />
  <link rel="stylesheet" href="./css/search.css">
  <!-- <link rel="stylesheet" href="./css/index.css" /> -->
  <!-- <link rel="stylesheet" href="./css/global.css" /> -->
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="./css/servicecard.css" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/css/splide.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>


  <style>
    <?php include "./css/header.css" ?><?php include "./css/search.css" ?><?php include "./css/servicecard.css" ?>
  </style>
  <link rel="stylesheet" href="./css/bottomNav.css">
<script src="./js/sideBar.js" defer></script>
  <script src="./js/sliderAccordian.js" defer></script>
  <script src="./js/sideBar.js" defer></script>
  <script src="./js/servicecard1.js" defer></script>
  <script src="./js/swiper-bundle.min.js" defer></script>

</head>

<body>
  <!-- Navigation Bar -->
  <?php
  include './header.php';
  ?><br>
  <div class="welcome">
    <div class="welcome-background"></div>
    <!-- <div class="welcome-strip"></div> -->
    <div class="white-strip">
      <div class="important-message">
        <span class="message-text"><span>Important message goes here.....Important message goes here.....Important
            message goes here.....Important message goes here.....Important message goes here.....Important message
            goes here.....Important message goes here.....Important message goes here.....Important message goes
            here.....
      </div>
    </div>
    <!-- <div class="profile-icon">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
          
        </svg>
      </div> -->

    <div class="dashboard-text">Dashboard</div>
    <div class="profile-container">
      <div class="profile-img">
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="81" viewBox="0 0 80 81" fill="none">
          <path
            d="M78.8892 40.5C78.8892 62.6009 61.3318 80.5 39.6946 80.5C18.0574 80.5 0.5 62.6009 0.5 40.5C0.5 18.3991 18.0574 0.5 39.6946 0.5C61.3318 0.5 78.8892 18.3991 78.8892 40.5Z"
            fill="#464646" stroke="#2196F3" />
        </svg>
      </div>
    </div>
    <div class="welcome-text">Welcome to ICB</div><br><span class="uid-text">UID: 16426790</span>
    <hr class="stright-line">



    <div class="welcome-container">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"></a>
    </div>
    <div class="cards-container">
      <div class="card card-left">
        <div class="card-content">
          <div><b class="card-title">Total Sells<img class="welcome-icon" src="images/undefined2.png" alt="Icon"
                width="30" height="30"></b></div>
          <div class="card-icon">

            <b class="card-text">₹ 1500</b>
          </div>

          <a href="#" class="card-link" target="_blank"></a>
        </div>
      </div>
      <div class="card card-center">
        <div class="card-content">
          <div><b class="card-title">Total Earning<img class="welcome-icon" src="images/undefined2.png" alt="Icon"
                width="30" height="30"></b></div>
          <div class="card-icon">
            <b class="card-text">₹ 1500</b>
          </div>

          <a href="#" class="card-link" target="_blank"></a>
        </div>
      </div>
      <div class="card card-right">
        <div class="card-content">
          <div class="card-content-container">
            <div class="card-title">My Network<img class="welcome-icon" src="images/undefined3.png" alt="Icon"
                width="30" height="30"></b></div>
            <div class="card-text"><b>#40</b></div>
            <!-- <div class="card-icon"> -->
          </div>
          <a href="#" class="card-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>

  <?php {
    include "./components/searchBar.php";
  }
  ?>


  <br><br><br> <!--required breaks dont remove -->
  <!-- strt -->
  <br>
  <!-- Refer A FREIEND BAR -->
  <div class="cta-container">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="button-container">
            <div class="custom-button green-button">
              <a href="discover-more.php">Refer a Friend</a>
            </div>
            <div class="custom-button blue-button">
              <a href="enquire-now.php">Add to my Network</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main-container1-a">My Products</div>
  <div class="main-container1 slide-container">
    <div class="swipper-button-group">

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="slide-content">
      <div class="swiper-wrapper">
        <div class="product-outer swiper-slide swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>
            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
        <div class="product-outer swiper-slide">
          <div class="product-component swiper-slide">
            <div class="card-image">
              <img src="images/undefined6.png" alt="" class="card-img" />
            </div>

            <div class="card-content">
              <h2 class="name">SMART WATCH</h2>
              <button class="button" id="button1"><b>PITCH PRODUCT</b></button>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="swiper-pagination"></div> -->
    </div>
  </div>
  <br>
  <!-- SECOND SLIDE OF  PRODUCTS CARDS -->
  <!--div class="main-container1 slide-container">
    <div class=" swiper mySwiper2">
      <div class="swiper-wrapper">
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>
          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
        <div class="product-component swiper-slide">
          <div class="card-image">
            <img src="images/undefined6.png" alt="" class="card-img" />
          </div>

          <div class="card-content">
            <h2 class="name">SMART WATCH</h2>
            <button class="button" id="button2"><b>PITCH PRODUCT</b></button>
          </div>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- <div class="swiper-pagination"></div> -->
  </div>
  </div>







  <br>
  <!-- IMAGE SLIDER DONT MOVE THE DIVS -->
  <b class="main-container-4a">Recommended</b>
  <div class="main-container4 recommended-section">
    <div class="left-container">
      <div class="splide recommended-splide-instance">
        <div class="splide__track">
          <ul class="splide__list">
            <li class="splide__slide">
              <img src="images/Mountain.jpg" alt="Image 1">
              <div class="description">
                <b>Recommended</b>
                <p>This is the description of the recommended product.</p>
              </div>
            </li>
            <li class="splide__slide">
              <img src="images/Mountain.jpg " alt="Image 2">
              <div class="description">
                <b>Recommended</b>
                <p>This is the description of the recommended product.</p>
              </div>
            </li>
            <!-- Add more slides with images and descriptions here as needed -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!--DONT REMOVE THIS BELOW DIV -->
  <div class="my-slider-progress">
    <div class="my-slider-progress-bar"></div>
  </div>

  <!-- testimonial start HTML Structure -->
  <div class="main-container3"><b class="main-container3-a" >Success Story</b>
    <div class="Testimonial">
      <div class="splide testimonial-splide-instance">
        <div class="testimonial splide__track">
          <ul class="testimonial splide__list">
            <li class="splide__slide">
              <div class="testimonial-card">
                <div class="white-slash"></div>
                <div class="testimony">
                  <img src="images/undefined11.png" alt="Image" class="testimonial-image" />
                  <div class="testimonial-content">
                    <h3 class="testimonial-name">Prashant Singh</h3>
                    <p class="testimonial-description">
                      The testimonial text goes here. Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit.The testimonial text goes here. Lorem
                      ipsum dolor sit amet.
                    </p>
                    <div class="testimonial-card:after"><b class="Profit-text">Profit: 1 Lakh</b></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="splide__slide">
              <div class="testimonial-card" id="even">
                <!-- <div class="white-slash-odd"></div> -->
                <div class="testimony">
                  <img src="images/undefined11.png" alt="Image" class="testimonial-image" />
                  <div class="testimonial-content">
                    <h3 class="testimonial-name">Prashant Singh</h3>
                    <p class="testimonial-description">
                      The testimonial text goes here. Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit.The testimonial text goes here.
                    </p>
                    <div class="testimonial-card:after"><b class="Profit-text2">Profit: 1 Lakh</b></div>
                  </div>
                </div>
              </div>
            </li>
            <!-- Add more testimonial slides following the same structure -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <br><br>


  <?php include "./components/bottomNav.php";?>
  <!-- ALL THE SCRIPTS START -->
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="./js/servicecard1.js"></script>
  <script src="./js/Testimonial.js"></script>
  <script src="./js/swiper-bundle.min.js"></script>

  <!-- testimonial script -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var splide = new Splide('.testimonial-splide-instance', {
        type: 'loop',
        perPage: 2, // Set the number of cards to show
        breakpoints: {
          768: {
            perPage: 1, // Adjust the number of cards on smaller screens if needed
          },
        },
      });

      splide.mount();
    });
  </script>

  <!-- image slider -->
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.1.9/dist/js/splide.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var splide = new Splide('.splide', {
        type: 'loop', // Enable loop mode
        perPage: 1, // Display one slide at a time
        autoplay: true, // Enable automatic sliding
        interval: 3000, // Set the interval to 5 seconds
        speed: 2000, // Adjust the speed for smoother transitions (milliseconds)
      });

      var bar = document.querySelector('.my-slider-progress-bar');

      splide.on('mounted move', function () {
        var end = splide.Components.Controller.getEnd() + 1;
        var rate = Math.min((splide.index + 1) / end, 1);
        bar.style.width = String(100 * rate) + '%';
      });

      splide.mount();
    });
  </script>
  
</body>

</html>
