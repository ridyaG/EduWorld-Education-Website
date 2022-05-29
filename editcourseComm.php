<?php
include('header.php');
include('connection.php');

//update
if(isset($_REQUEST['requpdate'])){
//---image update---//
$img_name = time() . '_' . $_FILES['comm_faculty_img_src']['name'];
$tmp_name = $_FILES['comm_faculty_img_src']['tmp_name'];
$cfacultyimg = 'images/' . $img_name;
move_uploaded_file($tmp_name, $cfacultyimg);
//---------------------------------------------------------------------------//



if(($_REQUEST['comm_course_id'] == "") || ($_REQUEST['comm_course_name'] == "") || ($_REQUEST['comm_course_faculty'] == "") || ($_REQUEST['comm_course_desc'] == "") || ($_REQUEST['comm_course_batch'] == "") || ($_REQUEST['comm_course_price'] == "" )){
$msg = '<div class = "alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields </div>';
} else {
    $cid = $_REQUEST['comm_course_id'];
    $cname = $_REQUEST['comm_course_name'];
    $cdesc = $_REQUEST['comm_course_desc'];
    $cfaculty = $_REQUEST['comm_course_faculty'];
    $cduration = $_REQUEST['comm_course_batch'];
    $cprice = $_REQUEST['comm_course_price'];

    $sql = "UPDATE course_comm SET comm_course_id = '$cid', comm_course_name = '$cname', comm_course_desc = '$cdesc', comm_course_faculty = '$cfaculty', comm_course_batch = '$cduration', comm_course_price = '$cprice', comm_faculty_img_src = '$cfacultyimg' WHERE comm_course_id = '$cid'";
    if($con->query($sql) == TRUE){
        $msg = '<div class= "alert alert-success col-sm-9 ml-5 mt-5" role = "alert"> Updated Successfully </div>';
    }
    else{
        $msg = '<div class = "alert alert-danger col-sm-9 ml-5 mt-5" role = "alert">Failed To Update</div>';
    }

}
}
?>
<div class="form-background" style = " margin-left: 500px;"> 
<div class="col-sm-6 mt-5 mx-3 jumbotron" >
       
       <h3 class="text-center">Update Course Details</h3>
       <?php
       if(isset($_REQUEST['view'])){
           $sql = "SELECT * FROM course_comm WHERE comm_course_id = {$_REQUEST['id']}";
           $result = $con->query($sql);
           $row = $result->fetch_assoc();
       }

       ?>
        
        <form action="" method="POST" enctype="multipart/form-data" >
        <div class="form-group">
                <label for="comm_course_id">Course Code</label>
                <input type="text" class="form-control" id ="comm_course_id" name="comm_course_id"
                value="<?php if(isset($row['comm_course_id'])) { echo $row['comm_course_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="comm_course_name">Course Name</label>
                <input type="text" class="form-control" id ="comm_course_name" name="comm_course_name"
                value="<?php if(isset($row['comm_course_name'])) { echo $row['comm_course_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="comm_course_desc">Course Description</label>
                <textarea type="text" class="form-control" id ="comm_course_desc" name="comm_course_desc"
                row=2><?php if(isset($row['comm_course_desc'])) { echo $row['comm_course_desc'];} ?></textarea>
            </div>
            <div class="form-group">
                <label for="comm_course_faculty">Course Faculty</label>
                <input type="text" class="form-control" id ="comm_course_faculty" name="comm_course_faculty"
                value="<?php if(isset($row['comm_course_faculty'])) { echo $row['comm_course_faculty'];} ?>">
            </div>
            <div class="form-group">
                <label for="comm_course_faculty">Course Faculty Image Path</label>
                <input type="file" class="form-control" id ="comm_faculty_img_src" name="comm_faculty_img_src"
                value="<?php if(isset($row['comm_faculty_img_src'])) { echo $row['comm_faculty_img_src'];} ?>">
            </div>
            <div class="form-group">
                <label for="comm_course_batch">Batch Time</label>
                <input type="text" class="form-control" id ="comm_course_duration" name="comm_course_batch"
                value="<?php if(isset($row['comm_course_batch'])) { echo $row['comm_course_batch'];} ?>">
            </div>
            <div class="form-group">
                <label for="comm_course_price">Course Price</label>
                <input type="text" class="form-control" id ="comm_course_price" name="comm_course_price"
                value="<?php if(isset($row['comm_course_price'])) { echo $row['comm_course_price'];} ?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id ="requpdate" name="requpdate">Update</button>
                <a href="courses.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)){echo $msg;} ?>
</form>     </div>   
    </div>
</section>
</section>

<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-righ t");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

 </scricomm