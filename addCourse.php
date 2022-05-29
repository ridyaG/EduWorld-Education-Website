<?php
include('connection.php');
if (isset($_POST['courseSubmitBtn'])){

	$img_name = time() . '_' . $_FILES['sci_faculty_img_src']['name'];
	$tmp_name = $_FILES['sci_faculty_img_src']['tmp_name'];
  $img_upload_path = 'images/' . $img_name;
	move_uploaded_file($tmp_name, $img_upload_path);

    //check for empty fields
    if(($_REQUEST['sci_course_name'] == "") || ($_REQUEST['sci_course_desc'] == "") || ($_REQUEST['sci_course_faculty'] == "") || ($_REQUEST['sci_course_batch'] == "") || ($_REQUEST['sci_course_price'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $course_name = $_REQUEST['sci_course_name'];
        $course_desc = $_REQUEST['sci_course_desc'];
        $course_faculty = $_REQUEST['sci_course_faculty'];
        $course_duration = $_REQUEST['sci_course_batch'];
        $course_price = $_REQUEST['sci_course_price']; 
        

        $sql= "INSERT INTO course (sci_course_name, sci_course_desc, sci_course_faculty, sci_course_batch, sci_course_price, sci_faculty_img_src) VALUES ('$course_name', '$course_desc', '$course_faculty', '$course_duration', '$course_price', '$img_upload_path')";

        if($con->query($sql) == TRUE){
          $msg = '<div class= "alert alert-success cl-sm-6 ml-5 mt-2">Course Added Successfully!</div>';
        }
        else{
          $msg = '<div class= "alert alert-danger cl-sm-6 ml-5 mt-2">Unable to Add Course</div>';
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
          <a href="courses.php" class="menu active">
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
        <span class="dashboard">Add new course</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
    <section class="table-section">
      <!----------form--------------->
    <div class="form-background" style = " margin-left: 500px;"> 
    <div class="col-sm-6 mt-5 mx-3 jumbotron">
        <h3 class="text-center">Add New Course</h3>
        <form action="addCourse.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="sci_course_name">Course Name</label>
                <input type="text" class="form-control" id="sci_course_name" name="sci_course_name">
            </div>
            <div class="form-group">
                <label for="sci_course_desc">Course Description</label>
                <input type="text" class="form-control" id="sci_course_desc" name="sci_course_desc">
            </div>
            <div class="form-group">
                <label for="sci_course_faculty">Course Faculty</label>
                <input type="text" class="form-control" id="sci_course_faculty" name="sci_course_faculty">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" id="sci_faculty_img_src" name="sci_faculty_img_src">
                <label for="sci_faculty_img_src"><i class="fa fa-upload"></i><span>Choose a file…</span></label>
            </div>
            <div class="form-group">
                <label for="sci_course_batch">Batch Time</label>
                <input type="text" class="form-control" id="sci_course_duration" name="sci_course_batch">
            </div>
            <div class="form-group">
                <label for="sci_course_price">Course Price</label>
                <input type="text" class="form-control" id="sci_course_price" name="sci_course_price">
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
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>
 </body>
 </html>