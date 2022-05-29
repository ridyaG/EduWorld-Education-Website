<?php 
include("connection.php");


 //update
if(isset($_POST['courseSubmitBtn'])){
  
    $id = $_POST['id'];
    $faculty_name = $_POST['faculty_name'];
    $faculty_mob = $_POST['faculty_mob'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_dob = $_POST['faculty_dob'];
    $faculty_salary = $_POST['faculty_salary'];
    $faculty_desig = $_POST['faculty_desig'];
    $skills = $_POST['skills'];
    $faculty_img_src = $_FILES["faculty_img_src"]['name'];


    $sql = "UPDATE faculty SET faculty_name = '$faculty_name', faculty_mob = '$faculty_mob', faculty_email = '$faculty_email', faculty_dob = '$faculty_dob', faculty_salary = '$faculty_salary', faculty_desig = '$faculty_desig', skills = '$skills', faculty_img_src = '$faculty_img_src' WHERE id='$id')" ;
    $sql_run = mysqli_query($con,$sql);
    if($sql_run){
       move_uploaded_file($_FILES["faculty_image_src"]["tmp_name"],"upload/".$_FILES["faculty_img_src"]["name"]);
       $_SESSION['success'] = "Faculty Added";
       header('Location: facultyList.php');
        $msg = '<div class= "alert alert-success col-sm-9 ml-5 mt-2" role = "alert"> Updated Successfully </div>';
    }
    else{
        $_SESSION['status'] = "Faculty Not Updated";
        //$msg = '<div class = "alert alert-danger col-sm-9 ml-5 mt-2" role = "alert">Failed To Update</div>';
        header('Location: facultyList.php');
    }
}?>