<?php 
include("connection.php");


 //update
  
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $board = $_POST['board'];
    $reg_num = $_POST['reg_num'];
    $marks = $_POST['marks'];
    $dept = $_POST['dept'];
    $prep = $_POST['prep'];
    $roll = $_POST['roll'];
    $photo = $_FILES["photo"]['name'];


    $sql = "UPDATE students SET student_name = '$student_name',sex = '$sex', phone = '$phone', email = '$email',board = '$board',state = '$state',reg_num = '$reg_num',marks = '$marks',dept = '$dept',prep = '$prep',roll = '$roll',photo = '$photo', WHERE id='$id')" ;
    $sql_run = mysqli_query($con,$sql);
    if($sql_run){
       move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/".$_FILES["photo"]["name"]);
       $_SESSION['success'] = "Student Details Updated";
       header('Location: students.php');
        $msg = '<div class= "alert alert-success col-sm-9 ml-5 mt-2" role = "alert"> Updated Successfully </div>';
    }
    else{
        $_SESSION['status'] = "Student Not Updated";
        //$msg = '<div class = "alert alert-danger col-sm-9 ml-5 mt-2" role = "alert">Failed To Update</div>';
        header('Location: students.php');
    }
?>