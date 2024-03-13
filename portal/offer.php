<?php

     require 'config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
        header("Location: ./index.php");
    }
    if (!(isset($_SESSION['type']) && ($_SESSION['type']=='admin' || $_SESSION['type']=='superadmin'))){
        header("Location: ./index.php");
    }

    $sql = "SELECT * FROM users WHERE type='employees' OR type='admin'";
    $result = mysqli_query($mysqli, $sql) or die("SQL Failed");
    $outputResult = [];
    
    while($row = $result->fetch_assoc()){ 
        $outputResult[] = $row;
    }
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
    
    
    $empID = $mysqli->escape_string($_POST['empID']);
    $joiningDate = date('Y-m-d', strtotime($_POST['joiningDate']));
    $joining = $mysqli->escape_string($_POST['joining']);
    $empPosition = $mysqli->escape_string($_POST['position']);
    $workingType = $mysqli->escape_string($_POST['workingType']);
    $letterType = $mysqli->escape_string($_POST['letterType']);
    $duration = $mysqli->escape_string($_POST['duration']);
    $salaryType = $mysqli->escape_string($_POST['salaryType']);
    $salaryAmount = $mysqli->escape_string($_POST['amount']);
    $travelAll = $mysqli->escape_string($_POST['travelAll']);
    $otherAll = $mysqli->escape_string($_POST['otherAll']);
    $specialAddition = $mysqli->escape_string($_POST['specialAdd']);
    $primaryResponsibilities = $mysqli->escape_string($_POST['primaryResponibilities']);


    $sql_a = "INSERT INTO empdetails (empID, joiningDate, joining, empPosition, workingType, empSalary, empTravelAll, empOtherAll, letterType, duration, salaryType, specialAddition, primaryResponsibilities)
    VALUES ('$empID', '$joiningDate','$joining', '$empPosition','$workingType', '$salaryAmount', '$travelAll', '$otherAll','$letterType', '$duration', '$salaryType', '$specialAddition', '$primaryResponsibilities')";

        if($mysqli->query($sql_a)){
            echo "<script>alert('Details saved successfully!');</script>";
        }else{
            echo "<script>alert('Problem saving Details!');</script>";
        }
    }
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
    <link rel="stylesheet" href="./css/bottomNav.css">
    <script src="./js/sliderAccordian.js" defer></script>
    <title>Offer Letter</title>
    <link rel="stylesheet" href="./css/emp.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            background: #fff;
            overflow-y: scroll; 
        }

      .baseContainer {
    
    padding: 20px;
}
#submit
{
  padding: 9px !important; 
  border-radius: 50px !important; 
  border: 1px solid #000 !important; 
  font-size: 1rem !important; 
  padding: 15px !important; 
  background: #66f597 !important; 
  border: none !important; 
  border-radius: 10px !important; 
  margin-top: 5px !important; 
  margin-bottom: 10px !important; 

  text-transform: uppercase !important; 
  font-size: 20px !important; 
  font-weight: 600 !important; 
  cursor: pointer !important; 
  opacity: .8 !important; 
  box-shadow: 0 0 10px 0 #3aa13f !important; 
}



.docCtn {
    margin-top: 20px;
}

.tableContainer {
    margin-top: 20px;
   
}

form {
    display: flex;
    flex-direction: column;
    
}

input[type="text"],
input[type="number"],
select,
button {
    margin: 10px;
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    border-radius: 40px;
}


@media only screen and (min-width: 600px) {
    
    .baseContainer {
        max-width: 500px;
        margin: 0 auto;
        justify-content: center;
        text-align: center;
    }
    .tableContainer{
        max-width: 500px;
        margin: 0 auto;
        justify-content: center;
        text-align: center;
    }
}

@media only screen and (min-width: 768px) {
    
    .baseContainer {
        max-width: 700px;
        justify-content: center;
        text-align: center;
    }
}

@media only screen and (min-width: 992px) {
    
    .baseContainer {
        max-width: 992px;
    }
}

@media only screen and (min-width: 1200px) {
   
    .baseContainer {
        max-width: 1200px;
    }
}
@media only screen and (max-width: 568px) {
   
   
input[type="text"], input[type="number"], select, button {
    margin: 15px;
    padding: 10px;
    width: 95%;
    box-sizing: border-box;
    border-radius: 40px;
    text-align: center;
   
}
input[type="date" i] {
    margin: 15px;
    padding: 7px;
    width: 95%;
    box-sizing: border-box;
    border-radius: 40px;
    text-align: center;
}
#meaning{
   
        text-align: center;  
}

}

    </style>
</head>

<body style="background: #fff;">
   
    <?php
        include './header.php';
    ?>
   
    <div class="baseContainer docCtn">
        <h3 id="documentTitle">Offer Letter Details</h3>
    </div>
    <p class="daysPresent"></p>
    <div class="tableContainer attend">
        <form action="offer.php" id="offerletter" method="post">
            <select name="empID" id="employee">
                <option value="" selected disabled hidden>Employee</option>
                <?php
                    for($x=0; $x<sizeof($outputResult); $x++){
                        if ($outputResult[$x]["id"] != $_SESSION["id"]) {
                        echo '<option value="'.$outputResult[$x]["id"].'" >'.$outputResult[$x]["id"].' | '.$outputResult[$x]['firstName'].' '.$outputResult[$x]["lastName"].'</option>';
                        }
                    }
                ?>
            </select>
            <div class="offer-dropdown">
                <label for="LetterType"><div id="meaning">Offer Letter</div></label>
                <select name="letterType" id="LetterType">
                    <option value="Tax Sarthi">Tax Sarthi</option>
                    <option value="Mandet">Mandet</option>
                </select>
            </div>
             <div id="meaning">Date of Joining</div>
            <input type="date" name="joiningDate" id="joiningDate" required>
            <input type="text" name="joining" id="joining" placeholder="Joining(On offer Letter)" required>

            <input type="text" name="duration" id="duration" placeholder="Duration">
           
            <input type="text" name="position" id="position" placeholder="Position">

            <div class="offer-dropdown">
                <label for="workingType" ><div id="meaning">Working Type</div></label>
                <select name="workingType" id="workingType">
                <option value="Select">Select here</option>
                    <option value="Internship">Internship</option>
                    <option value="Job">Job</option>
                </select>
            </div>

            <div class="offer-dropdown">
                <label for="SalaryType"><div id="meaning">Salary Type</div></label>
                <select name="salaryType" id="SalaryType">
                <option value="Select">Select here</option>
                    <option value="Per Month">Per Month</option>
                    <option value="LPA">LPA</option>
                </select>
            </div>

            <input type="number" name="amount" placeholder="Salary Amount">
            <input type="number" name="travelAll" placeholder="Travel Allowance">
            <input type="number" name="otherAll" placeholder="Other Allowance">
        
            
            <div class="offer-dropdown">
                <label for="specialAddition"><div id="meaning">Special Additions</div></label>
                <select name="specialAdd" id="special">
                <option value="Select">Select here</option>
                    <option value="INCENTIVES based Experience">INCENTIVES based Experience</option>
                    <option value="Equity and Profit share based on Trust and Experience">Equity and Profit share based on Trust and Experience</option>
                </select>
            </div>

            <input type="text" name="primaryResponibilities" id="Responibilities" placeholder="Primary Responsibilites">
            <button type="submit" id="submit" name="submit">Submit</button>
        </form>
    </div>

   
</body>
   <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="./js/offerletter.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="./js/FileSave.js"></script>
</html>