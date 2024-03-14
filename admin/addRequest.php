<?php
    // Importing the config files
    require "../portal/config.php";
    require "../portal/PHPMailer/PHPMailerAutoload.php";
    

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    //   if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)){
    //     header("Location: ../portal/index.php");
    //   }
    //   if (!isset($_SESSION['type'])){
    //     header("Location: ../portal/index.html");
    //   }

    date_default_timezone_set("Asia/Kolkata");

    if($_SERVER['REQUEST_METHOD']=="POST" && $_SESSION['type']=='admin'){
        $email  = $mysqli->escape_string($_POST['email']);
        $user_id = $_SESSION['id'];
        $time = date("Y/m/d H:i:s");
        $company_name = $mysqli->escape_string($_POST['owner']);
        $hash = $mysqli->escape_string(hash('sha512', md5(rand(99,9999))));
        $refer = isset($_POST['refer'])?$mysqli->escape_string($_POST['refer']):"NA";
        $ngo = isset($_POST['ngo'])?$mysqli->escape_string($_POST['ngo']):0;
        // echo $ngo;
        $sales = isset($_POST['sales'])?$mysqli->escape_string($_POST['sales']):0;
        // echo $ngo;
        
        $sql = "INSERT INTO partner_requests VALUES ('".$email."', '".$hash."', '".$time."', ".$user_id.", ".$ngo." , ".$sales.",'".$refer."');";

        // echo $sql;
        // Sending mail
        $mail = new PHPMailer;
        // PHP Mailer Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'i@careforbharat.in';
        $mail->Password = 'Bharat@Buzz#TY2';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';

        $mail->setFrom('i@careforbharat.in', 'Care for Bharat');
        $mail->addAddress($email, $company_name);
        $mail->addReplyTo('i@careforbharat.in', 'Care for Bharat');

        $mail->isHTML(true);

        $mail->Subject = 'Welcome to Care For Bharat | careforbharat.in';
        $mail->Body    = "
        <html>
        <body>
        <a href=\"http://localhost/icb-1/portal/partner/AddCompany.php?email=".$email."&hash=".$hash.">Link</a>
        </body>
        </html>";
        // $mail->AltBody = 'Welcome! '.$company_name.',<br/>We&rsquo;re excited to have you get started. First, you need to confirm your account. Just click the link given below.<br/>https://careforbharat.in/portal/verify.php?email='.$newUserEmail.'&hash='.$hash.'<br/><br/>If you have any questions, then please email us at <a href=\"mailto:i@careforbharat.in\" target=\"_blank\" style=\"color: #777777;\">i@careforbharat.in</a> or call us at <a href=\"tel:8421776790\" target=\"_blank\" style=\"color: #777777;\">(+91) 8421776790</a> Mon-Fri 10am-6pm, we&rsquo;re always happy to help out.';
            
        if(!$mail->send()) {
            echo "<script>alert('Mail couldn't be send!')</script>";
        }else{
            $_SESSION['message'] = "User registered successfully. Please verify your email!";
            $result = mysqli_query($mysqli, $sql) or die("Error");
            // Redirect to success.php
            // header("Location: success.php");
            $mysqli->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Partner</title>
</head>
<body>
    <form action="addRequest.php" method="POST" class="add_partner">
        <legend class="input_legend company_name">
            <label for="email">Organization Email</label>
            <input placeholder="Email" name="email" required>
        </legend>
        <legend class="input_legend owner">
            <label for="owner">Organization Name</label>
            <input placeholder="Owner" name="owner" required>
        </legend>
        <legend class="refer">
            <label for="refer">Reffered By</label>
            <input placeholder="Reffered By" name="refer">
        </legend>
        <legend class="sales">
            <label for="sales">sales</label>
            <input type="checkbox" name="sales" value="1">
        </legend>
        <legend class="ngo">
            <label for="ngo">ngo</label>
            <input type="checkbox" name="ngo" value="1">
        </legend>

        <input type="submit" value="Add">
    </form>
</body>
</html>