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
        <span class="dashboard">List of Courses</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
    <section class="table-section">