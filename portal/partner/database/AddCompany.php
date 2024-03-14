<?php
    require '../../config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo ;
        // var_dump($_POST);
        if(isset($_POST['signup']) && $_POST['accept']=="on" && $_POST['email']==$_SESSION['request_email']){
            // Accept the values from the post
            $org_name = $mysqli->escape_string($_POST['company_name']);
            $tagline = $mysqli->escape_string($_POST['tagline']);
            $poc = $mysqli->escape_string($_POST['poc']);
            $phone = $mysqli->escape_string($_POST['phone']);
            $email = $mysqli->escape_string($_POST['email']);
            $password = $mysqli->escape_string($_POST['password']);
            $confirm_password = $mysqli->escape_string($_POST['confirm_password']);
            $pan = $mysqli->escape_string($_POST['pan']);
            $gst = isset($_POST['gst'])?$mysqli->escape_string($_POST['gst']):"NA";
            $logo = $_FILES['file'];
            $logo_path = '';
            // $gst = $mysqli->escape_string($_POST['gst']);
            // echo $gst;
            if($password != $confirm_password){
                $_SESSION['message'] = 'Password not matching';
                header("Location: ../Error.php");
            }
            // if(isset($_POST['gst'])){
            //     if(preg_match_all("^([0][1-9]|[1-2][0-9]|[3][0-7])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$", $gst)!=1){
            //         $_SESSION['message'] = 'Invalid GST Number';
            //         // header("Location: ../Error.php");
            //     }
            // }
            $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
            $hash = $_SESSION['request_hash'];
            // $confirm_password = $mysqli->escape_string($_POST['confirm_password']);
            // $org_name = $mysqli->escape_string($_POST['company_name']);

            // if($password==$confirm_password){
                // $password = 
            // }

            $ngo = 0;
            $sales = 0;
            $sqlGet = "select ngo, sales from partner_requests where email='".$email."'" ;
            $email_data = $mysqli->query($sqlGet) or die("Invalid request");
            if($email_data->num_rows > 0){
                $data = $email_data -> fetch_assoc();
                $ngo = $data["ngo"];
                $sales = $data["sales"];
            }
            $last_id_sql  = "select max(id) as id from company";
            $last_id = $mysqli->query($last_id_sql) or die("Invalid Request for ID");
            $last_id = $last_id->fetch_assoc();
            $last_id = (int)$last_id["id"] + 1;
            echo $last_id;
            $sql = "insert into company(id,name, email, poc, phone, password, hash, sales, ngo, gst) values (".$last_id.",'".$org_name."', '".$email."', '".$poc."', ".$phone.", '".$password."','".$hash."', '".$ngo."','".$sales."', '".$gst."')";
            $result = $mysqli->query($sql) or die("");
            // Company Details
            $sql = "insert into company_details(id, tagline) values (".$last_id.",'".$tagline."')";
            $result = $mysqli->query($sql) or die("");
            echo "Company details updated";
            // Creating folder
            // mkdir("../partner/".$email."/");
            
            // Uploading file
            $fileName = $logo['name']; 
            $fileTmpName = $logo['tmp_name'];
            $fileSize = $logo['size'];

            $fileSizeKb = round($fileSize/1024); // Rounding the file size
            $fileError = $logo['error']; // Checking error status of the uploaded image
            $fileType  = $logo['type'];

            $fileExt = explode('.', $fileName); // Getting the file extension
            $fileActualExt = strtolower(end($fileExt)); // converting extension to lowercase
            $allowedExt = array('png', 'jpg', 'jpeg');

            $userFolder = "../../../partner/".$email."/"; 


            if (in_array($fileActualExt, $allowedExt)){
                if($fileError === 0){
                    if($fileSizeKb<2048){
                        if(!is_dir($userFolder)){
                            mkdir($userFolder, 0755);
                        }
                        $newfileName = $fileName."_logo.".$fileActualExt;
                        $fileDest = $userFolder.$newfileName;
                        // $filePath  = "../../../partner/".$email."/".$newfileName;
                        if(move_uploaded_file($logo['tmp_name'],$fileDest)) {  
                            // echo ($filePath);
                            $company_details_Sql = "update company_details set logo_path='".$fileDest."' where id='".$last_id."';";
                            $result = mysqli_query($mysqli, $company_details_Sql) or die("Error in setting path");
                            // echo "File uploaded successfully!";  
                            // $updateFilePath = "UPDATE publicstory SET postfile='$fileDestinationDb' WHERE userEmail='$userEmail' and caption='$caption';";
                            // $sql = "INSERT INTO comapny_details (logo_path) VALUES ('$username', '$email', '$caption', '$dateposted')";
                            // $resultStory = mysqli_query($mysqli, $sql) or die ("SQL Failed");
                            // $updateFilePath = "UPDATE publicstory SET postfile='$fileDestinationDb' WHERE userEmail='$userEmail' and caption='$caption';";
                            // $result = mysqli_query($mysqli, $updateFilePath);
                            // header("Location: ../home.php");
                            echo "image added successfullly";
                            header("Location: ../../success.php");
    
                        } else{  
                            $_SESSION['message'] = "Sorry, file not uploaded, please try again!";  
                            header("Location: ../error.php");
                        }  
                    }else{
                        $_SESSION['message'] = 'Your files size is too big!';
                        header("Location: ../error.php");
                    }
                }else{
                    $_SESSION['message'] =  "Error in uploading file";
                    header("Location: ../error.php");
                }
            }
            else{
                echo 'You cannot upload files of this type!';
            }
            // header("Location : ./../index.html");
        }else{
            $_SESSION['message'] = 'Error';
            header('Location : ../portal/error.php');
        }
    }

?>