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
        a{
            text-decoration:none;
            color: black;
        }
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

        .con .header {
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0077fb;
        }
        .con .header img{
            margin-left: 20px;
            border-radius: 50%;
            width: 60px;
            height: 60px;
        }
        .con .header .profile{
            flex: 1;
            margin: 0px 20px;
        }
        .con .header .profile h1{
            color: white;
        }
        .con .header .profile p{
            color: white;
        }
        .con .header .profile-logout{
            /* margin-top: 13px; */
            padding: 10px;
            border-radius: 50%;
            margin-right: 30px;
            cursor: pointer;
            /* background-color: red; */
            font-size:30px;
            color: white;
        }
        .con .header .profile-logout:hover{
            background-color:white;
            color: black;
        }

        .con .searchBox{
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;  
        }
        .con .searchBox{
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;  
        }
        .con .searchBox .input-field{
            flex: 1;
            outline: none;
            border: none;
            padding: 15px;
            font-size:20px;
            margin: 10px;
            border-radius: 10px;
        }
        .con .searchBox .input-button{
            
            outline: none;
            border: none;
            margin: 5px;
            margin-right: 30px;
            padding: 15px 20px;
            font-size:15px;
            cursor: pointer;
            border-radius: 10px;
            background-color: #0077fb;
            font-weight: 800;
        }
        .con .searchBox .input-button i{
            font-size: 20px;
            color: white;
        }

        .con .friendlist {
            overflow-y: auto;
            background-color: white;
            flex: 1;
        }
        .con .friendlist .friend{
            height: 90px;
            width: 100%;
            background-color:rgb(233, 229, 229);
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            align-items: center;
            margin-bottom: 5px;
        }
        .con .friendlist .friend:hover{
            background-color:rgb(173, 171, 171);
        }
        .con .friendlist .friend img{
            margin-left: 20px;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .con .friendlist .friend img{
            margin-left: 20px;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        .con .friendlist .friend .profile{
            flex: 1;
            margin: 0px 20px;
            font-size: 18px;
        }
        .con .friendlist .friend .profile-info{
            /* margin-top: 13px; */
            padding: 10px;
            border-radius: 50%;
            margin-right: 30px;
            cursor: pointer;
            /* background-color: red; */
            font-size:25px;
            /* color: white; */
            /* box-shadow: rgba(0, 0, 0, 1); */
        }
        .con .friendlist .friend .online{
            background: #9ec94a;
        }
        .con .friendlist .friend .offline{
            background: #fd7274;
        }

    </style>
</head>

<body>
    <div class="con">
        <div class="header">
            <img src="https://previews.123rf.com/images/mialima/mialima1603/mialima160300025/55096766-male-user-icon-isolated-on-a-white-background-account-avatar-for-web-user-profile-picture-unknown-ma.jpg">

            <div class="profile">
                <h1><?php echo $_SESSION['name'] ?></h1>
                <p><span style="font-weight: 800;">WZ_Id: </span><?php echo $_SESSION['id'] ?></p>

            </div>
            <a href="php/logout.php">
                <div class="profile-logout">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
            </a>
        </div>
        <div>
            <form class="searchBox" id="createchatform">
                    <input type="text" id="friendwzid" name="friendwzid" placeholder="Create new chat" autocomplete="off" class="input-field">
                    <button id="button" class="input-button" onClick=CreateChat()><i class="fas fa-plus"></i></button>
            </form>
        </div>
        <div id="error" style="font-weight:500;color:red;font-size:22px;margin-left:18px;"></div>

        <div class="friendlist" id="userslist">
        </div>
    </div>
    <script>
        const formDetail = document.getElementById("createchatform");
        formDetail.onsubmit=(e)=>{
            e.preventDefault();
        }
        const CreateChat=()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/createChat.php",true);
            xhr.onload=()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(data == "success"){
                            document.getElementById("friendwzid").value = "";
                        }
                        else{
                            document.getElementById("error").innerHTML = data;
                            document.getElementById("friendwzid").value = "";
                            setTimeout(function() {
                                document.getElementById("error").innerHTML = "";
                            }, 7000);
                        }
                    }
                }
            }
            let formData = new FormData(formDetail);
            xhr.send(formData);
        }
        const set_friend = (e)=>{
            // console.log(e);
            let friendForm = "form"+e;
            console.log(friendForm);
            const friendDetail = document.getElementById(friendForm);
            friendDetail.onsubmit=(e)=>{
                e.preventDefault();
            }
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/set_friend.php",true);
            xhr.onload=()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        location.href="chatPage.php";
                    }
                }
            }
            let formData = new FormData(friendDetail);
            xhr.send(formData);
        }
        setInterval(()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("GET","php/users.php",true);
            xhr.onload=()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        
                        document.getElementById("userslist").innerHTML = data;
                    }
                }
            }
            xhr.send();
        },1000);
    </script>
</body>

</html>