<?php
    session_start();
    include 'connection.php';

    $myid = $_SESSION['id'];
    $friendId = $_POST['friendwzid'];

    
    if($myid != $friendId){
        $query = "select * from users where WZ_Id='$friendId'";
        $check = mysqli_query($con, $query);
        if($check){
            if (mysqli_num_rows($check)) {
                $query1 = "select * from friends where (Friend_Id = '$friendId' and My_Id = '$myid') or (Friend_Id = '$myid' and My_Id = '$friendId')";
                $check1 = mysqli_query($con, $query1);
                if($check1){
                    if (!mysqli_num_rows($check1)) {
                        $query2 = "insert into friends(My_Id, Friend_Id) VALUES ('$myid', '$friendId')";
                        if (mysqli_query($con, $query2)) {
                            echo "success";
                        }else{
                            echo "ERROR: Could not able to execute. " . mysqli_error($con);
                        }
                    }
                    else{
                        echo "Chat already exist";
                    }
                }
                else{
                    echo "ERROR: Could not able to execute. " . mysqli_error($con);
                }
            }
            else{
                echo "No such user with this WZ_Id exist";
            }
    
        }
        else{
            echo "ERROR: Could not able to execute. " . mysqli_error($con);
        }
    }
    else{
        echo "You cann't add your WZ_Id in chat";
    }

?>