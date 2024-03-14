<?php
    require '../config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // require './PHPMailer/PHPMailerAutoload.php';
    // $email = $_GET['email'];
    // $hash = $_GET['hash'];
//  Validating the partner reqest was intiatlated by admin
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['email']) && isset($_GET['hash'])){
        $email = $mysqli->escape_string($_GET['email']);
        $hash = $mysqli->escape_string($_GET['hash']);
        $_SESSION['request_email'] = $email;
        $_SESSION['request_hash'] = $hash;
        // Validating the request 
        $validate = "select email from partner_requests where email='".$email."' and hash='".$hash."'";
        $result = $mysqli->query($validate) or die("Invalid request mysql");
        // var_dump($result);
        // echo $result->num_rows;
        if($result->num_rows > 0){
            $_SESSION["message"] = "Account creation started.";
            // header("Location: ../Success.php");
            $validate2 = "select email from company where email='".$email."';";
            // echo $validate2;
            $result2 = $mysqli->query($validate2) or die("Invalid request");
            if($result2 ->num_rows > 0){
                $_SESSION["message"] = "Account already exist.";
                echo $_SESSION["message"];
                // header("Location: ../Error.php");        
            }
            
        }else{
            $_SESSION["message"] = "Invalid Request";
            // header("Location: ../error.php");
        }
    }
    else{
        // Redirect to error page
        echo "Invalid request";
        $_SESSION["message"] = "Invalid Request 1";
        header("Location: ../error.php");
    
    }

}
    // session_start();



    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // echo ;
    //     // var_dump($_POST);
    //     if(isset($_POST['signup']) && $_POST['accept']=="on" && $_POST['email']==$_SESSION['request_email']){
    //         // Accept the values from the post
    //         $org_name = $mysqli->escape_string($_POST['company_name']);
    //         $tagline = $mysqli->escape_string($_POST['tagline']);
    //         $poc = $mysqli->escape_string($_POST['poc']);
    //         $phone = $mysqli->escape_string($_POST['phone']);
    //         $email = $mysqli->escape_string($_POST['email']);
    //         $password = $mysqli->escape_string($_POST['password']);
    //         $confirm_password = $mysqli->escape_string($_POST['confirm_password']);
    //         $pan = $mysqli->escape_string($_POST['pan']);
    //         $gst = isset($_POST['gst'])?$mysqli->escape_string($_POST['gst']):"NA";
    //         $logo = $_FILES['company_logo'];
    //         $logo_path = '';
    //         // $gst = $mysqli->escape_string($_POST['gst']);
    //         // echo $gst;
    //         if($password != $confirm_password){
    //             $_SESSION['message'] = 'Password not matching';
    //             header("Location: ../Error.php");
    //         }
    //         // if(isset($_POST['gst'])){
    //         //     if(preg_match_all("^([0][1-9]|[1-2][0-9]|[3][0-7])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$", $gst)!=1){
    //         //         $_SESSION['message'] = 'Invalid GST Number';
    //         //         // header("Location: ../Error.php");
    //         //     }
    //         // }
    //         $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    //         $hash = $_SESSION['request_hash'];
    //         // $confirm_password = $mysqli->escape_string($_POST['confirm_password']);
    //         // $org_name = $mysqli->escape_string($_POST['company_name']);

    //         // if($password==$confirm_password){
    //             // $password = 
    //         // }

    //         $ngo = 0;
    //         $sales = 0;
    //         $sqlGet = "select ngo, sales from partner_requests where email='".$email."'" ;
    //         $email_data = $mysqli->query($sqlGet) or die("Invalid request");
    //         if($email_data->num_rows > 0){
    //             $data = $email_data -> fetch_assoc();
    //             $ngo = $data["ngo"];
    //             $sales = $data["sales"];
    //         }
    //         $last_id_sql  = "select max(id) from company";
    //         $last_id = $mysqli->query($last_id_sql) or die("Invalid Request for ID");
    //         $last_id = $last_id->fetch_assoc()["id"];
    //         echo $last_id;
    //         $sql = "insert into company(id,name, email, poc, phone, password, hash, sales, ngo, gst) values ('".$last_id."','".$org_name."', '".$email."', '".$poc."', ".$phone.", '".$password."','".$hash."', '".$ngo."','".$sales."', '".$gst."')";
    //         $result = $mysqli->query($sql) or die("");
    //         // Company Details
    //         // $sql = "insert into company_details(id,logo_path, tagline) values (104,'".$org_name."', '".$email."', '".$poc."', ".$phone.", '".$password."','".$hash."', '".$ngo."','".$sales."', '".$gst."')";
    //         // $result = $mysqli->query($sql) or die("");
            
    //         // Creating folder
    //         // mkdir("../partner/".$email."/");
            
    //         // Uploading file
    //         $fileName = $logo['name']; 
    //         $fileTmpName = $logo['tmp_name'];
    //         $fileSize = $logo['size'];

    //         $fileSizeKb = round($fileSize/1024); // Rounding the file size
    //         $fileError = $logo['error']; // Checking error status of the uploaded image
    //         $fileType  = $logo['type'];

    //         $fileExt = explode('.', $fileName); // Getting the file extension
    //         $fileActualExt = strtolower(end($fileExt)); // converting extension to lowercase
    //         $allowedExt = array('png', 'jpg', 'jpeg');

    //         $userFolder = "../../partner/".$email."/"; 


    //         if (in_array($fileActualExt, $allowedExt)){
    //             if($fileError === 0){
    //                 if($fileSizeKb<2048){
    //                     if(!is_dir($userFolder)){
    //                         mkdir($userFolder, 0755);
    //                     }
    //                     $newfileName = $fileName."_logo.".$fileActualExt;
    //                     $fileDest = $userFolder.$newfileName;
    //                     $filePath  = "../../partner/".$email."/".$newfileName;
    //                     if(move_uploaded_file($logo['tmp_name'],$fileDest)) {  
    //                         // echo "File uploaded successfully!";  
    //                         // $updateFilePath = "UPDATE publicstory SET postfile='$fileDestinationDb' WHERE userEmail='$userEmail' and caption='$caption';";
    //                         $sql = "INSERT INTO comapny_details (logo_path) VALUES ('$username', '$email', '$caption', '$dateposted')";
    //                         $resultStory = mysqli_query($mysqli, $sql) or die ("SQL Failed");
    //                         $updateFilePath = "UPDATE publicstory SET postfile='$fileDestinationDb' WHERE userEmail='$userEmail' and caption='$caption';";
    //                         $result = mysqli_query($mysqli, $updateFilePath);
    //                         // header("Location: ../home.php");
    //                         echo "image added successfullly";
    
    //                     } else{  
    //                         $_SESSION['message'] = "Sorry, file not uploaded, please try again!";  
    //                         header("Location: ../error.php");
    //                     }  
    //                 }else{
    //                     $_SESSION['message'] = 'Your files size is too big!';
    //                     header("Location: ../error.php");
    //                 }
    //             }else{
    //                 $_SESSION['message'] =  "Error in uploading file";
    //                 header("Location: ../error.php");
    //             }
    //         }
    //         else{
    //             echo 'You cannot upload files of this type!';
    //         }
    //         // header("Location : ./../index.html");
    //     }else{
    //         $_SESSION['message'] = 'Error';
    //         header('Location : ../portal/error.php');
    //     }
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Css -->
    <link rel="stylesheet" href="./css/root-partner.css">
    <link rel="stylesheet" href="./css/partner_prelogin_design.css">
    <link rel="stylesheet" href="./css/addCompany.css">
    <!-- Javascript -->
    <script src="./js/addPartner/uplodImageInput.js" defer></script>
    <script src="./js/addPartner/livemapdata.js" defer></script>
    <title>Welcome to ICB! Be partner</title>
</head>
<body>
    <!-- Header -->
    <?php include"./components/header_pre_login.php";?>

<!-- Sign up form -->
    <form action="./database/AddCompany.php" method="post" class="add_partner" enctype="multipart/form-data">
        
        <div class="form_details">
        <div class="form_section" id="company_details_section">
            <!-- <legend class="input_legend company_logo">
                <input name="company_logo" type="file" required>
                <label for="company_name">Organization Name</label>
            </legend>     -->
            <img src="../images/CompanyLogoDummy.png" alt="CompanyLogo" id="partnerLogoPreview">
            <button type="button" class="partner_logo" id="partner_logo">+</button>
            <input type="file" id="partnerLogoInput" name="file" style="visibility:hidden" required>
            <div id="previewCompanyName">Company Name</div>
            <div id="previewCompanyTagLine">Tagline</div>
        </div>

        <div class="form_section" id="company_form_section">
            
            <!-- <label for="description" class="input_field_box input_field_box-90">
                <i class="fa-solid fa-pen-clip"></i>
                <input type="text" class="input_field_80 input_field_h10" name="description" placeholder="Describe about your product ..." required>
            </label>     -->
            <div class="form_section_inputs">
                <legend class="input_legend company_name">
                    <!-- <label for="company_name">Organization Name</label> -->
                        <i class="fa-solid fa-building"></i>
                        <input placeholder="Company Name" name="company_name" id="company_name" required>
                </legend>
                
                <legend class="input_legend tagline">
                    <!-- <label for="owner">Owner Name</label> -->
                        <i class="fa-solid fa-pen"></i>
                        <input placeholder="Tag Line" name="tagline" id="tagline" required>
                </legend>
                <legend class="input_legend poc">
                    <!-- <label for="owner">Owner Name</label> -->
                        <i class="fa-solid fa-user"></i>
                        <input placeholder="POC" name="poc" required>
                </legend>
                <legend class="input_legend email">
                    <!-- <label for="email">Email</label> -->
                        <i class="fa-solid fa-envelope"></i>
                        <input placeholder="Company Name" name="email" value="<?php echo $_SESSION['request_email']?>" readonly='true' required>
                </legend>
                <legend class="input_legend phone">
                    <!-- <label for="phone">Phone</label> -->
                        <i class="fa-solid">+91</i>
                        <input placeholder="Primary Phone" name="phone" type="number" max="9999999999" min="6000000000" required>
                </legend>
                <legend class="input_legend input_legend_transparent">
                    <!-- <label for="owner">Owner Name</label> -->
                        <!-- <i class="fa-solid fa-user"></i>
                        <input placeholder="POC" name="poc" required> -->
                </legend>
                <legend class="input_legend password">
                    <!-- <label for="password">Password</label> -->
                        <i class="fa-solid fa-lock"></i>
                        <input placeholder="Password" name="password" type="password" required>
                </legend>
                <legend class="input_legend confirm_password">
                    <!-- <label for="confirm_password">Confirm Password</label> -->
                        <i class="fa-solid fa-lock"></i>
                        <input placeholder="Confirm Password" name="confirm_password" type="password" required>
                </legend>
                <legend class="input_legend pan">
                    <!-- <label for="confirm_password">Confirm Password</label> -->
                        <i class="fa-solid fa-address-card"></i>
                        <input placeholder="PAN ID" name="pan" type="text" maxlength="10" minlength="10" required>
                </legend>
                <legend class="input_legend gst">
                    <!-- <label for="confirm_password">Confirm Password</label> -->
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        <input placeholder="GST (If applicable)" name="gst" type="text" pattern="^([0][1-9]|[1-2][0-9]|[3][0-7])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$">
                </legend>
            </div>
            <legend>
                <input  name="accept" type="checkbox" required>
                <label for="accept"> I accept to the Terms and Conditions of the organization.
            </legend>
        </div>

        </div>
        </div>

        

        
        <!-- <button name="signup">Sign Up</button> -->
        <div class="submit_btn">
        <button type="submit" name="signup" class="signup" value="signup">Sign Up <i class="fa-solid fa-circle-chevron-right "></i></button>
        </div>
    </form>
</body>
</html>