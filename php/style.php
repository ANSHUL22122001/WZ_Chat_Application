<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
            
            @media(max-width:575px){
                .login .login-block{
                    background-color: rgb(241, 240, 240);
                    border: none;
                    margin-top: 50px;
                    padding: 10px 30px;
                }

            }
        </style>