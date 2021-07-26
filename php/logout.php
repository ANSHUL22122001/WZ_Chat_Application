<?php
    session_start();
    include 'connection.php';
    $id = $_SESSION['id'];
    $query1 = "update users SET Status='offline' WHERE WZ_Id='$id'";

    if(mysqli_query($con, $query1)){                  
        session_destroy();
        header('location: ../account/login.php');
    }
    else{
        session_destroy();
        header('location: ../account/login.php');
    }
?>