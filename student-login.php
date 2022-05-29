<?php 

session_start();

	include("connection.php");
	/*include("functions.php");

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
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}*/

?>
  
  <script type="text/javascript">
function loginfail(){
echo(' Wrong Email Address or Application ID');
}

</script>

<?php

if(isset($_POST['btnlogin']))
{


$email = $_POST['txtemail'];
$applicationID = $_POST['txtapplicationID'];

 $sql = "SELECT * FROM admission WHERE email='".$email."' and applicationID = '".$applicationID."'";
  $result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
($row = mysqli_fetch_assoc($result));
$_SESSION["uemail"] = $row['email'];

header("Location: student-module.php"); 
}else {
$_SESSION['error']=' Wrong Email Address or Application ID';
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0">
        <title>Student login form</title>
        <link rel = "stylesheet" href="login-style.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/user-style.css" rel="stylesheet">
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
                        <h1>Student Login</h1>
                        <form method="post">
                            <div class="inputBox">
                                <input type="text" placeholder="Email" name="txtemail" autocomplete = "off" required="">
                                <input type="text" name="txtapplicationID" class="form-control" placeholder="Application ID" required="">
                            </div>
                            <div class="inputBox">
                                <input type="submit" value="Login" id = "button" name = "btnlogin">
                            </div>
                            <p class="forget">Don't have an account? <a href="student-registration.php">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="javascript/password.js"></script>
         <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong> 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong> 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>
    </body>
</html>