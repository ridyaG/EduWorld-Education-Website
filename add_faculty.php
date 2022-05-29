<?php
include('connection.php');

if(isset($_POST['facultySubmitBtn'])){

	$img_name = time() . '_' . $_FILES['faculty_img_src']['name'];
	$tmp_name = $_FILES['faculty_img_src']['tmp_name'];
  $faculty_img_src = 'images/' . $img_name;
	move_uploaded_file($tmp_name, $faculty_img_src);

  //check for empty fields
  if(($_REQUEST['faculty_name'] == "") || ($_REQUEST['faculty_email'] == "") || ($_REQUEST['faculty_desig'] == "") || ($_REQUEST['faculty_mob'] == "") || ($_REQUEST['faculty_email'] == "")|| ($_REQUEST['skills'] == "")){
      $msg = '<div class="alert alert-warning col-sm-9 ml-5 mt-2">Fill All Fields</div>';
  }else{
      $faculty_name = $_REQUEST['faculty_name'];
      $faculty_desig = $_REQUEST['faculty_desig'];
      $faculty_email = $_REQUEST['faculty_email'];
      $faculty_mob = $_REQUEST['faculty_mob'];
      $faculty_dob = $_REQUEST['faculty_dob'];
      $faculty_salary = $_REQUEST['faculty_salary'];
      $skills = $_REQUEST['skills'];

      $sql= "INSERT INTO faculty (faculty_name, faculty_desig, faculty_email, faculty_mob, faculty_dob, faculty_salary, skills, faculty_img_src) VALUES ('$faculty_name', '$faculty_desig', '$faculty_email', '$faculty_mob', '$faculty_dob', '$faculty_salary', '$skills', '$faculty_img_src')";

      if($con->query($sql) == TRUE){
        $msg = '<div class= "alert alert-success cl-sm-6 ml-5 mt-2" style = "text-align: center;">Faculty Added Successfully!</div>';
      }
      else{
        $msg = '<div class= "alert alert-danger cl-sm-6 ml-5 mt-2">Unable to Add Faculty</div>';
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Faculties</title>
   
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
          <a href="facultyList.php" class="active">
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
          <a href="feedback.php">
            <i class='fa fa-comments'></i>
            <span class="links_name">Feedback</span>
          </a>
        </li>
        <li>
          <a href="adminChangePassword.php" >
            <i class='fa fa-unlock-alt'></i>
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
        <span class="dashboard">Add Faculty</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='fa fa-bell' ></i>
      </div>
    </nav>
    <section class="table-section">
 <!--<div class="row mx-5 text-center">
   <div class= "col-sm-12 mt-5" >
 <p class="text-white p-2" style="background-color: #0a2558; padding-top: 300px;">List of Faculty</p>
   
    /*$sql = "SELECT * FROM `faculty`";
    $result= $con->query($sql);
    if($result-> num_rows > 0){*/
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Faculty Name</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Salary</th>
                <th scope="col">Action</th>
           </tr>
        </thead>
<tbody>

 /*while($row = $result->fetch_assoc()){ 

echo '<tr>';
echo  '<th scope="row">'.$row['course_id'].'</th>';
echo  '<td>'.$row['course_name'].'</td>';
echo  '<td>'.$row['course_faculty'].'</td>';
echo  '<td>';
echo   '
<form action = "editcourse.php" method="POST" class = "d-inline">
<input type = "hidden" name = "id" value = '.$row["course_id"].'>
        <button 
        type = "submit"
        class = "btn btn-info mr-3"
        name = "view"
        value = "View"
        >
        <i class="fa fa-pencil"></i>
        </button>
</form>
 <form action = "" method="POST" class = "d-inline">
  <input type = "hidden" name = "id" value = '.$row["course_id"].'>
<button
type = "submit"
class = "btn btn-secondary"
name = "delete"
value = "Delete"
>
<i class= "fa fa-trash"></i>
</button>
</form>
 </td>
</tr>';
 }*/ -->

  <!-- Form controls -->
  <div class="col-sm-12">
        <div class="card">                
            <div class="card-header" style="margin-top: 20px;">
               <h4>Enter Faculty Details</h4>
              </div>
            <div class="row">
                <div class="col-sm-3" style="margin-top: 20px;">
                    <div class="nav flex-column nav-pills custom_tablist">
                        <ul class="nav nav-pills displayinline_block" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="v-pills-basic-tab" data-toggle="pill" href="#v-pills-basic" role="tab" aria-controls="v-pills-basic" aria-selected="true">Basic Info</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-9 p-15">
                    <form action="add_faculty.php" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                     <input type="hidden" name="csrf_test_name" value="10d4f2da0a25d893537b085608e24474">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="row" style="margin-top: 20px;">
                                <div class="form-group col-sm-6">
                                    <label for="faculty_name" class="col-sm-4">Name<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="faculty_name" class="form-control" type="text" placeholder="Name" id="faculty_name">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="faculty_desig" class="col-sm-4">Designation<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="faculty_desig" class="form-control" type="text" placeholder="Designation" id="faculty_desig">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="faculty_mob" class="col-sm-4">Mobile<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="faculty_mob" class="form-control" type="number" placeholder="Mobile" id="faculty_mob">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="faculty_email" class="col-sm-4">Email<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="faculty_email" class="form-control" type="text" placeholder="Email" id="email" onblur="email_goto_username(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="faculty_dob" class="col-sm-4">Birthday<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                        <input name="faculty_dob" class="form-control datepicker" type="text" id="dateofbirth" placeholder="Enter Birthday">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="faculty_salary" class="col-sm-4">Salary<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                    <input name="faculty_salary" class="form-control" type="text" id="faculty_salary" placeholder="Salary">
                                </div>
                            </div></div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="skills" class="col-sm-4">Skills<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="skills" id="skills" placeholder="Skills" class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            
                                <div class="form-group col-sm-6">
                                    <label for="faculty_img_src" class="col-sm-4">Picture</label>
                                    <div class="col-sm-12">
                                        <div>
                                            <input type="file" name="faculty_img_src" id="picture" class="custom-input-file">
                                            <label for="picture">
                                                <i class="fa fa-upload"></i>
                                                <span>Choose a file…</span>
                                            </label>
                                        </div>
                                    </div>
                                
                    </div>
                        </div>
                                <input type="submit" class="btn btn-success" id="facultySubmitBtn" name="facultySubmitBtn" value="Finish">
                                <a href="facultyList.php" class="btn btn-secondary">Close</a>
                    </div>
                   
                        </div>
                    </div> 
                    </form></div><?php if(isset($msg)){echo $msg;} ?>
</section></section>
<!--div Container-Fluid close from header -->

<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-left");
}else
  sidebarBtn.classList.replace( "bx-menu","bx-menu-alt-right");
}
 </script>
 </body>
 </html>