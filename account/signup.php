<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <title>WZ_Chat signup</title>
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
            .signup .signup-block{
                background-color: white;
                border: 1px solid rgb(161, 161, 161);
                margin-top: 40px;
                padding: 10px 30px;
            }
            .signup .signup-block .signup-header{
                margin-top: 20px;
            }
            .signup .signup-block .signup-header h2{
                font-size: 40px;
            }
            .signup .signup-block .signup-auth{
                margin-top: 20px;
            }
            .signup .signup-block .signup-auth h4{
                font-size: 20px;
                color: rgb(161, 161, 161);
            }
            .signup .signup-block .signup-auth .btn-auth{
                border: 1px solid rgb(161, 161, 161);
                color: rgb(161, 161, 161);
                border-radius: 5px;
                margin: 5px 5px;
                padding: 3px 5px;
                font-size: 15px;
                background-color:white;
                width: 100%;
            }
            .signup .signup-block .signup-auth .btn-auth i{
                font-size:18px;
                color: rgb(3, 3, 90);
                margin: 1px 5px;
            }
            .signup .signup-block .signup-space{
                font-size:20px;
                color: rgb(161, 161, 161);
                text-align: center;
                margin-top: 10px;
            }
            .signup .signup-block .signup-space p{
                font-size:15px;
            }
            .signup .signup-block .signup-body{
                margin-top: 15px;
            }
            .signup .signup-block .signup-body .pswrd{
                display:flex;
                justify-content: center;
                align-items: center;
            }
            .signup .signup-block .signup-body input{
                margin: 10px 5px;
            }
            
            @media(max-width:575px){
                .signup .signup-block{
                    background-color: rgb(241, 240, 240);
                    border: none;
                    margin-top: 50px;
                    padding: 10px 30px;
                }

            }

        </style>
    </head>
    <body>
        <section class="signup">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 col-md-3 col-lg-4"></div>
                    <div class="col-sm-8 col-md-6 col-lg-4 signup-block">
                        <div class="signup-header">
                            <center><h2>WZ_Chat</h2></center>
                        </div>
                        <div class="signup-auth">
                                <center>
                                    <h4>Sign up to chat with your friends</h4>
                                    <button class="btn-auth"><i class="fab fa-google"></i>Sign Up with Google</button><br>
                                    <button class="btn-auth"><i class="fab fa-facebook-square"></i>Sign Up with Facebook</button>
                                </center>
                            
                        </div>
                        <div class="signup-space">OR</div>
                        <form class="signup-body" method="POST" action="#" id="signupform">
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" onChange=checkName(this.value)>
                            <p id="nameerror" class="text-danger" style="margin-left: 10px;"></p>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" onChange=checkEmail(this.value)>
                            <p id="emailerror" class="text-danger" style="margin-left: 10px;"></p>
                            <div class="pswrd">
                                <input type="password" class="form-control" placeholder="Password" id="toglefield" name="password" onChange=checkPassword(this.value)>
                                <div class="btn btn-secondary" id="toglebtn" onClick=toggling()>Show</div>
                            </div>
                            <p id="passworderror" class="text-danger" style="margin-left: 10px;"></p>
                            <input type="submit" value="Sign Up" class="btn btn-primary" style="width: 100%;" onClick=signUp() id="signupbtn">
                            <p id="error" class="text-danger text-center" style="margin-top: 10px;"></p>
                        </form>
                        <div class="signup-space">
                            <p>By signing up, you agree to our <a href="">Terms</a>.</p>
                            <p>Already have an account? <a href="login.php">Log In</a>.</p>
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
            const name = document.getElementById("name");
            const email = document.getElementById("email");
            // var signupbtn = document.getElementById("signupbtn");
            // signupbtn.disabled = true;
            // if( document.getElementById("nameerror").innerHTML == "" && document.getElementById("passworderror").innerHTML == "" && document.getElementById("emailerror").innerHTML == ""){
            //     signupbtn.disabled = false;
            // }
            const checkName=(e)=>{
                if(e.length < 4 || e.length > 15){
                    document.getElementById("nameerror").innerHTML = "Name should be 3-15 character long";
                }
                else if(!isNaN(e)){
                    document.getElementById("nameerror").innerHTML = "No Numeric values should be there in Name";
                }
                else{
                    document.getElementById("nameerror").innerHTML = "";
                }
            }
            const checkEmail=(e)=>{
                var atposition=e.indexOf("@");  
                var dotposition=e.lastIndexOf(".");  
                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=e.length){  
                    document.getElementById("emailerror").innerHTML = "Please enter a valid e-mail address";
                }
                else{
                    document.getElementById("emailerror").innerHTML = "";
                }  
            }
            const checkPassword=(e)=>{
                var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                if(e.length < 8){
                    document.getElementById("passworderror").innerHTML = "Password should be atleast 8 character long";
                }
                else if(!e.match(decimal)){
                    document.getElementById("passworderror").innerHTML = "Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
                }
                else{
                    document.getElementById("passworderror").innerHTML = "";
                }  
            }
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
            const formDetail = document.getElementById("signupform");
            formDetail.onsubmit=(e)=>{
                e.preventDefault();
            }
            
            const signUp=()=>{
                var atposition=email.value.indexOf("@");  
                var dotposition=email.value.lastIndexOf(".");  
                var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.value.length){  
                    document.getElementById("emailerror").innerHTML = "Please enter a valid e-mail address";
                }
                if(toglefield.value.length < 8){
                    document.getElementById("passworderror").innerHTML = "Password should be atleast 8 character long";
                }
                else if(!toglefield.value.match(decimal)){
                    document.getElementById("passworderror").innerHTML = "Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character";
                }
                if(name.value.length < 4 || name.value.length > 15){
                    document.getElementById("nameerror").innerHTML = "Name should be 3-15 character long";
                }
                else if(!isNaN(name.value)){
                    document.getElementById("nameerror").innerHTML = "No Numeric values should be there in Name";
                }
                else{
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST","../php/signup.php",true);
                    xhr.onload=()=>{
                        if(xhr.readyState === XMLHttpRequest.DONE){
                            if(xhr.status === 200){
                                let data = xhr.response;
                                if(data == "success"){
                                    if(confirm("Successfully Signed Up")){
                                        location.href="login.php";
                                    }
                                    else{
                                        location.href="login.php";
                                    }
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


                
            }
        </script>
    </body>
</html>