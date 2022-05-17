<?php

session_start();

    include "connection.php";

    $sender_id = $_POST['sender_id'];
    $sender_name = $_POST['sender_name'];
    $reciever_id = $_POST['reciever_id'];
    $reciever_name = $_POST['reciever_name'];
    $msg = $_POST['msg'];

    if(!empty($msg)){
        $ciphering = "AES-128-CTR";
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "Password";
        $encryption = openssl_encrypt($msg, $ciphering, $encryption_key, $options, $encryption_iv);
        
        $query1 = "insert into messages(SenderId, SenderName, RecieverId, RecieverName, Msg) VALUES ('$sender_id', '$sender_name', '$reciever_id', '$reciever_name', '$encryption')";
        
        $check1 = mysqli_query($con, $query1);
        if($check1){
            echo "success";
        }
        else{
            echo "ERROR: Could not able to execute. " . mysqli_error($con);
        }
    }
    else{
        echo "error";
    }
?>
