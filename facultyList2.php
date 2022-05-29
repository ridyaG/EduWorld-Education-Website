<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
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
   <style>
    .section {
    font-family: 'Inter', sans-serif;
    margin-top: 50px;
    }
  
     [x-cloak=""] {
       display: none;
    }
    </style>
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
            <a href="results.php" class="menu">
              <i class='fa fa-trophy' ></i>
              <span class="links_name">Result</span>
            </a>
          </li>
        <li>
          <a href="facultyList.php" class="menu active">
            <i class='fa fa-users' ></i>
            <span class="links_name">Faculty</span>
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
        <span class="dashboard">Faculty List</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
<section class="table-section">
<!-- Snippet -->

<div class="col-sm-5">

<section class="flex flex-col antialiased bg-gray-100 text-gray-600 p-4 section"> 
  <?php
         while($row=mysqli_fetch_array($faculty)){
        ?> 
    <div class="h-full" style="margin: 20px;">
        <!-- Card -->
  
        <div class="max-w-sm mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="flex flex-col h-full">
                <!-- Card top -->
                <div class="flex-grow p-4">
                    <div class="flex justify-between flex-wrap: no-wrap">
                       <!--  Image + name -->
                        <header>
                            <div class="flex mb-2">
                                <a class="relative inline-flex items-start mr-5" href="#0">
                                    <div class="absolute top-0 right-0 -mr-2 bg-white rounded-full shadow" aria-hidden="true">
                                        <svg class="w-8 h-8 fill-current text-yellow-500" viewBox="0 0 32 32">
                                            <path d="M21 14.077a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 010 1.5 1.5 1.5 0 00-1.5 1.5.75.75 0 01-.75.75zM14 24.077a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z" />
                                        </svg>
                                    </div>
                                    <img class="rounded-full" src="<?php echo $row['faculty_img_src']; ?>" width="64" height="64" alt="User 01" />
                                </a>
                               
                                <div class="mt-1 pr-1">
                                    <a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                        <h2 class="text-xl leading-snug justify-center font-semibold"><?php echo $row['faculty_name'];?></h2>
                                    </a>
                                    <div class="flex items-center"><span class="text-sm font-medium text-gray-400 -mt-0.5 mr-1">-&gt;</span> <span></span><?php echo $row['faculty_desig'];?></div>
                                </div>
                            </div>
                        </header>
                        <!-- Menu button -->
                        <div class="relative inline-flex flex-shrink-0" x-data="{ open: false }">
                            <button class="text-gray-400 hover:text-gray-500 rounded-full focus:outline-none focus-within:ring-2" :class="{ 'bg-gray-100 text-gray-500': open }" aria-haspopup="true" @click.prevent="open = !open" :aria-expanded="open">
                                <span class="sr-only">Menu</span>
                                <svg class="w-8 h-8 fill-current" viewBox="0 0 32 32">
                                    <circle cx="16" cy="16" r="2" />
                                    <circle cx="10" cy="16" r="2" />
                                    <circle cx="22" cy="16" r="2" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- Bio -->
                    <div class="mt-2">
                        <div class="text-sm"><?php echo $row['skills'];?></div>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="border-t border-gray-200">
                    <div class="flex divide-x divide-gray-200r">
                        <a class="block flex-1 text-center text-sm text-indigo-500 hover:text-indigo-600 font-medium px-3 py-4" href="email.php">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.6 0 0 3.1 0 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L8.9 12H8c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                </svg>
                                <span>Send Email</span>
                            </div>
                        </a>
                        <a class="block flex-1 text-center text-sm text-gray-600 hover:text-gray-800 font-medium px-3 py-4 group" href="#0">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current text-gray-400 group-hover:text-gray-500 flex-shrink-0 mr-2" viewBox="0 0 16 16">
                                    <path d="M11.7.3c-.4-.4-1-.4-1.4 0l-10 10c-.2.2-.3.4-.3.7v4c0 .6.4 1 1 1h4c.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4l-4-4zM4.6 14H2v-2.6l6-6L10.6 8l-6 6zM12 6.6L9.4 4 11 2.4 13.6 5 12 6.6z" />
                                </svg>
                                <span>Edit Profile</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php } ?>
</section></div>
  </section>

<!-- More components -->
<div x-show="open" class="fixed bottom-0 right-0 w-full md:bottom-8 md:right-12 md:w-auto z-60" x-data="{ open: true }">
    <div class="bg-gray-800 text-gray-50 text-sm p-3 md:rounded shadow-lg flex justify-between">
        <div>👉 <a class="hover:underline ml-1" href="http://localhost/login_php/add_faculty.php" target="_blank">Add Faculty Member</a></div>
        <button class="text-gray-500 hover:text-gray-400 ml-5" @click="open = false">
            <span class="sr-only">Close</span>
            <svg class="w-4 h-4 flex-shrink-0 fill-current" viewBox="0 0 16 16">
                <path d="M12.72 3.293a1 1 0 00-1.415 0L8.012 6.586 4.72 3.293a1 1 0 00-1.414 1.414L6.598 8l-3.293 3.293a1 1 0 101.414 1.414l3.293-3.293 3.293 3.293a1 1 0 001.414-1.414L9.426 8l3.293-3.293a1 1 0 000-1.414z" />
            </svg>
        </button>
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
