<?php
//From Thapa Technical
session_start();
include('connection.php')
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0">
        <title>Admin login panel</title>
        <link rel = "stylesheet" href="http://localhost/login_php/login-style.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <Style>
        #button{
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            width: 100px;
            max-width: 100px;
            cursor: pointer;
            margin-bottom: 20px;
            font-weight: 600;
            display: block;
            
        } 
        #button:hover{
        background: #fff;
          }
    
 @media only screen and (max-width: 600px) {    
    .container
    {
        width: 400px;
        height: 450px;
      }
    }
            </Style>
    </head>
    <body>
        <section>
            <div class="box">
                <div class="container">
                    <div class="form">
                        <h1>Admin Login</h1>
                        <form action = "logincheck.php" method="POST" >
                            <div class="inputBox">
                                <i class="fa fa-user" style = "margin-right: 410px; margin-bottom: 70px"></i>
                                <input type="text" placeholder="Admin Name" name = "username" autocomplete = "off">
                                <i class="fa fa-lock" style = "margin-right: 410px; margin-bottom: 0px"></i>
                                <input type="password" placeholder="Admin Password" name = "password" autocomplete = "off">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="inputBox">
                                <input type="submit" name= "submit" value="Login" id = "button">
                            </div>
                            <p class="forget">Forgot Password? <a href="#">Click Here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section> 
        <script>
            const pswrdfld = document.querySelector(".inputBox input[type='password']");
            toggleBtn = document.querySelector(".inputBox .fa-eye");

            toggleBtn.onclick = () => {
                if(pswrdfld.type == "password"){
                pswrdfld.type = "text";
                toggleBtn.classList.add("active");
            }
                else{
                pswrdfld.type = "password";
                toggleBtn.classList.remove("active");
            }
            }
        </script>
    </body>
</html>