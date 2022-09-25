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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CareforBharat</title>
    <link rel="stylesheet" href="./css/donate.css" />
    <!-- <link rel="stylesheet" href="./css/main.css" /> -->
    <link rel="stylesheet" href="./css/header.css" />
    <link rel="stylesheet" href="./css/utils.css">
  </head>
  <body>
    <!-- Navigation Bar -->
    <?php
      include './header.php';
    ?>
    <script src="./js/sideBar.js"></script>

    <!-- donate page  -->
    <p class="heading">Donate</p>
    <div class="container">
      <a href="https://rzp.io/l/bO34YmdFS" target="_blank">
        <div class="first-donate">
          <div class="align1">
            <div class="donate">
              <h2>Donate</h2>
            </div>
            <div class="d-donate">
              <h3>without 80G</h3>
            </div>
          </div>
        </div>
      </a>
      <a href="https://rzp.io/l/oaTOLRiB" target="_blank">
        <div class="second-donate">
          <div class="align2">
            <div class="donate">
              <h2>Donate</h2>
            </div>
            <div class="d-donate">
              <h3>with 80G</h3>
            </div>
          </div>
        </div>
      </a>
    </div>
  </body>
</html>