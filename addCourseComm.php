<?php
include("connection.php");

if(isset($_REQUEST['courseSubmitBtn'])){

    //---------adding image---------------//
    $img_name = time() . '_' . $_FILES['comm_faculty_img_src']['name'];
    $tmp_name = $_FILES['comm_faculty_img_src']['tmp_name'];
    $faculty_img_src = 'images/' . $img_name;
    move_uploaded_file($tmp_name, $faculty_img_src);
    //-------------------------------------//


    //check for empty fields
    if(($_REQUEST['comm_course_id'] == "") || ($_REQUEST['comm_course_name'] == "") || ($_REQUEST['comm_course_desc'] == "") || ($_REQUEST['comm_course_faculty'] == "") || ($_REQUEST['comm_course_batch'] == "") || ($_REQUEST['comm_course_price'] == "")){
        $msg = '<div class="alert alert-warning col-sm-9 ml-5 mt-5">Fill All Fields</div>';
    }else{
        $course_id = $_REQUEST['comm_course_id'];
        $course_name = $_REQUEST['comm_course_name'];
        $course_desc = $_REQUEST['comm_course_desc'];
        $course_faculty = $_REQUEST['comm_course_faculty'];
        $course_duration = $_REQUEST['comm_course_batch'];
        $course_price = $_REQUEST['comm_course_price']; 

        $sql= "INSERT INTO course_comm (comm_course_id, comm_course_name, comm_course_desc, comm_course_faculty, comm_course_batch, comm_course_price, comm_faculty_img_src) VALUES ('$course_id', '$course_name', '$course_desc', '$course_faculty', '$course_duration', '$course_price', '$faculty_img_src')";

        if($con->query($sql) == TRUE){
          $msg = '<div class= "alert alert-success cl-sm-9 ml-5 mt-5">Course Added Successfully!</div>';
        }
        else{
          $msg = '<div class= "alert alert-danger cl-sm-9 ml-5 mt-5">Unable to Add Course</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Course</title>
   
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="admin.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class=	'fa fa-graduation-cap'></i>
      <span class="logo_name">EduWorld</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="courses.php" class="active">
            <i class='fa fa-book' ></i>
            <span class="links_name">Courses</span>
          </a>
        </li>
        <li>
            <a href="results.php">
              <i class='fa fa-trophy' ></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="facultyList.php">
            <i class='fa fa-users' ></i>
            <span class="links_name">Faculty</span>
          </a>
        </li>
        <li>
          <a href="records.php" class="menu">
            <i class='fa fa-database' ></i>
            <span class="links_name">Records</span>
          </a></li>
        <li>
          <a href="feedback.php">
            <i class='fa fa-comments' ></i>
            <span class="links_name">Feedback</span>
          </a>
        </li>
        <li>
          <a href="adminChangePassword.php">
            <i class='fa fa-unlock-alt' ></i>
            <span class="links_name">Password</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='fa fa-sign-out'></i>
            <span class="links_name">Logout</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section" id="interface">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Courses</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
    <section class="table-section">
    <div class="form-background" style = " margin-left: 500px;"> 
    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add New Course</h3>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label for="comm_course_id">Course Code</label>
                <input type="text" class="form-control" id="comm_course_id" name="comm_course_id">
            </div>
            <div class="form-group">
                <label for="comm_course_name">Course Name</label>
                <input type="text" class="form-control" id="comm_course_name" name="comm_course_name">
            </div>
            <div class="form-group">
                <label for="comm_course_desc">Course Description</label>
                <input type="text" class="form-control" id="comm_course_desc" name="comm_course_desc">
            </div>
            <div class="form-group">
                <label for="comm_course_faculty">Course Faculty</label>
                <input type="text" class="form-control" id="comm_course_faculty" name="comm_course_faculty">
            </div>
            <div class="form-group">
                <label for="comm_faculty_img_src">Course Faculty Image</label>
                <input type="file" class="form-control" id="comm_faculty_img_src" name="comm_faculty_img_src">
            </div>
            <div class="form-group">
                <label for="comm_course_batch">Batch Time</label>
                <input type="text" class="form-control" id="comm_course_duration" name="comm_course_batch">
            </div>
            <div class="form-group">
                <label for="comm_course_price">Course Price</label>
                <input type="text" class="form-control" id="comm_course_price" name="comm_course_price">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
                <a href="courses.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)){echo $msg;} ?>
</form>

</div>
    </div>
</section>
</section>

<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-righ t");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>
 </body>
 </html>