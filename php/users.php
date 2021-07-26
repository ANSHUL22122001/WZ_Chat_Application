<?php

    session_start();

    include "connection.php";

    $myid = $_SESSION['id'];
    $friendName = "";
    $friendStatus = "";
   
    $output = "";
    $query = "select * from friends where My_Id = '$myid' or Friend_Id = '$myid' order by Time DESC" ;
    $check = mysqli_query($con, $query);
    if($check){
        if (mysqli_num_rows($check)) {
            while($row = mysqli_fetch_assoc($check)){
                if($myid == $row['My_Id']){
                    
                    $friendTime = substr($row['Time'],0,10);
                    $friendId = $row['Friend_Id'];
                    $query1 = "select * from users where WZ_Id = $friendId";
                    $check1 = mysqli_query($con, $query1);
                    $rows = mysqli_fetch_assoc($check1);

                    
                    $friendName = $rows['Name'];
                    $friendStatus = $rows['Status'];
                    $output = $output.'<div  class="friend" onClick=set_friend("'.$friendId.'")>
                                            <form id="form'.$friendId.'">
                                            
                                                <input type="text" name="friendId" value="'.$friendId.'" style="display: none">
                                                <input type="submit" style="display: none;">
                                            
                                            </form>
                                            <img src="https://previews.123rf.com/images/mialima/mialima1603/mialima160300025/55096766-male-user-icon-isolated-on-a-white-background-account-avatar-for-web-user-profile-picture-unknown-ma.jpg">
                                            <div class="profile">
                                            <h1>'.$friendName.' <span style="font-size:15px; color:grey;">'.$friendTime.'</span></h1>
                                            <p>Last msg</p>
                                            </div>
                                            <div class="profile-info '.$friendStatus.'"></div>
                                        </div>';
                }
                else if($myid == $row['Friend_Id']){
                    
                    $friendTime = substr($row['Time'],0,10);
                    $friendId = $row['My_Id'];
                    $query1 = "select * from users where WZ_Id = $friendId";
                    $check1 = mysqli_query($con, $query1);
                    $rows = mysqli_fetch_assoc($check1);

                    
                    $friendName = $rows['Name'];
                    $friendStatus = $rows['Status'];
                    
                    $output = $output.'<div  class="friend" onClick=set_friend("'.$friendId.'")>
                                            <form id="form'.$friendId.'">
                                                <input type="text" name="friendId" value="'.$friendId.'" style="display: none">
                                                <input type="submit" style="display: none;">
                                            </form>
                                            <img src="https://previews.123rf.com/images/mialima/mialima1603/mialima160300025/55096766-male-user-icon-isolated-on-a-white-background-account-avatar-for-web-user-profile-picture-unknown-ma.jpg">
                                            <div class="profile">
                                            <h1>'.$friendName.' <span style="font-size:15px; color:grey;">'.$friendTime.'</span></h1>
                                            <p>Last msg</p>
                                            </div>
                                            <div class="profile-info '.$friendStatus.'"></div>
                                        </div>';

                }
            }
        }
    }

    echo $output;

?>

<?php
/******************************************************************************

Welcome to GDB Online.
GDB online is an online compiler and debugger tool for C, C++, Python, Java, PHP, Ruby, Perl,
C#, VB, Swift, Pascal, Fortran, Haskell, Objective-C, Assembly, HTML, CSS, JS, SQLite, Prolog.
Code, Compile, Run and Debug online from anywhere in world.

*******************************************************************************/
// date_default_timezone_set('Asia/Kolkata');

// $r = date("Y-m-d");
// $e = date("H:i:s");
// echo $r." ".$e;


?>
