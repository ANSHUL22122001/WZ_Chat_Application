<?php

    include 'connection.php';
    date_default_timezone_set("Asia/Kolkata");
    $email = $_POST['email'];

    $query = "select * from users where Email='$email'";
    $check = mysqli_query($con, $query);
    
    // echo 'here';
    if($check){
        if (mysqli_num_rows($check)) {
            echo 'Email already exist try a new one';
        }
        else{
            $id = rand(time(),10000000);
            $name = $_POST['name'];
            $password = $_POST['password'];
            $status = "offline";
            $newquery = "insert into users(WZ_Id, Name, Email, Password, Status) VALUES ('$id','$name','$email','$password','$status')";
            if (mysqli_query($con, $newquery)) {
                echo 'success';
            }else{
                echo "ERROR: Could not able to execute. " . mysqli_error($con);
            }
        }
    }
    else{
        echo "ERROR: Could not able to execute. " . mysqli_error($con);
    }
?>