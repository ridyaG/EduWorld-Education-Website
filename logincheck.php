<?php
session_start();

include("connection.php");

$db = mysqli_select_db($con, 'edu_sample_db');
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from admin_login where Admin_Name = '$user' and Admin_Password = '$pass'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
        if($row == 1){
            echo "Login Successful";
            $_SESSION['username'] = $user;
            header('location: dashboard.php');
        }
        else{  
            
          //  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" style = "z-index: 10;">Fill All Fields</div>';
              echo "<script>alert('Invalid!');</script>";
            header('location: admin-login.php');
        }
    }
?>