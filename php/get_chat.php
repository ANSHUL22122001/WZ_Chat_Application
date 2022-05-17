<?php
    

    session_start();

    include "connection.php";

    $sender_id = $_POST['sender_id'];
    $sender_name = $_POST['sender_name'];
    $reciever_id = $_POST['reciever_id'];
    $reciever_name = $_POST['reciever_name'];

    $output="";
    
    $query = "select * from messages where (SenderId = '$sender_id' and RecieverId = '$reciever_id') or (SenderId = '$reciever_id' and RecieverId = '$sender_id') order by Time";
    
    $check = mysqli_query($con, $query);
    if($check){
        if (mysqli_num_rows($check)) {

            $ciphering = "AES-128-CTR";
            $options = 0;
            $decryption_iv = '1234567891011121';
            $decryption_key = "Password";
            
            while($row = mysqli_fetch_assoc($check)){
                $time = substr($row['Time'], 11);
                $time = substr($time,0,5);
                
                $msg = openssl_decrypt($row['Msg'], $ciphering, $decryption_key, $options, $decryption_iv);
                if($row['SenderId'] == $sender_id){
                    $name = $row['SenderName'];
                    $output = $output.'<div id="user2">'.$msg.'</div>';
                }
                else{
                    $name = $row['SenderName'];
                    $output = $output.'<div id="user1">'.$msg.'</div>';
                }

            }
        }
    }
    
    else{
        echo "ERROR: Could not able to execute. " . mysqli_error($con);
    }

    echo $output;
    // echo $sender_id;
    // echo $sender_name;
    // echo $reciever_id;
    // echo $reciever_name;

?>





