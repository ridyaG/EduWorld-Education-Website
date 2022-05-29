
<?php
session_start();
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
   
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
          <a href="dashboard.php" class="menu active">
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
            <a href="results.php" class="menu">
              <i class='fa fa-trophy' ></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="facultyList.php" class="menu">
            <i class='fa fa-users' ></i>
            <span class="links_name">Faculty</span>
          </a></li>
          <li>
          <a href="records.php" class="menu">
            <i class='fa fa-database'></i>
            <span class="links_name">Records</span>
          </a></li>
          <li>
          <a href="students.php" class="menu">
            <i class='fa fa-users'></i>
            <span class="links_name">Students</span>
          </a>
        </li>
        <li>
          <a href="students.php" class="menu">
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
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>
<section class="table-section">
    <div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
    <div class="card text-white  mb-3" style="max-width: 18rem; background: rgb(255, 123, 0);">
    <div class="card-header">Courses</div>
    <div class="card-body">
        <h4 class="card-title">
        <div class="home_value" data-count= "12">0</div>
        </h4>
        <a class="btn text-white" href="courses.php">View</a>
    </div>
</div>
</div>
<div class="col-sm-4 mt-5">
    <div class="card text-white mb-3" style="max-width: 18rem; background: rgb(255, 123, 0);">
    <div class="card-header">Visitors</div>
<div class="card-body">
    <h4 class="card-title"><div class="home_value" data-count= "<?php $sql = "SELECT * from visitor"; if ($result = mysqli_query($con, $sql)) { // Return the number of rows in result set
    $rowcount = mysqli_num_rows( $result ); echo($rowcount);
  }?>">0</div></h4>
    <a class="btn text-white" href="feedback.php">View</a>
</div>
</div>
</div>
<div class="col-sm-4 mt-5">
    <div class="card text-white mb-3" style="max-width: 18rem; background: rgb(255, 123, 0);">
    <div class="card-header">Results</div>
    <div class="card-body">
    <h4 class="card-title"><div class="home_value" data-count= "1125">0</div></h4>
    <a class="btn text-white" href="results.php">View</a>
</div>
</div>
</div>
</div>
<div class=" mx-5 mt-5 text-center">
    <!--Table-->
    <p class="text-white p-2" style="background: rgb(10, 37, 88);">Students Enrolled</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course code</th>
                <th scope="col">Student Email</th>
                <th scope="col">Enrollment Date</th>
                <th scope="col">Fee Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">404</th>
                <td>chandni@gmail.com</td>
                <td>20/03/2022</td>
                <td>40000</td>
                <td><button type="submit" class="btn btn-secondary" name = "delete" value="Delete">
                  <i class="fa fa-trash-o"></i></button></td>
            </tr>
        </tbody>
    </table>
</div> 

  </section></section>

  <script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-left", "bx-menu");
}

const counters = document.querySelectorAll('.home_value');
const speed = 200;

counters.forEach( counter => {
   const animate = () => {
      const value = +counter.getAttribute('data-count');
      const data = +counter.innerText;
     
      const time = value / speed;
     if(data < value) {
          counter.innerText = Math.ceil(data + time);
          setTimeout(animate, 1);
        }else{
          counter.innerText = value;
        }
     
   }
   
   animate();
});

 </script>

</body>
</html>
