<?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
            header("Location: ./index.php");
        }
        if (!(isset($_SESSION['type']) && ($_SESSION['type']=='employees' || $_SESSION['type']=='admin' || $_SESSION['type']=='superadmin'))){
            header("Location: ./index.php");
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="../assets/favicon/site.webmanifest">
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/coreTeam.css">
        <link rel="stylesheet" href="./css/utils.css">
        <style>
            <?php include "./css/header.css" ?>
        </style>
        <link rel="stylesheet" href="./css/bottomNav.css">
        <script src="./js/sideBar.js" defer></script>
        <script src="./js/sliderAccordian.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <title>Employee Documents</title>
        <link rel="stylesheet" href="./css/emp.css">
        <style>
            .coming {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font-size: 2em;
                font-weight: 600;
            }
            .accordion {
                background-color: #eee;
                color: #444;
                cursor: pointer;
                padding: 18px;
                width: 100%;
                text-align: left;
                border: none;
                outline: none;
                transition: 0.4s;
            }
            .active, .accordion:hover {
                background-color: #ccc;
            }
            .panel {
                padding: 0 18px;
                background-color: #e5e5e5;
                max-height: 0;
                overflow: hidden;
                /* display: none; */
                transition: max-height 0.2s ease-out;
            }
            .innerPanel{
                display:flex;
                align-items: center;
                justify-content: center;
                gap: 20px;
                padding: 10px 0;
            }
            .accordion:after {
                content: '\02795'; /* Unicode character for "plus" sign (+) */
                font-size: 13px;
                color: #777;
                float: right;
                margin-left: 5px;
            }
                .active:after {
                content: "\2796"; /* Unicode character for "minus" sign (-) */
            }
        </style>
    </head>
    <body style="background: #fff;">
        <!-- Navigation Bar -->
        <?php
            include './header.php';
        ?>

        <!-- <div class="topbar">
            <a href="javascript:void(0)" onclick="openNav()"><img src="./assets/hamburger.png" alt="Menu Icon"></a>
            <img id="userProfile" src="./assets/userProfile.png" alt="User Profile">
            <p>MandeepDalavi</p>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="./index.html">Home</a>
                <a href="./attendance.html">My Attendance</a>
                <a href="#">My Documents</a>
            </div>
        </div> -->
        <div class="baseContainer docCtn">
            <h3 id="documentTitle">DOCUMENTS</h3>
        </div>
        <p class="daysPresent"></p>
        <div class="tableContainer">


        <button class="accordion">Pay Slips</button>
        <div class="panel" id="paySlipAccord">
            <div class="innerPanel">
                <div class="select">
                    <select name="month" class="selectMonth" id="year">
                        <option value="" selected disabled hidden>Year</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="select">
                    <select name="month" class="selectMonth" id="month">
                        <option value="" selected disabled hidden>Month</option>
                        <option value="Jan">January</option>
                        <option value="Feb">February</option>
                        <option value="Mar">March</option>
                        <option value="Apr">April</option>
                        <option value="May">May</option>
                        <option value="Jun">June</option>
                        <option value="Jul">July</option>
                        <option value="Aug">August</option>
                        <option value="Sep">September</option>
                        <option value="Oct">October</option>
                        <option value="Nov">November</option>
                        <option value="Dec">December</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- <div class="docRow" style="margin-top:10px;">
            <span>Offer Letter</span>
            <button><img src="./images/download.png" alt="download" class="downloadOfferLetter" id="downloadBtn"></button>
        </div> -->

        <?php
        require "./config.php";

        $sql = "SELECT * FROM empdetails WHERE empID = '" . $_SESSION['id'] . "'";
        $result = mysqli_query($mysqli, $sql) or die("SQL Failed");

        if ($result->num_rows > 0) {
            echo '<div class="docRow" id="paySlipDiv" style="margin-top:10px;"><span>Offer Letter</span><div class="payDownloadDiv"><form action="./database/offerletter.php" method="post" id="paySlipDownload"><input type="hidden" name="userID" value="' . $_SESSION["id"] . '"><input type="submit" value="Download" ></form></div></div>';
        } else {
            print_r("Error");
        }

        ?>
    </div>



    
   

        </div>
        <!--<div class="coming">COMING SOON!</div>-->
        <?php
            include "components/bottomNav.php";
        ?>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");

                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + 50 + "px";
                    }
                });
            }




   


            $(document).ready(function () {
                $('#month').change(function () {
                    var selectedMonth = $(this).val();
                    var selectedYear = document.getElementById('year').value;
                    console.log(selectedMonth);
                    console.log(selectedYear);

                    $.ajax({
                        url: './database/checkPaySlipEligibility.php',
                        method: 'post',
                        data: { month: selectedMonth, year: selectedYear, userID: '<?php echo $_SESSION['id']?>' },
                        dataType: 'json',
                        success: function (res) {
                            var result = JSON.stringify(res);
                            console.log(res);
                            if(res == "No Data Found!"){
                                codeSet = '<div class="docRow" id="paySlipDiv"><span>Pay Slip Not Available</span></div>';
                            } else {
                                codeSet = '<div class="docRow" id="paySlipDiv"><span>Pay Slip '+selectedMonth+' '+selectedYear+'</span><div class="payDownloadDiv"><form action="./database/paySlip.php" method="post" id="paySlipDownload"><input type="hidden" name="userID" value="'+<?php echo $_SESSION["id"] ?>+'"><input type="hidden" name="payMonth" value="'+selectedMonth+'"><input type="hidden" name="payYear" value="'+selectedYear+'"><input type="submit" value=""></form></div></div>';
                            }
                            $('#paySlipDiv').remove();
                            $('#paySlipAccord').append(codeSet);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                });
            });

        
        </script>
    </body>
    </html>