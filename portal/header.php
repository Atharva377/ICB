<?php
    $checkSrc = NULL;
    $borderColor = NULL;
    $icbName = "";
    $options = array("<h2>Care For Bharat</h2>
    <button class='accordian'>Volunteer</button>
    <ul class='panel-2'>
        <a href='./home.php'>Home</a>
        <a href='./profile.php'>Profile</a>
        <a href='./events.php'>My Events</a>
        <a href='./differenceIMade.php'>Difference I Made</a>
        <a href='./shareMyStory.php'>Share My Story</a>
        <a href='./donate.php'>Donate</a>
        </ul>",
    "<button class='accordian'>Employee</button>
    <ul class='panel'>
        <a href='./empHome.php'>Employee Home</a>
        <a href='./empAttendanceScan.php'>Scan</a>
        <a href='./empDocuments.php'>My Docs</a>
        <a href='./empAttendance.php'>My Attendance</a>
        <a href='./offer.php'>Grant Docs</a>
    </ul>",
    "<button class='accordian'>Adminstrator</button>
    <ul class='panel'>
        <a href='./stats.php'>Stats</a>
        <a href='./eventsManage.php'>Event Manager</a>
        <a href='./announcement.php'>Announcement</a>
    </ul>",
    "<button class='accordian'>Super-Admin</button>
    <ul class='panel'>
        <a href='./attendanceQR.php'>Attendance QR</a>
    </ul>",
    );
    
    $commonOptions = "<button class='accordian'>Support and Settings</button>
    <ul>
        <a href='./settings.php'>Settings & Support</a>
        <a href='./coreTeam.php'>Contact Team</a>
        <a href='./alert.php'>Send an Alert</a>
        <a href='./logout.php'>Logout</a>
    </ul>";
    $menu = '';
    switch($_SESSION['type']){
        case "superadmin": $borderColor= '#00FF00'; 
                        $checkSrc= './images/verify-admin.png';
                        $menu =  $options[0].$options[1].$options[2].$options[3]."\n".$commonOptions;
                        break;
        case "admin": $borderColor= '#00FF00'; 
                        $checkSrc= './images/verify-admin.png';
                        $menu =  $options[0].$options[1].$options[2]."\n".$commonOptions;
                        break;
        case "volunteer": $borderColor= '#87CEEB';
            $checkSrc= './images/verify-volunteer.png';
            $menu = $icbName.$options[0]."\n".$commonOptions;
            break;
        case "employees": 
                $borderColor= '#FFA500';
                $checkSrc= './images/verify-employee.png';
                $menu = $icbName.$options[0].$options[1].$commonOptions;
            break;
    }
    $display = '';
    if($checkSrc == NULL){
        $display = 'd-none';
    }
    echo "<nav>
            <div class='profilePicture'>" . "\n" .
                "<img class='profPic' src='".$_SESSION['profile']."' style='border-color: " . $borderColor . ";' alt=''>" . "\n" .
                "<img class='check " . $display . "' src='" . $checkSrc . "' alt=''>" . "\n" .
            "</div><div class='userName'>" . $_SESSION['username'] . "</div>
        </nav>" .
        "<div class='sideBar hideSideBar'>
            <div class='sideItems'>
                <ul>
                     ".$menu."
                </ul>
                <div class='cross'>
                    <img src='./images/cross.png' alt=''>
                </div>
            </div>
        </div>";
?>