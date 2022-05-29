<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted

    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $board = $_POST['board'];

    if(!empty($email) && !empty($password) && !empty($username) && !is_numeric($email) && is_numeric($mobile))
    {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id, username, mobile, email, password, board) values ('$user_id', '$username', '$mobile', '$email', '$password', '$board')";

        mysqli_query($con, $query);
        header("Location: login.php");
        die;

    }else{
        echo "Please enter some valid information!";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0">
        <title>Registration form</title>
        <link rel = "stylesheet" href="login-style.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <Style>
        #button{
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            width: 100px;
            max-width: 100px;
            cursor: pointer;
            padding: 4px;
            margin-bottom: 20px;
            font-weight: 600;
            display: block;
            border-radius: 45px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            
        }
        #button:hover{
        background: #fbc9c4;
          }

 .cbutton {
     height: 30px;
    position: relative;
}

.vertical-center {
    margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
    .register .container{
    position: relative;
    width: 750px;

}
    
@media only screen and (max-width: 600px) {    
    .container
    {
        width: 300px;
        height: 350px;
      }
    }
        
</Style>
    </head>
    <body><div class="register">
        <section>
            <div class="box">
                <div class="container">
                    <div class="form">
                        <h1>Registration Form</h1>
                        <div class="row clearfix">
                        <div class="">
                        <form method="post" class="login-email">
                            <div class="inputBox">
                             <!--   <input type="text" placeholder="Username" name = "username">
                                <input type="text" placeholder="Phone No." name = "mobile">
                                <input type="text" placeholder="Email" name = "email">
                                <input type="text" placeholder="Course" name = "course">
                                <input type="text" placeholder="Board" name = "board">
                                <input type="text" placeholder="Address" name = "address">
                                <input type="text" placeholder="Address" name = "">
                                <input type="password" placeholder="Password" name = "password">
                                
                                <i class="fa fa-eye"></i>
                            
                            <div class="cbutton"><div class="vertical-center"><button type="submit" name = "submit" id = "button">Register</button></div></div>
                            <p class="forget">Forgot Password? <a href="#">Click Here</a></p>
                            <p class="forget">Already have an account? <a href="eduWorld-login.php">Login</a></p>-->
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input type="email" name="email" placeholder="Email" required/>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Password" required/>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="password" name="password" placeholder="Re-type Password" required />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
            <input type="text" name="mobile" placeholder="Phone No." required />
          </div>
              <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="username" placeholder="Full Name"/>
              </div>
              <div class="input_field"><span><i aria-hidden="true" class="fa fa-book"></i></span>
                <input type="text" name="course" placeholder="Course" required/>
            </div>
            <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                <input type="text" name="board" placeholder="Board"/>
              </div>
          </div>
            	<div class="input_field radio_option">
              <input type="radio" name="radiogroup1" id="rd1">
              <label for="rd1">Male</label>
              <input type="radio" name="radiogroup1" id="rd2">
              <label for="rd2">Female</label>
              </div>
              <div class="input_field select_option">
                <select>
                <option>Select a State</option><i aria-hidden="true" class="fa fa-caret-up"></i>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                </select>
              </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1">
    			<label for="cb1">I agree with terms and conditions</label>
            </div>
            <div class="cbutton"><div class="vertical-center"><button type="submit" name = "submit" id = "button">Register</button></div></div>
            <p class="forget">Already have an account? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section></div>
        <script src="javascript/password.js"></script>
    </body>
</html>