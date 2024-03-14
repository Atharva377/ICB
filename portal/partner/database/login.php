<?php
    require '../../config.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $mysqli->escape_string($_POST['email']);
            $password = $_POST['password'];
            $query = $mysqli->query('select * from company where email="'. $email .'";');

            if($query->num_rows > 0){
                $row = $query->fetch_assoc();
                if(password_verify($password, $row['password'])){
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['poc'] = $row['poc'];
                    $_SESSION['sales'] = $row['sales'];
                    $_SESSION['ngo'] = $row['ngo'];
                    $_SESSION['type'] = "partner";
                    $data = $mysqli->query('select * from company_details where id="'. $_SESSION['id'] .'";');
                    if($data->num_rows > 0){
                        $data = $data->fetch_assoc();
                        $_SESSION['tagline'] = $data['tagline'];
                        $_SESSION['logo_path'] = substr($data['logo_path'], 3);
                        $_SESSION['partner_logged_in'] = true;
                    }
                    header('Location: ../dashboard.php');
                    
                }else{
                    $_SESSION["message"] = "Invalid username or password";
                    header("Location: ../../error.php");
                    
                }
            }else{
                $_SESSION["message"] = "No user found";
                header("Location: ../../error.php");
                
            }
        }else{
            $_SESSION["message"] = "Invalid request";
            header("Location: ../../error.php");
        }
    }
?>