<?php
session_start();



    include 'connection.php';

    $userdetail = $_POST['userdetail'];
    $password = $_POST['password'];

    if(!empty($userdetail) && !empty($password)){
        if(filter_var($userdetail, FILTER_VALIDATE_EMAIL)){
            $query = "select * from users where Email = '$userdetail' and Password='$password'";
            $check = mysqli_query($con, $query);
            if($check){
                if (mysqli_num_rows($check)) {
                    // Email exist
                    $query1 = "update users SET Status='online' WHERE Email='$userdetail'";
                    if(mysqli_query($con, $query1)){                  
                        $row = mysqli_fetch_assoc($check);
                        $_SESSION['id'] = $row['WZ_Id'];
                        $_SESSION['name'] = $row['Name'];
                        $_SESSION['status'] = $row['Status'];
    
                        echo "success";
                    }
                }
                else{
                    echo "Email or password is incorrect";
                }
            }
            else{
                echo "ERROR: Could not able to execute. " . mysqli_error($con);
            }
        }
        else if(is_numeric($userdetail)){
            $query = "select * from users where WZ_Id = '$userdetail'";
            $check = mysqli_query($con, $query);
            if($check){
                if (mysqli_num_rows($check)) {
                    // WZ_Id exist 
                    $query1 = "update users SET Status='online' WHERE WZ_Id='$userdetail'";
                    if(mysqli_query($con, $query1)){                  
                        $row = mysqli_fetch_assoc($check);
                        $_SESSION['id'] = $row['WZ_Id'];
                        $_SESSION['name'] = $row['Name'];
                        $_SESSION['status'] = $row['Status'];
    
                        echo "success";
                    }
    
                }
                else{
                    echo "WZ_Id or password is incorrect";
                }
            }
            else{
                echo "ERROR: Could not able to execute. " . mysqli_error($con);
            }
        }
        else{
            echo "WZ_Id or email is incorrect";
        }
    }
    else{
        echo "All input fields are required";
    }

?>