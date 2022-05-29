<?php 
include("connection.php");
 //fetch students
 $students = mysqli_query($con,"SELECT * FROM `students` ORDER BY id ASC");

 //fetch status
 /*$check = mysqli_query($con, "SELECT * FROM `admission` ORDER BY ID ASC");

    
     if(mysqli_num_rows($check) > 0)
     {
       while($row = mysqli_fetch_assoc($check))
       { 
        if(echo($row['status']) == 1)
        {
            $fullname = $_REQUEST['txtexam'];
            $sex = $_REQUEST['txtexam'];
            $phone = $_REQUEST['txtexam'];
            $email = $_REQUEST['txtexam'];
            $board = $_REQUEST['txtexam'];
            $state = $_REQUEST['txtexam'];
            $regno = $_REQUEST['txtexam'];
            $boardscore = $_REQUEST['txtexam'];
            $dept = $_REQUEST['txtexam'];
            $exam = $_REQUEST['txtexam'];
            $photo='upload/default.jpg';

            //Get roll
            function roll(){
            $string = (uniqid(rand(), true));
            return substr($string, 0,5);
            }
        
            $applicationID = roll();
            //add student 
            $sql= "INSERT INTO students(`student_name`,`sex`,`phone`,`email`,`board`,`state`,`reg_num`,`marks`,`dept`,`prep`,`marksheet`,`photo`,`date_admission`,`roll`) VALUES ('$faculty_name', '$faculty_desig', '$faculty_email', '$faculty_mob', '$faculty_dob', '$faculty_salary', '$skills', '$faculty_img_src')";
        }
       }}*/
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
          <a href="facultyList.php" class="menu">
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
          <a href="#" class="menu active">
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
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
<!-- Snippet -->
<br><br><br>
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class = "m-0 font-weight-bold text-primary"><button type="button" class = "btn btn-primary" data-toggle="modal" data-target= "#ABOUTUSMODAL" onclick= "location.href='//localhost/login_php/add_student.php';">
        ADD STUDENT</button></h6>
    </div>
    <div class= "card-body">
      <div class = "table-responsive">
         <table class= "table table-bordered" id= "dataTable" width="100%" cellspacing = "0">
            <thead>
              <tr>
                <th>Roll No.</th>
                <th>Name</th>
                <th>Prep.</th>
                <th>Contact</th>
                <th>Marks</th>
                <th>Board</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
        <?php
        if(mysqli_num_rows($students) > 0)
        {
          while($row = mysqli_fetch_assoc($students))
          { 
        ?>
           
              <tr>
                <td> <?php echo $row['roll']; ?> </td>
                <td> <?php echo $row['student_name']; ?></td>
                <td> <?php echo $row['prep']; ?> </td>
                <td> <?php echo $row['phone']; ?></td>
                <td> <?php echo $row['marks']; ?></td>
                <td> <?php echo $row['board']; ?></td>
                <td><img src="<?php echo $row['photo']; ?>" width = "100px" height = "100px" alt="Student Image"></td>
                <td> <form action = "edit_student.php" method = "POST">
                      <input type = "hidden" name = "edit_id" value= "<?php echo $row['id'] ?>">
                      <button type= "submit" name = "edit_data_btn" class = "btn btn-success"> EDIT </button>
                    </form>
                </td>
                <td> <button name = 'delete' class = "btn btn-danger"> DELETE </button></td>
                <?php
                if(isset($_REQUEST['delete'])){
                  $sql = "DELETE FROM students WHERE id = {$_REQUEST['id']}";
                  if($con->query($sql) == TRUE){
                  echo'<meta http-equiv="refresh" content= "0; URL=?deleted" />';
                  }
                  else {
                    echo 'Unable to delete data';
                  }
                }
                ?>
    </tr>
      <?php
          }
        }
        else{
          echo "No Record Found";
        }
        ?>
         </tbody>
    </table>
    </div>
    </div>
  
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