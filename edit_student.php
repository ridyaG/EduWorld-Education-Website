<?php 
include("connection.php");
 //fetch faculty
 $students = mysqli_query($con,"SELECT * FROM `students` ORDER BY id ASC");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Students</title>
   
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
          <a href="facultyList.php" class="menu ">
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
          <a href="students.php" class="menu active">
            <i class='fa fa-users'></i>
            <span class="links_name">Students</span>
          </a>
        </li>
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
        <span class="dashboard">Student List</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>

<div class= "container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class = "m-0 font-weight-bold text-primary">Student Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['edit_data_btn']))
        {
            $id = $_POST['edit_id'];
            $query = mysqli_query($con,"SELECT * FROM `students` WHERE id = '$id'");
            foreach($query as $row)
            {
        ?>
        <form action="edit_code.php" method = "POST" enctype="multipart/form-data">
            <input type = "hidden" name = "id" value = "<?php echo $row['id']?>">
            <div class = "form-group">
                <label> Name </label>
                <input type = "text" name = "student_name" value = "<?php echo $row['student_name']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Gender </label>
                <input type = "text" name = "sex" value = "<?php echo $row['sex']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Mobile </label>
                <input type = "text" name = "phone" value = "<?php echo $row['phone']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Email </label>
                <input type = "text" name = "email" value = "<?php echo $row['email']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label>Board</label>
                <input type = "text" name = "board" value = "<?php echo $row['board']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label>State</label>
                <input type = "text" name = "state" value = "<?php echo $row['state']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Reg. No. </label>
                <input type = "text" name = "reg_num" value = "<?php echo $row['reg_num']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Marks </label>
                <input type = "text" name = "marks" value = "<?php echo $row['marks']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Roll No.</label>
                <input type = "text" name = "roll" value = "<?php echo $row['roll']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label>preparing For</label>
                <input type = "text" name = "prep" value = "<?php echo $row['prep']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Department </label>
                <input type = "text" name = "dept" value = "<?php echo $row['dept']?>" class = "form-control">
            </div>
            <div class = "form-group">
                <label> Student Image </label>
                <input type = "file" name = "photo" id= "photo" value = "<?php echo $row['photo']?>" class = "form-control">
            </div>
            <br>
            <a href="students.php" class = "btn btn-danger"> CANCEL </a>
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