<?php
include("connection.php");

$query="SELECT * FROM `results` ORDER BY id DESC"; // Fetch all the data from the table customers
$result=mysqli_query($con,$query);
$row = mysqli_fetch_row($result);
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
            <a href="results.php" class="menu active">
              <i class='fa fa-trophy' ></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="facultyList.php" class="menu">
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
        <span class="dashboard">Our Results</span>
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
    
    <div class="card text-white  mb-3" style="max-width: 18rem; background: orange; border-radius: 100%; border: 5px solid rgba(255, 165, 0, 0.1);">
        <span class="icon"><img src="images/satisfiedicon.png" width="65" height = "64"></span>
    <div class="card-body" style = "font-size: 20px;">Satisfied Students
        <h4 class="card-title"> 
            <div id="counter">
				<div class="home_value" data-count= <?php echo $row['1']; ?>>0</div>
			</div>
        </h4>
        <a class="btn text-white" href="edit_results.php
  "><i class="fa fa-pencil"></i>  Edit</a>
    </div>
</div>
</div>
<div class="col-sm-4 mt-5">
    <div class="card text-white mb-3" style="max-width: 18rem; background: rgb(114, 171, 245); border-radius: 100%; border: 5px solid rgba(114, 171, 245, 0.1);">
        <span class="icon"><div><img src="images/jeemain.png" width="65" height = "60"></div></span>
<div class="card-body" style = "font-size: 18px;"> JEE Mains(2021) Selections
    <h4 class="card-title">
        <div id="counter">
        <div class="home_value" data-count=<?php echo $row['2']; ?>>0</div>
    </div></h4>
    <a class="btn text-white" href="edit_results.php"><i class="fa fa-pencil"></i>  Edit</a>
</div>
</div>
</div>
<div class="col-sm-4 mt-5">
    <div class="card text-white mb-3" style="max-width: 18rem; background: rgb(87, 231, 200); border-radius: 100%; border: 5px solid rgba(87, 231, 200,0.1);">
        <span class="icon"><div><img src="images/jeeadv.png" width="65" height = "64"></div></span>
<div class="card-body" style = "font-size: 14px;"> JEE Advanced(2021) Selections
    <h4 class="card-title">
        <div id="counter">
        <div class="home_value" data-count=<?php echo $row['3']; ?>>0</div>
    </div></h4>
    <a class="btn text-white" href="edit_results.php"><i class="fa fa-pencil"></i>  Edit</a>
</div>
</div>
</div>
<div class="col-sm-4 mt-5">
    <div class="card text-white mb-3" style="max-width: 18rem; background: rgb(233, 162, 255); border-radius: 100%; border: 5px solid rgba(233, 162, 255, 0.1);">
        <span class="icon"><img src="images/neeticon.png" width="65" height = "64"></span>
    <div class="card-body" style = "font-size: 20px;"> NEET(2021) Selections
    <h4 class="card-title"><div id="counter">
        <div class="home_value" data-count=<?php echo $row['4']; ?>>0</div>
    </div></h4>
    <a class="btn text-white" href="edit_results.php"><i class="fa fa-pencil"></i>  Edit</a>
</div>
</div>
</div>
</div>


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


<script>
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