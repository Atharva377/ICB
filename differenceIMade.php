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

require "config.php";

// getting ranking
$sql = "SELECT FIND_IN_SET( totalEventsAttended, (
    SELECT GROUP_CONCAT( totalEventsAttended
    ORDER BY totalEventsAttended DESC ) 
    FROM stats )
    ) AS rank
    FROM stats WHERE userEmail = '".$_SESSION['email']."'";
$result = mysqli_query($mysqli, $sql) or die('Data fetching issues');
$outputEvents = [];
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $outputEvents[] = $row;
    }
}
$rank = $outputEvents[0]['rank'];

// getting events attended data
$sql = 'SELECT * FROM `stats` WHERE `userEmail` LIKE "'.$_SESSION['email'].'"';
$result = mysqli_query($mysqli, $sql) or die('Data fetching issues');
$outputEvents = [];
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $outputEvents[] = $row;
    }
}


// individuAL Event monthly stats
$myEnvironment = array(0,0,0,0,0,0,0,0,0,0,0,0);
$query = "SELECT * FROM `events` WHERE eventInitiative LIKE 'Environment'";
$result = mysqli_query($mysqli,$query) or die('Data fetching issue');
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tableName = $row['eventTableName'];
        $monthIndex = (int)substr($row['eventDate'],5,2) -1;
        $subQuery = 'SELECT * FROM `' . $tableName . '` WHERE enrolledUserEmail LIKE "'.$_SESSION['email'].'" AND enrolledUserAttended LIKE 1 ';
        $subResult = mysqli_query($mysqli,$subQuery) or die('Data fetching issue');
        if(mysqli_num_rows($subResult)>0){
            $myEnvironment[$monthIndex] += 1; 
        }

    }}

$myHealth = array(0,0,0,0,0,0,0,0,0,0,0,0);
$query = "SELECT * FROM `events` WHERE eventInitiative LIKE 'Mental Health'";
$result = mysqli_query($mysqli,$query) or die('Data fetching issue');
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tableName = $row['eventTableName'];
        $monthIndex = (int)substr($row['eventDate'],5,2) -1;
        $subQuery = 'SELECT * FROM `' . $tableName . '` WHERE enrolledUserEmail LIKE "'.$_SESSION['email'].'" AND enrolledUserAttended LIKE 1 ';
        $subResult = mysqli_query($mysqli,$subQuery) or die('Data fetching issue');
        if(mysqli_num_rows($subResult)>0){
            $myHealth[$monthIndex] += 1; 
        }

    }}
$myShiksha = array(0,0,0,0,0,0,0,0,0,0,0,0);
$query = "SELECT * FROM `events` WHERE eventInitiative LIKE 'Mission Shiksha'";
$result = mysqli_query($mysqli,$query) or die('Data fetching issue');
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tableName = $row['eventTableName'];
        $monthIndex = (int)substr($row['eventDate'],5,2) -1;
        $subQuery = 'SELECT * FROM `' . $tableName . '` WHERE enrolledUserEmail LIKE "'.$_SESSION['email'].'" AND enrolledUserAttended LIKE 1 ';
        $subResult = mysqli_query($mysqli,$subQuery) or die('Data fetching issue');
        if(mysqli_num_rows($subResult)>0){
            $myShiksha[$monthIndex] += 1; 
        }

    }}
$myAnimal = array(0,0,0,0,0,0,0,0,0,0,0,0);
$query = "SELECT * FROM `events` WHERE eventInitiative LIKE 'Animal Safety'";
$result = mysqli_query($mysqli,$query) or die('Data fetching issue');
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tableName = $row['eventTableName'];
        $monthIndex = (int)substr($row['eventDate'],5,2) -1;
        $subQuery = 'SELECT * FROM `' . $tableName . '` WHERE enrolledUserEmail LIKE "'.$_SESSION['email'].'" AND enrolledUserAttended LIKE 1 ';
        $subResult = mysqli_query($mysqli,$subQuery) or die('Data fetching issue');
        if(mysqli_num_rows($subResult)>0){
            $myAnimal[$monthIndex] += 1; 
        }

    }}
$mySexEd = array(0,0,0,0,0,0,0,0,0,0,0,0);
$query = "SELECT * FROM `events` WHERE eventInitiative LIKE 'Sex Education'";
$result = mysqli_query($mysqli,$query) or die('Data fetching issue');
    if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tableName = $row['eventTableName'];
        $monthIndex = (int)substr($row['eventDate'],5,2) -1;
        $subQuery = 'SELECT * FROM `' . $tableName . '` WHERE enrolledUserEmail LIKE "'.$_SESSION['email'].'" AND enrolledUserAttended LIKE 1 ';
        $subResult = mysqli_query($mysqli,$subQuery) or die('Data fetching issue');
        if(mysqli_num_rows($subResult)>0){
            $mySexEd[$monthIndex] += 1; 
        }

    }}

// monthly total event stats

$fin = array();
for ($x = 0; $x <= 11; $x++) {
    $fin[$x] = $myEnvironment[$x] + $myAnimal[$x] + $myHealth[$x] + $myShiksha[$x] + $mySexEd[$x];
}

// total events data

// Mental Health Count
$sql = "SELECT * FROM `events` WHERE `eventInitiative` LIKE 'Mental Health'";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$tHealth = mysqli_num_rows($resultEvents);

// Mission Shikha Count
$sql = "SELECT * FROM `events` WHERE `eventInitiative` LIKE 'Mission Shiksha'";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$tShiksha = mysqli_num_rows($resultEvents);

// Animal Safet Count
$sql = "SELECT * FROM `events` WHERE `eventInitiative` LIKE 'Animal Safety'";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$tAnimal = mysqli_num_rows($resultEvents);

// Environment Count
$sql = "SELECT * FROM `events` WHERE `eventInitiative` LIKE 'Environment'";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$tEnvironment = mysqli_num_rows($resultEvents);

// Sex Education Count
$sql = "SELECT * FROM `events` WHERE `eventInitiative` LIKE 'Sex Education'";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$tSexEd = mysqli_num_rows($resultEvents);

// Others Count
$sql = "SELECT * FROM `events`";
$resultEvents = mysqli_query($mysqli, $sql) or die("SQL Failed");
$totalEvents = mysqli_num_rows($resultEvents);
$tOther = $totalEvents-($tHealth+$tShiksha+$tAnimal+$tEnvironment+$tSexEd);


// marshals count
$query = "SELECT COUNT(*) FROM `users`";
$res = mysqli_query($mysqli,$query) or die('SQL Failed');
$oe = [];
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        $tMarshals = $row['COUNT(*)'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Difference I Made</title>
    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/profile-css/difference.css">

</head>

<body>

    <!-- Navigation Bar -->
    <?php
        include './header.php';
    ?>

        <h1 class="Rank">Rank <b class="num"><?php echo $rank ?></b></h1>

        <h2>Difference I Made</h2>


        <div class="chartCard">
            <div class="chartBox">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // setup 
            const labels = ['Mental Health', 'Mission Shiksha', 'Animal Safety', 'Environment', 'Sex Education'];
            const data = {
                labels: ['Mental Health', 'Mission Shiksha', 'Animal Safety', 'Environment', 'Sex Education'],
                datasets: [{
                    data: [<?php echo $outputEvents[0]['mental_health'].",".$outputEvents[0]['mission_shiksha'].",".$outputEvents[0]['animal_safety'].",".$outputEvents[0]['environment'].",".$outputEvents[0]['sex_education'] ?>],
                    backgroundColor: [
                        '#CB8FBD',
                        '#2EC5B6',
                        '#E01518',
                        '#41D950',
                        '#FFBE00'
                    ],
                    borderWidth: 1
                }],
            };

            // config 
            const config = {
                type: 'bar',
                data,
                options: {
                    plugins: {
                 legend: {
                 display: false
                  }
                   },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // render init block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>


        <h2>Individual Event Montly Status</h2>

        <div class="chartCard">
            <div class="chartBox">

                <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>

            </div>
        </div>

        <script>
            var xValues = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ];

            new Chart("myChart2", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: 'Mental Health',
                        data: [<?php echo "$myHealth[0], $myHealth[1], $myHealth[2], $myHealth[3], $myHealth[4], $myHealth[5], $myHealth[6], $myHealth[7], $myHealth[8], $myHealth[9], $myHealth[10], $myHealth[11]" ?>],
                        borderColor: '#CB8FBD',
                        fill: false,
                        borderWidth: 1,
                        backgroundColor: '#CB8FBD'
                    }, {
                        label: 'Mission Shiksha',
                        data: [<?php echo "$myShiksha[0], $myShiksha[1], $myShiksha[2], $myShiksha[3], $myShiksha[4], $myShiksha[5], $myShiksha[6], $myShiksha[7], $myShiksha[8], $myShiksha[9], $myShiksha[10], $myShiksha[11]" ?>],
                        borderColor: '#2EC5B6',
                        fill: false,
                        borderWidth: 1,
                        backgroundColor: '#2EC5B6'
                    }, {
                        label: 'Animal Safety',
                        data: [<?php echo "$myAnimal[0], $myAnimal[1], $myAnimal[2], $myAnimal[3], $myAnimal[4], $myAnimal[5], $myAnimal[6], $myAnimal[7], $myAnimal[8], $myAnimal[9], $myAnimal[10], $myAnimal[11]" ?>],
                        borderColor: '#E01518',
                        fill: false,
                        borderWidth: 1,
                        backgroundColor: '#E01518'
                    }, {
                        label: 'Environment',
                        data: [<?php echo "$myEnvironment[0], $myEnvironment[1], $myEnvironment[2], $myEnvironment[3], $myEnvironment[4], $myEnvironment[5], $myEnvironment[6], $myEnvironment[7], $myEnvironment[8], $myEnvironment[9], $myEnvironment[10], $myEnvironment[11]" ?>],
                        borderColor: '#41D950',
                        fill: false,
                        borderWidth: 1,
                        backgroundColor: '#41D950'
                    }, {
                        label: 'Sex Education',
                        data: [<?php echo "$mySexEd[0], $mySexEd[1], $mySexEd[2], $mySexEd[3], $mySexEd[4], $mySexEd[5], $mySexEd[6], $mySexEd[7], $mySexEd[8], $mySexEd[9], $mySexEd[10], $mySexEd[11]" ?>],
                        borderColor: '#FFBE00',
                        fill: false,
                        borderWidth: 1,
                        backgroundColor: '#FFBE00'
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        </script>

        <h2>Overall Monthly Event Status</h2>

        <div class="chartCard">
            <div class="chartBox">

                <canvas id="myChart3" style="width:100%;max-width:700px"></canvas>

            </div>
        </div>

        <script>
            var xValues = ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ];
            var yValues = [<?php echo "$fin[0], $fin[1], $fin[2], $fin[3], $fin[4], $fin[5], $fin[6], $fin[7], $fin[8], $fin[9], $fin[10], $fin[11]" ?>];

            new Chart("myChart3", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: 'Events',
                        backgroundColor: "rgba(0,0,0,0.3)",
                        borderColor: "rgba(0,0,0,1)",
                        data: yValues,
                        borderWidth: 1
                    }]
                }
            });
        </script>

        <h2 class="achievement">Achievements</h2>


        <div class="Card d-flex">

            
           
           
            
           

            <div class="col1">
              
                <h3>Events</h3>
                <ul>
                    <li>
                        <div class="square1 d-flex sqr"></div>
                        <p>Animal Safety </p>
                    </li>
                    <li>
                        <div class="square2 d-flex sqr"></div>
                       <p> Mission Shiksha</p>
                    </li>
                    <li>

                    <div class="square3 d-flex sqr"></div>
                        <p>Sex Education</p>
                    </li>
                    <li>
                        <div class="square4 d-flex sqr"></div>
                        <p>Mental Health</p>
                    </li>
                    <li>
                        <div class="square5 d-flex sqr"></div>
                        <p>Environment</p>
                    </li>
                    <li>
                        <div class="square6 d-flex sqr"></div>
                        <p>Others</p>
                    </li>
                </ul>
            </div>
            <div class="col2">
                <h3>Events Attended</h3>
                <ul class="attend">
                    <li><?php echo $outputEvents[0]['animal_safety'] ?></li>
                    <li><?php echo $outputEvents[0]['mission_shiksha'] ?></li>
                    <li><?php echo $outputEvents[0]['sex_education'] ?></li>
                    <li><?php echo $outputEvents[0]['mental_health'] ?></li>
                    <li><?php echo $outputEvents[0]['environment'] ?></li>
                    <li><?php echo $outputEvents[0]['totalEventsAttended']-($outputEvents[0]['animal_safety']+$outputEvents[0]['mission_shiksha']+$outputEvents[0]['sex_education']+$outputEvents[0]['mental_health']+$outputEvents[0]['environment']) ?></li>
                </ul>

            </div>
            <div class="col3">
                <h3>Events Held</h3>
                <ul>
                    <li><?php echo $tAnimal ?></li>
                    <li><?php echo $tShiksha ?></li>
                    <li><?php echo $tSexEd ?></li>
                    <li><?php echo $tHealth ?></li>
                    <li><?php echo $tEnvironment ?></li>
                    <li><?php echo $tOther ?></li>
                </ul>

            </div>


        </div>

        <h2>Events Data</h2>


        <div class="Card">

            <ul>

                <li>Total Events Attended: <b><?php echo $outputEvents[0]['totalEventsAttended']?></b></li>
                <li>Total Events Held: <b><?php echo $totalEvents?></b></li>
                <li>Current Ranking: <b><?php echo $rank?></b></li>
                <li>Total Marshals: <b><?php echo $tMarshals ?></b></li>
            </ul>

        </div>

 
      




    <script src="js/sideBar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</body>

</html>