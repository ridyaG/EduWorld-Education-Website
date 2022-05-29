<?php
include('connection.php');

//update
if(isset($_REQUEST['courseSubmitBtn'])){
  
    $sstudents = $_REQUEST['satisfied_students'];
    $jee_mains = $_REQUEST['jee_mains'];
    $jee_adv = $_REQUEST['jee_adv'];
    $neet = $_REQUEST['neet'];

    $sql = "INSERT INTO results (satisfied_students, jee_mains, jee_adv, neet) VALUES ('$sstudents', '$jee_mains', '$jee_adv', '$neet')" ;
    if($con->query($sql) == TRUE){
        $msg = '<div class= "alert alert-success col-sm-9 ml-5 mt-2" role = "alert"> Updated Successfully </div>';
    }
    else{
        $msg = '<div class = "alert alert-danger col-sm-9 ml-5 mt-2" role = "alert">Failed To Update</div>';
    }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Results</title>
   
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
          <a href="dashboard.php" class="menu">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="courses.php" class="menu ">
            <i class='fa fa-book' ></i>
            <span class="links_name">Courses</span>
          </a>
        </li>
        <li>
          <a href="#" class="menu">
            <i class='fa fa-credit-card' ></i>
            <span class="links_name">Fee Structure</span>
          </a>
        </li>
        <li>
            <a href="results.php" class="menu active">
              <i class='fa fa-trophy' ></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="#" class="menu">
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
          <a href="notices.php" class="menu">
            <i class='fa fa-newspaper-o' ></i>
            <span class="links_name">Notices</span>
          </a>
        </li>
        <li>
          <a href="feedback.php" class="menu">
            <i class='fa fa-comments' ></i>
            <span class="links_name">Feedback</span>
          </a>
        </li>
        <li>
          <a href="adminChangePassword.php" class="menu">
            <i class='fa fa-unlock-alt' ></i>
            <span class="links_name">Password</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='fa fa-sign-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section" id="interface">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Edit Results</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
<section class="table-section">
       
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="res"> 
            <div class="card text-white  mb-5" style="max-width: 18rem; background: rgb(255, 123, 0);">
                <label for="satisfied_students">Satisfied Students :</label>
                <input type="number" class="students" id ="student" name="satisfied_students" maxlength="4" size="4"></div></div>

                <div class="res"> 
                <div class="card text-white  mb-5" style="max-width: 18rem; background: rgb(255, 123, 0);">
                <label for="jee_mains">JEE Mains:</label>
                <input type="number" class="jee_mains" id ="jee_mains" name="jee_mains" maxlength="4" size="4"></div></div>

                <div class="res">
                <div class="card text-white  mb-5" style="max-width: 18rem; background: rgb(255, 123, 0);"> 
                <label for="jee_adv">JEE Advanced:</label>
                <input type="number" class="jee_adv" id ="jee_adv" name="jee_adv" maxlength="4" size="4" ></div></div>

                <div class="res">
                <div class="card text-white  mb-5" style="max-width: 18rem; background: rgb(255, 123, 0);">
                <label for="neet">NEET :</label>
                <input type="number" class="neet" id ="neet" name="neet" maxlength="4" size="4"></div></div>
                <div class="text-center">
                <button type="submit" class="btn btn-success" id="courseSubmitBtn" name="courseSubmitBtn" style = "margin-right: 10px;">Submit</button>
                <a href="results.php" class="btn btn-info" style = "margin-right: 90px;">Close</a>
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
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </script>
 </body>
 </html>