<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <title>WZ_Chat Login</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            a{
                text-decoration: none;
            }
            body{
                background-color: rgb(241, 240, 240);
            }
            .login .login-block{
                background-color: white;
                border: 1px solid rgb(161, 161, 161);
                margin-top: 40px;
                padding: 10px 40px;
            }
            .login .login-block .login-header{
                margin-top: 20px;
            }
            .login .login-block .login-header h2{
                font-size: 40px;
            }
            .login .login-block .login-body{
                margin-top: 40px;
            }
            .login .login-block .login-body input{
                margin: 10px 5px;
            }
            .login .login-block .login-break{
                font-size:20px;
                color: rgb(161, 161, 161);
                margin-top: 10px;
            }
            .login .login-block .login-break .line1{
               border-top: 1px solid rgb(161, 161, 161);
            }
            .login .login-block .login-auth{
               margin-top: 10px;
            }
            .login .login-block .login-auth h4{
                color: rgb(3, 3, 90);
               font-size: 20px;
            }
            .login .login-block .login-auth h4 i{
               margin: 1px 5px;
               font-size: 22px;
            }
            .login .login-block .login-auth p{
               font-size: 15px;
               margin-top: 15px;
            }
            .login .login-block .login-body .pswrd{
                display:flex;
                justify-content: center;
                align-items: center;
            }
            @media(max-width:575px){
                .login .login-block{
                    background-color: rgb(241, 240, 240);
                    border: none;
                    margin-top: 50px;
                    padding: 10px 30px;
                }

            }

        </style>
    </head>
    <body>
        <section class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 col-md-3 col-lg-4"></div>
                    <div class="col-sm-8 col-md-6 col-lg-4 login-block">
                        <div class="login-header">
                            <center><h2>WZ_Chat</h2></center>
                        </div>
                        <form class="login-body" method="POST" action="#" id="loginform">
                            <input type="text" class="form-control" placeholder="Enter your email or WZ_Id" name="userdetail" id="userdetail">
                            <div id="userdetailerror" class="text-danger"></div>
                            <div class="pswrd">
                                <input type="password" class="form-control" placeholder="Password" id="toglefield" name="password">
                                <div class="btn btn-secondary" id="toglebtn" onClick=toggling() >Show</div>
                            </div>
                            <div id="passworderror" class="text-danger"></div>
                            <button class="btn btn-primary" style="width: 100%;" onClick="login()">Log In</button>
                            <div id="error" class="text-danger text-center" style="margin-top: 10px"></div>
                        </form>
                        <div class="login-break">
                            <center>OR</center>
                        </div>
                        <div class="login-auth">
                            <center>
                                <h4><i class="fab fa-facebook-square"></i>Log in with Facebook</h4>
                                <a href="#"><p>Forgot password?</p></a>
                                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-3 col-lg-4"></div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script>
            const toglefield = document.getElementById("toglefield");
            const toglebtn = document.getElementById("toglebtn");
            const toggling=()=>{
                if(toglefield.type == "password"){
                    toglefield.type = "text";
                    toglebtn.innerHTML = "Hide";
                }
                else{
                    toglefield.type = "password";
                    toglebtn.innerHTML = "Show";
                }
            }

            const formDetail = document.getElementById("loginform");
            formDetail.onsubmit=(e)=>{
                e.preventDefault();
            }
            const login=()=>{
                let xhr = new XMLHttpRequest();
                xhr.open("POST","../php/login.php",true);
                xhr.onload=()=>{
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status === 200){
                            let data = xhr.response;
                            if(data == "success"){
                                location.href="../index.php";
                            }
                            else{
                                document.getElementById("error").innerHTML = data;
                            }
                        }
                    }
                }
                let formData = new FormData(formDetail);
                xhr.send(formData);
            }
        </script>
    </body>
</html>