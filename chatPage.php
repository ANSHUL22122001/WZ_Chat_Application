<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header('location: account/login.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Website</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: calibri;
            background-color: skyblue;
        }

        .con {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #head {
            width: 100%;
            height: 70px;
            display: flex;
            align-items: center;
            background-color: #0077fb;
        }
        #head i{
            margin: 0px  10px;
            font-size: 30px;
            font-weight: 1000;
            padding: 10px;
            color: white;
            cursor: pointer;
            border-radius: 50%;
        }
        #head i:hover{
            background-color: white;
            color: black;
        }
        #head img{
            /* margin-left: 10px; */
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }
        #head .profile{
            margin: 0px 20px;
        }
        #head .profile h1{
            color: white;
        }
        #head .profile p{
            color: white;
        }

        #body {
            overflow-y: auto;
            background-color: white;
            flex: 1;
            padding: 10px 20px;
            padding-left: 50px;
        }

        #sendmsg {
            width: 100%;
            height: 90px;
            display: flex;
            justify-content:space-between;
            align-items:center;
            background-color: #0077fb;
            padding: 10px 20px;
            padding-left: 50px;
        }
        @media(max-width: 765px){

            #body {
                padding-left: 10px;
            }

            #sendmsg {
                padding-left: 10px;
            }            
        }

        #sendmsgfield {
            flex: 1;
            outline: none;
            border: none;
            padding: 15px;
            font-size:18px;
            margin: 10px;
            border-radius: 50px;
        }
        #button{
            outline: none;
            border: none;
            margin: 10px;
            margin-right: 30px;
            padding: 15px;
            font-size:15px;
            cursor: pointer;
            border-radius: 5px;
            font-weight: 800;
            background-color: #edefed;
        }
        
        #button i{
            font-size:20px;
        
        }

        #user1 {
            padding: 10px;
            float: left;
            margin: 5px;
            max-width: 70%;
            display: table;
            clear: both;
            margin: 10px;
            margin-left: 15px;
            font-weight: 800;
            font-size: 20px;
            background-image: linear-gradient(to right, #0356b4, #edefed);
            border: 1px solid #edefed;
            border-radius: 10px;
        }

        #user2 {
            padding: 10px;
            float: right;
            max-width: 70%;
            background-image: linear-gradient(to left, #0356b4, black);
            border-radius: 10px;
            font-weight: 800;
            font-size: 20px;
            margin: 5px;
            color: white;
            margin-right: 15px;
            display: table;
            clear: both;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="con">
        <?php
            include 'php/connection.php';

            $friend = $_SESSION['friend'];

            
            $query = "select * from users where WZ_Id=$friend" ;
            $check = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($check);
        
        ?>
        <div id="head">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
            <img src="https://media.wired.com/photos/598e35994ab8482c0d6946e0/master/w_1600,c_limit/phonepicutres-TA.jpg">

            <div class="profile">
                <h1><?php echo $row['Name']; ?></h1>
                <p><?php echo $row['Status']; ?></p>

            </div>
        </div>
        <div id="body">
        </div>
        <form id="sendmsg">
            <input type="text" style="display:none" name="sender_id" value="<?php echo $_SESSION['id']; ?>">
            <input type="text" style="display:none" name="sender_name" value="<?php echo $_SESSION['name']; ?>">
            <input type="text" style="display:none" name="reciever_id" value="<?php echo $row['WZ_Id']; ?>">
            <input type="text" style="display:none" name="reciever_name" value="<?php echo $row['Name']; ?>">
            <input type="text" name="msg" id="sendmsgfield" placeholder="Enter your Message..." autocomplete="off">
            <button type="submit" id="button" onClick=insert_chat()>Send <i class="fab fa-telegram-plane"></i></button>
        </form>
    </div>
    <script>
        const sendmsg = document.getElementById("sendmsg");
        sendmsg.onsubmit=(e)=>{
            e.preventDefault();
        }
        const insert_chat=()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/insert_chat.php",true);
            xhr.onload=()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(data == "success"){
                            document.getElementById("sendmsgfield").value = "";
                            console.log(data);
                        }
                    }
                }
            }
            let formData = new FormData(sendmsg);
            xhr.send(formData);
        }
        
        setInterval(()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/get_chat.php",true);
            xhr.onload=()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        document.getElementById("body").innerHTML = data;
                    }
                }
            }
            let formData = new FormData(sendmsg);
            xhr.send(formData);
        },1000);

    </script>
</body>

</html>