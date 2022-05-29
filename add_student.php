<?php
include('connection.php');

if(isset($_POST['SubmitBtn'])){

	$img_name = time() . '_' . $_FILES['photo']['name'];
	$tmp_name = $_FILES['photo']['tmp_name'];
  $photo = 'images/' . $img_name;
	move_uploaded_file($tmp_name, $photo);

  //check for empty fields
  if(($_REQUEST['student_name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['prep'] == "") || ($_REQUEST['phone'] == "") || ($_REQUEST['sex'] == "")|| ($_REQUEST['marks'] == "")){
      $msg = '<div class="alert alert-warning col-sm-9 ml-5 mt-2">Fill All Fields</div>';
  }else{
      $name = $_REQUEST['student_name'];
      $sex = $_REQUEST['sex'];
      $phone = $_REQUEST['phone'];
      $email = $_REQUEST['email'];
      $board = $_REQUEST['board'];
      $state = $_REQUEST['state'];
      $reg_num = $_REQUEST['reg_num'];
      $dept = $_REQUEST['dept'];
      $prep = $_REQUEST['prep'];
      $date = $_REQUEST['date_admission'];
      $roll = $_REQUEST['roll'];
      $sql= "INSERT INTO students (student_name, sex, phone, email, board, state, reg_num, dept, prep, date_admission, photo, roll) VALUES ('$name', '$sex', '$phone', '$email', '$board', '$state', '$reg_num', '$dept', '$prep', '$date', '$photo', '$roll')";

      if($con->query($sql) == TRUE){
        $msg = '<div class= "alert alert-success cl-sm-6 ml-5 mt-2" style = "text-align: center;">Student Added Successfully!</div>';
      }
      else{
        $msg = '<div class= "alert alert-danger cl-sm-6 ml-5 mt-2">Unable to Add Student</div>';
      }
  }
}
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
          <a href="facultyList.php" class = "menu">
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
            <i class='fa fa-users' ></i>
            <span class="links_name">Students</span>
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
        <span class="dashboard">Add Student</span>
      </div>
      <div class="profile-details">
        <img src="profile-pic.jpg" alt="">
        <span class="admin_name">Admin</span>
      </div>
    </nav>
    <section class="table-section">

  <!-- Form controls -->
  <div class="col-sm-12">
        <div class="card">                
            <div class="card-header" style="margin-top: 20px;">
               <h4>Enter Student Details</h4>
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
                    <form action="add_student.php" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                     <input type="hidden" name="csrf_test_name" value="10d4f2da0a25d893537b085608e24474">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                            <div class="row" style="margin-top: 20px;">
                                <div class="form-group col-sm-6">
                                    <label for="student_name" class="col-sm-4">Name<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="student_name" class="form-control" type="text" placeholder="Name" id="student_name">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="sex" class="col-sm-4">Gender: <i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="sex" class="form-control" type="text" placeholder="Gender" id="sex">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="phone" class="col-sm-4">Mobile<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="phone" class="form-control" type="number" placeholder="Mobile" id="phone">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email" class="col-sm-4">Email<i class="text-danger"> *</i></label>
                                    <div class="col-sm-12">
                                        <input name="email" class="form-control" type="text" placeholder="Email" id="email" onblur="email_goto_username(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="board" class="col-sm-4">Board<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                        <input name="board" class="form-control" type="text" id="board" placeholder="Board">
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="state" class="col-sm-4">State<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                    <input name="state" class="form-control" type="text" id="state" placeholder="State">
                                </div>
                            </div></div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="reg_num" class="col-sm-4">Reg. No.<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="reg_num" id="skills" placeholder="Reg No." class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="marks" class="col-sm-4">Marks<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="marks" id="marks" placeholder="Marks" class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="dept" class="col-sm-4">Department<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="dept" id="dept" placeholder="dept" class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="prep" class="col-sm-4">Preparation For<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="prep" id="prep" placeholder="Exam" class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="date_admission" class="col-sm-4 datepicker">Date<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="date_admission" id="date" placeholder="Admission Date" class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-sm-9">
                                    <label for="roll" class="col-sm-4">Roll Number<i class="text-danger"> </i></label>
                                    <div class="col-sm-50">
                                        <input type="text" name="roll" id="roll" placeholder="Roll No." class="form-control" style = "margin-left: 15px;">
                                    </div>
                                </div>
</div>
                                <div class="form-group col-sm-6">
                                    <label for="photo" class="col-sm-4">Picture</label>
                                    <div class="col-sm-12">
                                        <div>
                                            <input type="file" name="photo" id="photo" class="custom-input-file">
                                            <label for="picture">
                                                <i class="fa fa-upload"></i>
                                                <span>Choose a file…</span>
                                            </label>
                                        </div>
                                    </div>
                                
                    </div>
                        </div>
                                <input type="submit" class="btn btn-success" id="SubmitBtn" name="SubmitBtn" value="Finish">
                                <a href="students.php" class="btn btn-secondary">Close</a>
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