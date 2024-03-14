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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/bottomNav.css">
    <link rel="stylesheet" href="../css/components/company-details.css">
    <!-- <link rel="stylesheet" href="../css/partner-dashboard.css" > -->
    <link rel="stylesheet" href="../css/partner_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../js/sliderAccordian.js" defer></script>
    <script src="../js/sideBar.js" defer></script>

    <style>
    <?php 
      include "../css/partner_profile.css";
    ?>
    </style>
    <title>Profile: <?php echo "Company Name"; ?></title>
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

    <!-- Main Dashboard 1 -->
    <div class="main_dashboard">
        <div class="main_dashboard_sub" id="main_dashboard__details">
            <div class="main_dashboard_sub__details main_dashboard_sub__display">
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">Name:</div>
                    <div class="main_dashboard_sub__detail__value">Mandet India Pvt Ltd.</div>
                </div>
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">Organization: </div>
                    <div class="main_dashboard_sub__detail__value">Bond Socailly</div>
                </div>
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">Owner:</div>
                    <div class="main_dashboard_sub__detail__value">Mandeep Dalavi</div>
                </div>
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">Sector:</div>
                    <div class="main_dashboard_sub__detail__value">IT</div>
                </div>
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">TAN:</div>
                    <div class="main_dashboard_sub__detail__value">TMFB10029M</div>
                </div>
                <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title">PAN:</div>
                    <div class="main_dashboard_sub__detail__value">TMFSA00029M</div>
                </div>
                <!-- <div class="main_dashboard_sub__detail">
                    <div class="main_dashboard_sub__detail__title"></div>
                    <div class="main_dashboard_sub__detail__value"></div>
                </div> -->
            </div>
        </div>
        <div class="main_dashboard_sub" id="main_dashboard__sales">
            <div class="main_dashboard_sub__title">Growth with Us</div>
            <div class="main_dashboard_sub__display">
            <canvas id="mySales"></canvas>

            </div>
        </div>
        <div class="main_dashboard_sub" id="main_dashboard__charts">
        <div class="main_dashboard_sub__title"> </div>
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
    </div>

    <!-- Main Dashboard 2 -->
    <div class="main_dashboard" id="main_dashboard_2">
        <div class="main_dashboard_sub" id="main_company_contact">
            <div class="main_dashboard_sub__display main_dashboard_sub__display__height">
                <div class="main_dashboard_sub__display__title">Company Admin Contact</div>
                <!-- <div class="main_dashboard_sub__display__details__container"> -->
                
                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="main_dashboard_sub__display__details__info">mandet@gmail.com</div>
                </div>

                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="main_dashboard_sub__display__details__info">9898231729</div>
                </div>

                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-brands fa-whatsapp"></i></div>
                    <div class="main_dashboard_sub__display__details__info">Mandet India Pvt Ltd. POC</div>
                </div>
            <!-- </div> -->
            </div>
        </div>

        <div class="main_dashboard_sub" id="main_customer_contact">
            <div class="main_dashboard_sub__display main_dashboard_sub__display__height">
            <div class="main_dashboard_sub__display__title">Customer Contact</div>
            <!-- <div class="main_dashboard_sub__display__details__container"> -->
                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="main_dashboard_sub__display__details__info">+9889 235 212  / +9889 235 212</div>
                </div>

                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-solid fa-globe"></i></div>
                    <div class="main_dashboard_sub__display__details__info">mandetindia.com</div>
                </div>

                <div class="main_dashboard_sub__display__details">
                    <div class="main_dashboard_sub__display__details__icon"><i class="fa-solid fa-envelope"></i> </div>
                    <div class="main_dashboard_sub__display__details__info">mandetindia@gmail.com</div>
                </div>
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