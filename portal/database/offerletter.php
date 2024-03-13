<?php
    error_reporting(0);
    require '../config.php';
    session_start();

    $userID = $_POST['userID'];
    
    $sql = "SELECT emp.*, usr.firstName, usr.lastName 
    FROM empdetails AS emp 
    JOIN users AS usr ON emp.empID = usr.id 
    WHERE emp.empID = $userID";

    $result = mysqli_query($mysqli, $sql) or die("SQL Failed");
    $userData = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $userData[] = $row;
        }
    }



    $firstName = $userData[0]['firstName'];
    $lastName = $userData[0]['lastName'];
    $fullName = $firstName." ".$lastName.",";
    $joining = $userData[0]['joining'];
    $empPosition = $userData[0]['empPosition'];
    $workingType = $userData[0]['workingType'];
    $empSalary = $userData[0]['empSalary'];
    $letterType = $userData[0]['letterType'];
    $duration = $userData[0]['duration'];
    $salaryType = $userData[0]['salaryType'];
    $specialAddition = $userData[0]['specialAddition'];
    $primaryResponsibilities = $userData[0]['primaryResponsibilities'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>careforbharat</title>
</head>
<body>
    <?php
        echo"<div id='username' style='display:none;'>$fullName</div>
        <div id='joining_date' style='display:none;'>$joiningDate</div>
        <div id='joining' style='display:none;'>$joining</div>
        <div id='emp_position' style='display:none;'>$empPosition</div>
        <div id='workingType' style='display:none;'>$workingType</div>
        <div id='letter_type' style='display:none;'>$letterType</div>
        <div id='duration' style='display:none;'>$duration</div>
        <div id='salary_amount' style='display:none;'>$empSalary</div>
        <div id='salary_type' style='display:none;'>$salaryType</div>
        <div id='special_addition' style='display:none;'>$specialAddition</div>
        <div id='primary_responsibilities' style='display:none;'>$primaryResponsibilities</div>";
    ?>
   
    

   <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
   <script src="../js/FileSave.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="../js/offerletter.js"></script>
    
    
</body>
</html>
<?php
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("refresh:2;url=$previousPage");
?>
