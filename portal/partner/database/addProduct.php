<?php
    require '../../config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product_name = $mysqli->escape_string($_POST['product_name']);
        $keywords = $mysqli->escape_string($_POST['keywords']);
        $category = $mysqli->escape_string($_POST['category']);
        // Price
        $mrp = $mysqli->escape_string($_POST['mrp']);
        $icb_price = $mysqli->escape_string($_POST['icb_price']);
        // Product_description
        $description = $mysqli->escape_string($_POST['description']);
        $feature_1 = $mysqli->escape_string($_POST['feature_1']);
        // If more than one feature modify here
        $additional_spec_key_1 = $mysqli->escape_string($_POST['additional_spec_key_1']);
        $additional_spec_value_1 = $mysqli->escape_string($_POST['additional_spec_value_1']);
        // For multipl specs add here
        $faq_1_key = $mysqli->escape_string($_POST['faq_1_key']);
        $faq_1_value = $mysqli->escape_string($_POST['faq_1_value']);
        

        // Features JSON convertion
        $count = 1;
        $features_data = '{';
        while(isset($_POST['feature_'.$count])){
            $features_data.='"'.$count.'":"'.$_POST['feature_'.$count].'" ,';
            $count++;
        }
        $features_data = substr($features_data,0,-1);
        $features_data.='}';
        // echo $features_data;

        // Additonal information JSON convertion
        $count = 1;
        $additonal_data = '{';
        while(isset($_POST['additional_spec_key_'.$count]) and isset($_POST['additional_spec_value_'.$count])){
            $additonal_data.='"'.$_POST['additional_spec_key_'.$count].'":"'.$_POST['additional_spec_value_'.$count].'" ,';
            $count++;
        }
        $additonal_data = substr($additonal_data,0,-1);
        $additonal_data.='}';
        // echo $additonal_data;



        // FAQ JSON convertion
        $count = 1;
        $faq_data = '{';
        while(isset($_POST['faq_'.$count.'_key']) and isset($_POST['faq_'.$count.'_value'])){
            $faq_data.='"question'.$count.'":"'.$_POST['faq_'.$count.'_key'].'" ,';
            $faq_data.='"answer'.$count.'":"'.$_POST['faq_'.$count.'_value'].'" ,';
            $count++;
        }
        $faq_data = substr($faq_data,0,-1);
        $faq_data.='}';
        // echo $faq_data;

        // var_dump($_FILES["file"]["tmp_name"]);

        $sql = "insert into product(name, owner_id,price, productImg,mrp) values ('".$product_name."', ".$_SESSION['id'].", ".$icb_price.", '"."img"."', ".$mrp.");";
        $result_add_product = mysqli_query($mysqli, $sql) or die("Error in creating product"); // 1
        // echo $sql;
        $sql_get_product_id = "select id from product where name='".$product_name."';";
        // echo $sql_get_product_id;
        // $sql_get_product_id_value = 1006;
        $sql_get_product_id_value = mysqli_query($mysqli, $sql_get_product_id) or die("Error in fetching product id"); //2
        $sql_get_product_id_value = $sql_get_product_id_value->fetch_assoc();
        $sql_get_product_id_value = $sql_get_product_id_value['id'];
        $sql2 = "insert into product_details(id, description, features, additional_info, faq) values(".$sql_get_product_id_value.", '".$description."' , '".$features_data."',  '".$additonal_data."', '".$faq_data."');";
        // echo $sql2;
        $result_add_product_details = mysqli_query($mysqli, $sql2) or die("Error in adding product additional details"); // 3


        $_image = $_FILES['file'];
        // var_dump($_image);

        $image_path = "{";
        $product_image = "";
        if(!empty($_FILES['file'])){
            foreach($_FILES["file"]["name"] as $key=>$tmp_name){
                $file_name = $_image["name"][ $key];
                $fileTmpName = $_image['tmp_name'][ $key];
                $fileSize = $_image['size'][ $key];
                $fileSizeKb = round($fileSize/1024); // Rounding the file size
                $fileError = $_image['error'][ $key]; // Checking error status of the uploaded image
                $fileType  = $_image['type'][ $key];

                $fileExt = explode('.', $file_name); // Getting the file extension
                $fileActualExt = strtolower(end($fileExt)); // converting extension to lowercase
                $allowedExt = array('png', 'jpg', 'jpeg');

                $userFolder = "../../../partner/".$_SESSION['email']."/".$sql_get_product_id_value."/"; 
                // mkdir($userFolder);
                // $tmp_name = $_FILES['file']['tmp_name'][$key];
                // echo $tmp_name;
                if (in_array($fileActualExt, $allowedExt)){
                    if($fileError === 0){
                        if($fileSizeKb<2048){
                            if(!is_dir($userFolder)){
                                mkdir($userFolder, 0755);
                            }
                            $newfileName = $file_name;
                            // echo $newfileName;
                            $fileDest = $userFolder.$newfileName;
                            // echo $fileDest;
                            // $filePath  = "../../../partner/".$email."/".$newfileName;
                            if(move_uploaded_file($_image['tmp_name'][$key],$fileDest)) {  
                                // echo ($filePath);
                                $file_des = substr($fileDest, 9);
                                $image_path.='"'.$key.'": "'.$file_des.'", ';
                                if($key==0){
                                    $product_image = $file_des;
                                }        
                            } else{  
                                $_SESSION['message'] = "Sorry, file not uploaded, please try again!";  
                                header("Location: ../../error.php");
                            }  
                        }else{
                            $_SESSION['message'] = 'Your files size is too big!';
                            header("Location: ../../error.php");
                        }
                    }else{
                        $_SESSION['message'] =  "Error in uploading file";
                        header("Location: ../../error.php");
                    }
                }
                else{
                    $_SESSION['message'] ='You cannot upload files of this type!';
                    header("Location: ../../error.php");
                }

            }
            $image_path = substr($image_path, 0,-2);
            $image_path.='}';
        }

        // echo $image_path;

        // echo gettype($_FILES['file']['name']);

        // echo count($_FILES['file']['name']);
        // if(!empty($_FILES['file'])){
        //     foreach ($_FILES['file']['name'] as $key => $name){
        //         $tmp_name = $_FILES['myfiles']['tmp_name'][$key];
        //         echo $tmp_name;
        //     }
            
        //     $_image = $_FILES['file'];
        //     // var_dump($_image);
        // }

        // foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name){
        //     $file_name=$_FILES["file"]["name"][$key];
        //     echo $file_name;
        // }

        $update_image_path_sql =  "update product set productImg='".$product_image."' where id = ".$sql_get_product_id_value.";";
        $result_update_image_single = mysqli_query($mysqli, $update_image_path_sql) or die("Error in updating single image"); // 3

        $update_all_image_sql = "update product_details set photos_paths='".$image_path."' where id=".$sql_get_product_id_value.";";
        $result_update_image_multiple = mysqli_query($mysqli, $update_all_image_sql) or die("Error in updating multiple images"); // 3

        // Details required from customer
        $req_customer_name = $mysqli->escape_string($_POST['customer_name']);
        $req_customer_phone = $mysqli->escape_string($_POST['customer_phone']);
        $req_email = $mysqli->escape_string($_POST['email']);
        $req_order_quantity = $mysqli->escape_string($_POST['order_quantity']);
        $req_pan_card = isset($_POST['pan_card'])?$mysqli->escape_string($_POST['pan_card'])=="on"?1:0:0;
        $req_aadhar_card = isset($_POST['aadhar_card'])?$mysqli->escape_string($_POST['aadhar_card'])=="on"?1:0:0;
        // Additional Data required
        $req_data_req_1=NULL;
        $req_data_req_2=NULL;
        $req_data_req_3=NULL;
        $req_data_req_4=NULL;
        $req_data_req_5=NULL;
        $req_data_req_6=NULL;
        $count = 1;
        while(isset($_POST['data_req_'.$count])){
            switch($count){
                case 1:
                    $req_data_req_1=$_POST['data_req_'.$count];
                    break;
                case 2:
                    $req_data_req_2=$_POST['data_req_'.$count];
                    break;
                case 3:
                    $req_data_req_3=$_POST['data_req_'.$count];
                    break;
                case 4:
                    $req_data_req_1=$_POST['data_req_'.$count];
                    break;
                case 5:
                    $req_data_req_1=$_POST['data_req_'.$count];
                    break;
                case 6:
                    $req_data_req_1=$_POST['data_req_'.$count];
                    break;
            }
        }
        // $req_data_req_1 = $mysqli->escape_string($_POST['data_req_1']);

        $sql_data_req = "insert into customer_required_details(company_id, product_id,col_1_data,col_2_data,col_3_data,col_4_data,col_5_data,col_6_data, pan, aadhar) values (".$_SESSION["id"].", ".$sql_get_product_id_value.", '".$req_data_req_1."','".$req_data_req_2."','".$req_data_req_3."','".$req_data_req_4."','".$req_data_req_5."','".$req_data_req_6."',".$req_pan_card.", ".$req_aadhar_card.");";
        $result_customer_additional_details = mysqli_query($mysqli, $sql_data_req) or die("Error in adding product additional details"); // 4

        // var_dump($sql_data_req);
        echo "All details added successfully";
        header('Location: ../myproducts.php');
    }
    else{
        $_SESSION['message'] = 'Invalid Request';
        header('Location: ../../error.php');
    }

?>