<?php
error_reporting(0);
require '../config.php';

$userID = $_POST['userID'];
$payMonth = $_POST['payMonth'];
$payYear = $_POST['payYear'];

$strmonth = strtotime($payMonth . " " . $payYear);
$payMonthCap = strtoupper(date("F", $strmonth));
$monthNum = date("m", $strmonth);
$yearNum = date("Y", $strmonth);

$sql = "SELECT * FROM users WHERE id=$userID";
$result = mysqli_query($mysqli, $sql) or die("SQL Failed");
$userData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userData[] = $row;
    }
}

$userFirstName = $userData[0]['firstName'];
$userLastName = $userData[0]['lastName'];
$empName = $userFirstName . " " . $userLastName;
$empPAN = $userData[0]["pan"];
$empBankAC = $userData[0]["accountNum"];
$empBankIFSC = $userData[0]["ifsc"];
$empUAN = $userData[0]["UAN"];
$emppfno = $userData[0]["pfno"];
$emppt = $userData[0]["pt"];
$emppf = $userData[0]["pf"];
$empInsurance = $userData[0]["insurance"];
$emptds = $userData[0]["tds"];
$empother = $userData[0]["other"];
$empPosition = $userData[0]["empPosition"];
$empSalary = $userData[0]["empSalary"];
$empTravelAll = $userData[0]["empTravelAll"];
$empOtherAll = $userData[0]["empOtherAll"];
$empBonus = $userData[0]["empBonus"];
$empGrossSalary = $empSalary + $empTravelAll + $empOtherAll;
// $empNetPayable = $empGrossSalary+$empBonus;

// mysqli_close($mysqli);
// $sql1 = "SELECT * FROM emptrack WHERE empID = '$userID' AND year = '$payYear' AND month = '$payMonth'";
// $result1 = mysqli_query($mysqli, $sql1) or die("SQL Failed");

$sql1 = "SELECT
    et.empID,
    et.empName,
    et.year,
    et.month,
    CASE
        WHEN et.date IS NULL THEN 'Holiday'
        ELSE et.attendanceStat
    END AS attendanceStat,
    et.reason,
    d.date,
    et.inTime
    FROM (
        -- Generate a list of dates for the specified month and year
        SELECT DATE_FORMAT(d, '%Y-%m-%d') AS date
        FROM (
            SELECT CURDATE() - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY AS d
            FROM (
                SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
            ) AS a
            CROSS JOIN (
                SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
            ) AS b
            CROSS JOIN (
                SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9
            ) AS c
        ) AS dates
        WHERE MONTH(d) = $monthNum AND YEAR(d) = $yearNum -- Specify the month and year here
    ) AS d
    
    LEFT JOIN empTrack AS et ON d.date = et.date
    AND et.empID = $userID -- Specify the employee ID here
    AND et.year = $yearNum -- Specify the year here
    AND et.month = '$payMonth' -- Specify the month here
    ORDER BY d.date;";

$result1 = mysqli_query($mysqli, $sql1) or die("SQL Failed");


$empAttendance = [];
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $empAttendance[] = $row;
    }
}

$presentCount = 0;
$checkStat = ["Leave", "Absent", "Holiday"];
$annualHolidays = array(
    "Jan" => array(14, 15, 26),
    "Feb" => array(19),
    "Mar" => array(8, 24, 25),
    "Apr" => array(9, 14, 17),
    "May" => array(1),
    "Jun" => array(29),
    "Aug" => array(15, 19, 26),
    "Sep" => array(7),
    "Oct" => array(2, 9, 12, 31),
    "Nov" => array(2),
    "Dec" => array(25)
);
for ($i = 0; $i < count($empAttendance); $i++) {
    $stat = $empAttendance[$i]['attendanceStat'];
    if ($stat == "Present" || $stat == "Paid Leave") {
        $presentCount += 1;
        // print_r("Present +1");
    } else if ($stat == "Half-Day") {
        $presentCount += 0.5;
    } else if ($stat == "Holiday" || in_array($i, $annualHolidays["$payMonth"])) {
        if (in_array($empAttendance[$i - 1]["attendanceStat"], $checkStat) || in_array($empAttendance[$i + 1]["attendanceStat"], $checkStat)) {
            $presentCount += 0;
            // print_r("Holiday Absent Leave +0");
        } else {
            $presentCount += 1;
            // print_r("Holiday NOne +1");
        }
    } else if ($stat == "Holiday" && $empAttendance[$i - 1]['attendanceStat'] == "Holiday" && $empAttendance[$i + 1]['attendanceStat'] == "Holiday") {
        $presentCount -= 1;
        // print_r("Holiday cont. -1");
    }
}

$daysInSelectedMonth = cal_days_in_month(CAL_GREGORIAN, (int) $monthNum, (int) $payYear);
$lop = round($empGrossSalary / $daysInSelectedMonth, 2);
$basicPresent = round($empSalary / $daysInSelectedMonth * $presentCount, 2);
$travelPresent = round($empTravelAll / $daysInSelectedMonth * $presentCount, 2);
$otherPresent = round($empOtherAll / $daysInSelectedMonth * $presentCount, 2);
$empNetPayable = round($basicPresent + $travelPresent + $otherPresent + $empBonus);


function AmountInWords(float $amount)
{
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;

    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(
        0 => 'Zero', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Fourty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety'
    );
    $here_digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($x < $count_length) {
        $get_divider = ($x == 2) ? 10 : 100;
        $amount = floor($num % $get_divider);
        $num = floor($num / $get_divider);
        $x += $get_divider == 10 ? 1 : 2;
        if ($amount) {
            $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
            $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
            $string[] = ($amount < 21) ? $change_words[$amount] . ' ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred : $change_words[floor($amount / 10) * 10] . ' ' . $change_words[$amount % 10] . ' ' . $here_digits[$counter] . $add_plural . ' ' . $amt_hundred;
        } else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
    " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees Only' : '') . $get_paise;
}

$empNetPayableInWords = AmountInWords($empNetPayable);
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
    echo "<div id='pay_month' style='display:none;'>$payMonthCap</div>
        <div id='pay_year' style='display:none;'>$payYear</div>
        <div id='emp_name' style='display:none;'>$empName</div>
        <div id='emp_designation' style='display:none;'>$empPosition</div>
        <div id='emp_id' style='display:none;'>$userID</div>
        <div id='emp_pan' style='display:none;'>$empPAN</div>
        <div id='emp_days_present' style='display:none;'>$presentCount/$daysInSelectedMonth</div>
        <div id='emp_lop' style='display:none;'>$lop</div>
        <div id='emp_uan' style='display:none;'>$empUAN</div>
        <div id='emp_pfno' style='display:none;'>$emppfno</div>
        <div id='comp_tan' style='display:none;'>PNEA35723C</div>
        <div id='emp_account' style='display:none;'>$empBankAC</div>
        <div id='emp_ifsc' style='display:none;'>$empBankIFSC</div>
        <div id='emp_basic_pay' style='display:none;'>$basicPresent</div>
        <div id='emp_travelAll' style='display:none;'>$travelPresent</div>
        <div id='emp_otherAll' style='display:none;'>$otherPresent</div>
        <div id='emp_bonus' style='display:none;'>$empBonus</div>
        <div id='emp_pt' style='display:none;'>$emppt</div>
        <div id='emp_pf' style='display:none;'>$emppf</div>
        <div id='emp_insurance' style='display:none;'> $empInsurance</div>
        <div id='emp_tds' style='display:none;'>$emptds</div>
        <div id='emp_other' style='display:none;'> $empother</div>
        <div id='emp_net_payable' style='display:none;'></div>
        <div id='emp_net_payable_word' style='display:none;'>$empNetPayableInWords</div>"
    ?>

    <script>
        const num1 = document.getElementById('emp_net_payable');
        const toIndianCurrency = (num) => {
            const curr = num.toLocaleString('en-IN', {
                style: 'currency',
                currency: 'INR'
            });
            return curr;
        };
        num1.innerHTML = toIndianCurrency(<?php echo $empNetPayable ?>) + " /-";
    </script>
    <script src="https://unpkg.com/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script>
    <script src="../js/FileSaver.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="../js/paySlip.js"></script>
</body>

</html>
<?php
$previousPage = $_SERVER['HTTP_REFERER'];
header("refresh:2;url=$previousPage");
?>