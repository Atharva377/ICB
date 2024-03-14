<?php 
    require '../config.php';
    session_start();
    $username = $_SESSION['full_name'];
    $userID = $_SESSION['id'];
    $sendData = json_decode($_POST['dataSend']);
    $date1 = $sendData->date;
    $time = $sendData->time;
    $fulldatebit = strtotime($date1);
    $ymd = date('Y-m-d', $fulldatebit);
    $year = date('Y', $fulldatebit);
    $month = date('M', $fulldatebit);
    
    $time1 = new DateTime($time);
    // $time2 = strtotime("10:07:00");
    $officeAssemblyLateTimeLimit = new DateTime("10:35:00");
    $officeAssemblyHalfDayTimeLimit = new DateTime("10:40:00");
    $officeAssemblyAbsentTimeLimit = new DateTime("10:45:00");

    // $minu = $time1 - $time2;
    // $minutime = date("H:i:s", $minu);

    // $hours = floor($minu / 3600);
    // $mins = floor($minu / 60 % 60);
    // $secs = floor($minu % 60);

    // $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
    
    if ($time1 < $officeAssemblyLateTimeLimit){
        $attendanceStatus = "Present";
    } elseif ($time1 < $officeAssemblyHalfDayTimeLimit && $time1 > $officeAssemblyLateTimeLimit){
        $attendanceStatus = "Late";
    } elseif ($time1 < $officeAssemblyAbsentTimeLimit && $time1 > $officeAssemblyHalfDayTimeLimit){
        $attendanceStatus = "Half-Day";
    } else{
        $attendanceStatus = "Absent";
    }
    
    $sql_a = "INSERT INTO empTrack (empID, empName, year, month, attendanceStat, date, inTime)" . "VALUES ('$userID', '$username','$year','$month','$attendanceStatus', '$date1', '$time')";
    $mysqli->query($sql_a);
    
    print_r($attendanceStatus);
    // echo "<script>alert(".$time.");</script>";
?>