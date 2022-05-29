<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//read from database
			$query = "select * from users where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index_user.php");
						die;
					}
				}
			}
			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0">
        <title>User login form</title>
        <link rel = "stylesheet" href="login-style.css">
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
        background: rgba(24, 54, 94, 0.445);
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
                        <h1>User Login</h1>
                        <form method="post">
                            <div class="inputBox">
                                <input type="text" placeholder="Email" name = "email" autocomplete = "off">
                                <input type="password" placeholder="Password" name = "password" autocomplete = "off">
                                <i class="fa fa-eye"></i>
                            </div>
                            <div class="inputBox">
                                <input type="submit" value="Login" id = "button">
                            </div>
                            <p class="forget">Forgot Password? <a href="#">Click Here</a></p>
                            <p class="forget">Don't have an account? <a href="registration.php">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="javascript/password.js"></script>
    </body>
</html>