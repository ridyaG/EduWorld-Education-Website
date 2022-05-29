<?php
include('header.php');
include('connection.php');

//update



if(isset($_REQUEST['requpdate'])){
    
//---image update---//
    $img_name = time() . '_' . $_FILES['sci_faculty_img_src']['name'];
	$tmp_name = $_FILES['sci_faculty_img_src']['tmp_name'];
    $cfacultyimg = 'images/' . $img_name;
	move_uploaded_file($tmp_name, $cfacultyimg);
//---------------------------------------------------------------------------//

if(($_REQUEST['course_id'] == "") || ($_REQUEST['sci_course_name'] == "") || ($_REQUEST['sci_course_faculty'] == "") || ($_REQUEST['sci_course_desc'] == "") || ($_REQUEST['sci_course_batch'] == "") || ($_REQUEST['sci_course_price'] == "" )){
$msg = '<div class = "alert alert-warning col-sm-9 ml-5 mt-2" role="alert">Fill All Fields </div>';
} else {
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['sci_course_name'];
    $cdesc = $_REQUEST['sci_course_desc'];
    $cfaculty = $_REQUEST['sci_course_faculty'];
    $cduration = $_REQUEST['sci_course_batch'];
    $cprice = $_REQUEST['sci_course_price'];

    $sql = "UPDATE course SET course_id = '$cid', sci_course_name = '$cname', sci_course_desc = '$cdesc', sci_course_faculty = '$cfaculty', sci_course_batch = '$cduration', sci_course_price = '$cprice', sci_faculty_img_src = '$cfacultyimg' WHERE course_id = '$cid'";
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
           $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
           $result = $con->query($sql);
           $row = $result->fetch_assoc();
       }

       ?>
        
        <form action="" method="POST" enctype="multipart/form-data" >
        <div class="form-group">
                <label for="course_id">Course Code</label>
                <input type="text" class="form-control" id ="course_id" name="course_id"
                value="<?php if(isset($row['course_id'])) { echo $row['course_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="sci_course_name">Course Name</label>
                <input type="text" class="form-control" id ="sci_course_name" name="sci_course_name"
                value="<?php if(isset($row['sci_course_name'])) { echo $row['sci_course_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="sci_course_desc">Course Description</label>
                <textarea type="text" class="form-control" id ="sci_course_desc" name="sci_course_desc"
                row=2><?php if(isset($row['sci_course_desc'])) { echo $row['sci_course_desc'];} ?></textarea>
            </div>
            <div class="form-group">
                <label for="sci_course_faculty">Course Faculty</label>
                <input type="text" class="form-control" id ="sci_course_faculty" name="sci_course_faculty"
                value="<?php if(isset($row['sci_course_faculty'])) { echo $row['sci_course_faculty'];} ?>">
            </div>
            <div class="form-group">
                <label for="sci_course_faculty">Course Faculty Image Path</label>
                <input type="file" class="form-control" id ="sci_faculty_img_src" name="sci_faculty_img_src"
                value="<?php if(isset($row['sci_faculty_img_src'])) { echo $row['sci_faculty_img_src'];} ?>">
            </div>
            <div class="form-group">
                <label for="sci_course_batch">Batch Time</label>
                <input type="text" class="form-control" id ="sci_course_duration" name="sci_course_batch"
                value="<?php if(isset($row['sci_course_batch'])) { echo $row['sci_course_batch'];} ?>">
            </div>
            <div class="form-group">
                <label for="sci_course_price">Course Price</label>
                <input type="text" class="form-control" id ="sci_course_price" name="sci_course_price"
                value="<?php if(isset($row['sci_course_price'])) { echo $row['sci_course_price'];} ?>">
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

 </script>