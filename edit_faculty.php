<?php 
include("connection.php");
 //fetch faculty
 $faculty = mysqli_query($con,"SELECT * FROM `faculty` ORDER BY id ASC");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Faculty</title>
   
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
            <i class='fa fa-book'></i>
            <span class="links_name">Courses</span>
          </a>
  </li>
        <li>
            <a href="results.php" class="menu">
              <i class='fa fa-trophy'></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="facultyList.php" class="menu active">
            <i class='fa fa-users'></i>
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
            <i class='fa fa-newspaper-o'></i>
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
        <span class="dashboard">Faculty List</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>

<div class= "container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class = "m-0 font-weight-bold text-primary">Faculty Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['edit_data_btn']))
        {
            $id = $_POST['edit_id'];
            $query = mysqli_query($con,"SELECT * FROM `faculty` WHERE id = '$id'");
            foreach($query as $row)
            {
        ?>
        <form action="code.php" method = "POST" enctype="multipart/form-data">
            <input type = "hidden" name = "id" value = "<?php echo $row['id']?>">
            <div class = "form-group">
                <label> Name </label>
                <input type = "text" name = "faculty_name" value = "<?php echo $row['faculty_name']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Mobile </label>
                <input type = "text" name = "faculty_mob" value = "<?php echo $row['faculty_mob']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Email </label>
                <input type = "text" name = "faculty_email" value = "<?php echo $row['faculty_email']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Birthday</label>
                <input type = "text" name = "faculty_dob" value = "<?php echo $row['faculty_dob']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Salary </label>
                <input type = "text" name = "faculty_salary" value = "<?php echo $row['faculty_salary']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Designation </label>
                <input type = "text" name = "faculty_desig" value = "<?php echo $row['faculty_desig']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Description </label>
                <input type = "text" name = "skills" value = "<?php echo $row['skills']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Upload Image </label>
                <input type = "file" name = "faculty_img_src" id= "faculty_img" value = "<?php echo $row['faculty_img_src']?>" class = "form-control">
            </div>
            <br>
            <a href="facultyList.php" class = "btn btn-danger"> CANCEL </a>
            <button type="submit" name = "update_btn" class= "btn btn-primary">Update</button>

        </form>
        <?php
            }
        }
        ?>
        
    </div>
</div>
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