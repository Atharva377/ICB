<?php
    $checkSrc = NULL;
    $borderColor = NULL;
    $icbName = "";
    $options = array("<h2>Care For Bharat</h2>
    <button class='accordian'>Volunteer</button>
    <ul class='panel-2'>
        <a href='./home.php'>Home</a>
        <a href='./profile.php'>Profile</a>
<<<<<<< HEAD
        <a href='./trainings.php'>My Training</a>
=======
>>>>>>> 5baa88f (final commit)
        <a href='./events.php'>My Events</a>
        <a href='./differenceIMade.php'>Difference I Made</a>
        <a href='./shareMyStory.php'>Share My Story</a>
        <a href='./donate.php'>Donate</a>
<<<<<<< HEAD
    </ul>",
    "<button class='accordian'>Associate</button>
    <ul class='panel'>
        <a href='./dashboard.php'>Dashboard</a>
        <a href='./manageDownline.php'>Manage Downline</a>
        <a href='./salesCRM.php'>Sales CRM</a>
        <a href='./products.php'>Products</a>
        <a href='./learn.php'>Learn</a>
    </ul>",
    "<button class='accordian'>Employee</button>
    <ul class='panel'>
        <a href='#'>My Documents</a>
        <a href='#'>My Salary</a>
        <a href='#'>My Attendance</a>
    </ul>",
    "<button class='accordian'>Partner</button>
    <ul class='panel'>
        <a href='#'>Dashboard</a>
        <a href='#'>Product Post & Manage</a>
=======
        </ul>",
    "<button class='accordian'>Employee</button>
    <ul class='panel'>
        <a href='./empHome.php'>Employee Home</a>
        <a href='./empAttendanceScan.php'>Scan</a>
        <a href='./empDocuments.php'>My Docs</a>
        <a href='./empAttendance.php'>My Attendance</a>
        <a href='./offer.php'>Grant Docs</a>
>>>>>>> 5baa88f (final commit)
    </ul>",
    "<button class='accordian'>Adminstrator</button>
    <ul class='panel'>
        <a href='./stats.php'>Stats</a>
        <a href='./eventsManage.php'>Event Manager</a>
        <a href='./announcement.php'>Announcement</a>
<<<<<<< HEAD
    </ul>"
    );
    // <button class='accordian'>Support and Settings</button>
    $commonOptions = "
=======
    </ul>",
    "<button class='accordian'>Super-Admin</button>
    <ul class='panel'>
        <a href='./attendanceQR.php'>Attendance QR</a>
    </ul>",
    );
    
    $commonOptions = "<button class='accordian'>Support and Settings</button>
>>>>>>> 5baa88f (final commit)
    <ul>
        <a href='./settings.php'>Settings & Support</a>
        <a href='./coreTeam.php'>Contact Team</a>
        <a href='./alert.php'>Send an Alert</a>
        <a href='./logout.php'>Logout</a>
    </ul>";
<<<<<<< HEAD
    
    switch($_SESSION['type']){
        case "admin": $borderColor= '#00FF00'; 
        $_SESSION["profile_border"] = '#00FF00';
                        $checkSrc= './images/verify-admin.png';
                        $menu =  $options[0].$options[1].$options[2].$options[3].$options[4]."\n".$commonOptions;
                    //   "<a href='./home.php'>Home</a>
                    //             <a href='./stats.php'>Stats</a>
                    //             <a href='./eventsManage.php'>Event Manager</a>
                    //             <a href='./announcement.php'>Announcement</a>
                    //             <a href='./profile.php'>Profile</a>
                    //             <a href='./trainings.php'>My Training</a>
                    //             <a href='./events.php'>My Events</a>
                    //             <a href='./differenceIMade.php'>Difference I Made</a>
                    //             <a href='./shareMyStory.php'>Share My Story</a>
                    //             <a href='./donate.php'>Donate</a>
                    //             <a href='./addMarshalls.php'>Add a Marshal</a>
                    //             <a href='./settings.php'>Settings & Support</a>
                    //             <a href='./logout.php'>Logout</a>";
                      break;
        // case "core-team": $borderColor= '#FC8955';
        //                 $checkSrc= './images/shield core-team.png';
        //                 $menu =  "<a href='./home.php'>Home</a>
        //                             <a href='./profile.php'>Profile</a>
        //                             <a href='./trainings.php'>My Training</a>
        //                             <a href='./events.php'>My Events</a>
        //                             <a href='./differenceIMade.php'>Difference I Made</a>
        //                             <a href='./shareMyStory.php'>Share My Story</a>
        //                             <a href='./donate.php'>Donate</a>
        //                             <a href='./addMarshalls.php'>Add a Marshal</a>
        //                             <a href='./settings.php'>Settings & Support</a>
        //                             <a href='./coreTeam.php'>Contact Team</a>
        //                             <a href='./alert.php'>Send an Alert</a>
        //                             <a href='./logout.php'>Logout</a>";
        //                 break;
        case "volunteer": $borderColor= '#87CEEB';
        $_SESSION["profile_border"] = '#87CEEB';
                    $checkSrc= './images/verify-volunteer.png';
                    $menu = $icbName.$options[0]."\n".$commonOptions;
                    //    "<a href='./home.php'>Home</a>
                    //             <a href='./profile.php'>Profile</a>
                    //             <a href='./trainings.php'>My Training</a>
                    //             <a href='./events.php'>My Events</a>
                    //             <a href='./differenceIMade.php'>Difference I Made</a>
                    //             <a href='./shareMyStory.php'>Share My Story</a>
                    //             <a href='./donate.php'>Donate</a>
                    //             <a href='./settings.php'>Settings & Support</a>
                    //             <a href='./coreTeam.php'>Contact Team</a>
                    //             <a href='./alert.php'>Send an Alert</a>
                    //             <a href='./logout.php'>Logout</a>";
                       break;
        // case "student": $borderColor= '#FFC4C4';
        //                 $menu ="<a href='./home.php'>Home</a>
        //                         <a href='./profile.php'>Profile</a>
        //                         <a href='./trainings.php'>My Training</a>
        //                         <a href='./events.php'>My Events</a>
        //                         <a href='./differenceIMade.php'>Difference I Made</a>
        //                         <a href='./shareMyStory.php'>Share My Story</a>
        //                         <a href='./donate.php'>Donate</a>
        //                         <a href='./settings.php'>Settings & Support</a>
        //                         <a href='./coreTeam.php'>Contact Team</a>
        //                         <a href='./alert.php'>Send an Alert</a>
        //                         <a href='./logout.php'>Logout</a>";
        //                break;
        // case "volunteer": $menu = $options[0] + $commonOptions;
        //                         break;
        case "associate":
            $borderColor= '#4B0082';
            $_SESSION["profile_border"] = '#4B0082';
            $checkSrc= './images/verify-asscociate.png'; 
            $menu = $icbName.$options[0].$options[1].$commonOptions;
            break;

        case "employees": 
            $borderColor= '#FFA500';
            $_SESSION["profile_border"] = '#FFA500';
            $checkSrc= './images/verify-employee.png';
            $menu = $icbName.$options[0].$options[1].$options[2].$commonOptions;
            break;
        case "partner":
            $borderColor= '#0000FF';
            $_SESSION["profile_border"] = '#0000FF';
            $checkSrc= './images/verify-partner.png';
            $menu = $icbName.$options[0].$options[1].$options[3].$commonOptions;
            break;

=======
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
>>>>>>> 5baa88f (final commit)
    }
    $display = '';
    if($checkSrc == NULL){
        $display = 'd-none';
    }
<<<<<<< HEAD
    // if($borderColor != NULL){
    //     $_SESSION["profile_border"] = $borderColor;
    // }
    echo "<nav id='header_tab'>
=======
    echo "<nav>
>>>>>>> 5baa88f (final commit)
            <div class='profilePicture'>" . "\n" .
                "<img class='profPic' src='".$_SESSION['profile']."' style='border-color: " . $borderColor . ";' alt=''>" . "\n" .
                "<img class='check " . $display . "' src='" . $checkSrc . "' alt=''>" . "\n" .
            "</div><div class='userName'>" . $_SESSION['username'] . "</div>
        </nav>" .
        "<div class='sideBar hideSideBar'>
            <div class='sideItems'>
                <ul>
<<<<<<< HEAD
                    ".$menu."
=======
                     ".$menu."
>>>>>>> 5baa88f (final commit)
                </ul>
                <div class='cross'>
                    <img src='./images/cross.png' alt=''>
                </div>
            </div>
        </div>";
?>