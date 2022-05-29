<?php
include("connection.php"); 
if(isset($_REQUEST['noticeSubmitBtn'])){
    //check for empty fields
    if(($_REQUEST['notice_detail'] == "") || ($_REQUEST['notice_date'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    }else{
        $notice_detail = $_REQUEST['notice_detail'];
        $notice_date = $_REQUEST['notice_date'];

        $sql= "INSERT INTO notices (notice_detail, notice_date) VALUES ('$notice_detail', '$notice_date')";

        if($con->query($sql) == TRUE){
          $msg = '<div class= alert alert-success cl-sm-6 ml-5 mt-2">Notice Added Successfully!</div>';
        }
        else{
          $msg = '<div class= alert alert-danger cl-sm-6 ml-5 mt-2">Unable to Add Event</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Notice</title>
   
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
          <a href="courses.php" >
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
          <a href="students.php" class="menu">
            <i class='fa fa-users'></i>
            <span class="links_name">Students</span>
          </a>
        </li>
        <li>
          <a href="visitors.php" class="menu">
            <i class='fa fa-file'></i>
            <span class="links_name">Reports</span>
          </a>
        </li>
        <li>
          <a href="notices.php" class="menu active">
            <i class='fa fa-newspaper-o' ></i>
            <span class="links_name">Notices</span>
          </a>
        </li>
        <li>
          <a href="feedback.php" >
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
        <span class="dashboard">Add Notice</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
    <section class="table-section">
 <div class="row mx-5 text-center">
<div class= "col-sm-5 mt-5 ml-5" style = "border: 5px solid orange; border-radius: 12px;" >
    <div>
        </div>
        <form method="POST" style = "margin: 15x;">
          <div class = "form-group" style = "margin-top: 20px;">
            <label for = "notice_date" class= "control-label">Notice Date</label>
            <input type="text" name = "notice_date" class ="form-control" required = "required" id = "notice_date">
          </div> 
          <div class="form-group">
            <label for="notice_detail" class="control-label">Notice details</label>
            <textarea class= "form-control" name = "notice_detail" required rows = "5"></textarea>
          </div>
        
            <div class="text-center">
                <button type="submit" class="btn btn-success" id="noticeSubmitBtn" name="noticeSubmitBtn" style = "margin-bottom: 20px;">Submit</button>
                <a href="notices.php" class="btn btn-warning" style = "margin-bottom: 20px; margin-left: 10px;">Close</a>
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
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-left");
}else
  sidebarBtn.classList.replace("bx-menu","bx-menu-alt-right");
}
 </script>
 </body>
 </html>