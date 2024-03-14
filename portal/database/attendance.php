<?php
    $attended = $_GET['attended'];
    $eventTableName = $_GET['eTN'];
    $enrolledUserEmail = $_GET['email'];

    include '../config.php';

    $eventtable = $mysqli->query("SELECT * FROM events WHERE eventTableName='$eventTableName'");
    $event = $eventtable->fetch_assoc();

    switch($event['eventInitiative']){
        case 'Mental Health': $initiative = 'mental_health'; break;
        case 'Mission Shiksha': $initiative = 'mission_shiksha'; break;
        case 'Animal Safety': $initiative = 'animal_safety'; break;
        case 'Environment': $initiative = 'environment'; break;
        case 'Sex Education': $initiative = 'sex_education'; break;
    }

    if($attended=='true'){
        $sql = "UPDATE `$eventTableName` SET enrolledUserAttended=1 WHERE enrolledUserEmail='$enrolledUserEmail'";
        $result = mysqli_query($mysqli, $sql) or die("SQL Failed");
        $mysqli->query("UPDATE stats SET `$initiative` = `$initiative` + 1, totalEventsAttended = totalEventsAttended + 1 WHERE userEmail='$enrolledUserEmail'");
    }
    else if($attended=='false'){
        $sql = "DELETE FROM `$eventTableName` WHERE enrolledUserEmail='$enrolledUserEmail'";
        $result = mysqli_query($mysqli, $sql) or die("SQL Failed");
    }
    else if($attended=='no'){
        $sql = "UPDATE `$eventTableName` SET enrolledUserAttended=0 WHERE enrolledUserEmail='$enrolledUserEmail'";
        $result = mysqli_query($mysqli, $sql) or die("SQL Failed");
        $mysqli->query("UPDATE stats SET `$initiative` = `$initiative` - 1, totalEventsAttended = totalEventsAttended - 1 WHERE userEmail='$enrolledUserEmail'");
    }
    else {
        echo 'Some Error Occured';
    }

    mysqli_close($mysqli);

    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
?>