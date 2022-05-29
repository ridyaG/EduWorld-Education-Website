<?php 
include("header.php");
include("connection.php"); ?>
  <!--Table-->
  <div class="row mx-5 text-center">
<div class= "col-sm-9 mt-5" >
  
    <?php
    $sql = "SELECT * FROM `course`";
    $result= $con->query($sql);
    if($result-> num_rows > 0){
    ?>
    <table class="table">
    <p class="text-white p-2" style="background-color: rgba(252, 108, 13, 0.8); padding-top: 500px; margin-top: 20px;">Science Courses</p>   
    <thead>
            <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Faculty</th>
                <th scope="col">Batch Time</th>
                <th scope="col">Action</th>
           </tr>
        </thead>
<tbody>
  <?php
  while($row = $result->fetch_assoc()){ 

echo '<tr>';
echo  '<th scope="row">'.$row['course_id'].'</th>';
echo  '<td>'.$row['sci_course_name'].'</td>';
echo  '<td>'.$row['sci_course_faculty'].'</td>';
echo  '<td>'.$row['sci_course_batch'].'</td>';
echo  '<td>';
echo   '
<form action = "editcourse.php" method="POST" class = "d-inline">
<input type = "hidden" name = "id" value = '.$row["course_id"].'>
        <button 
        type = "submit"
        class = "btn btn-success mr-3"
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
class = "btn btn-info"
name = "delete"
value = "Delete"
>
<i class= "fa fa-trash"></i>
</button>
</form>
 </td>
</tr>';
 } ?>
<tbody>
</table>
<?php } else {
  echo "0 Results";
  }
  
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
    if($con->query($sql) == TRUE){
    echo'<meta http-equiv="refresh" content= "0; URL=?deleted" />';
    }
    else {
      echo 'Unable to delete data';
    }
  }
  ?>
</div></div>
<!--div Row close from header -->
<div>
    <a class="btn btn-danger box" href="addCourse.php" style = "margin-top: 30px; margin-left: 53vw;"><i class="fa fa-plus fa-2x"></i></a>
</div>

<!--Commerce-->
<div class="row mx-5 text-center">
<div class= "col-sm-9 mt-5" >

<?php
    $sql2 = "SELECT * FROM `course_comm`";
    $result2= $con->query($sql2);
    if($result2-> num_rows > 0){
    ?>

<table class="table">
    <p class="text-white p-2" style="background-color: rgba(252, 108, 13, 0.8); padding-top: 500px; margin-top: 50px;">Commerce Courses</p>   
    <thead>
            <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Faculty</th>
                <th scope="col">Batch Time</th>
                <th scope="col">Action</th>
           </tr>
        </thead>
<tbody>
  <?php
  while($row = $result2->fetch_assoc()){ 

echo '<tr>';
echo  '<th scope="row">'.$row['comm_course_id'].'</th>';
echo  '<td>'.$row['comm_course_name'].'</td>';
echo  '<td>'.$row['comm_course_faculty'].'</td>';
echo  '<td>'.$row['comm_course_batch'].'</td>';
echo  '<td>';
echo   '
<form action = "editcourseComm.php" method="POST" class = "d-inline">
<input type = "hidden" name = "id" value = '.$row["comm_course_id"].'>
        <button 
        type = "submit"
        class = "btn btn-success mr-3"
        name = "view"
        value = "View"
        >
        <i class="fa fa-pencil"></i>
        </button>
</form>
 <form action = "" method="POST" class = "d-inline">
  <input type = "hidden" name = "id" value = '.$row["comm_course_id"].'>
<button
type = "submit"
class = "btn btn-info"
name = "delete"
value = "Delete"
>
<i class= "fa fa-trash"></i>
</button>
</form>
 </td>
</tr>';
 } ?>
<tbody>
</table>
<?php } else {
  echo "0 Results";
  }
  
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM course_comm WHERE comm_course_id = {$_REQUEST['id']}";
    if($con->query($sql) == TRUE){
    echo'<meta http-equiv="refresh" content= "0; URL=?deleted" />';
    }
    else {
      echo 'Unable to delete data';
    }
  }
  ?>
</div></div>
<!--div Row close from header -->
<div>
    <a class="btn btn-danger box" href="addCourseComm.php" style = "margin-top: 30px; margin-left: 53vw;"><i class="fa fa-plus fa-2x"></i></a>
</div>

<!--Arts Courses-->
<div class="row mx-5 text-center">
<div class= "col-sm-9 mt-5" >

<?php
    $sql = "SELECT * FROM `course_arts`";
    $result= $con->query($sql);
    if($result-> num_rows > 0){
    ?>

<table class="table">
    <p class="text-white p-2" style="background-color: rgba(252, 108, 13, 0.8); padding-top: 500px; margin-top: 50px;">Arts Courses</p>   
    <thead>
            <tr>
                <th scope="col">Course Code</th>
                <th scope="col">Course Name</th>
                <th scope="col">Faculty</th>
                <th scope="col">Batch Time</th>
                <th scope="col">Action</th>
           </tr>
        </thead>
<tbody>
  <?php
  while($row = $result->fetch_assoc()){ 

echo '<tr>';
echo  '<th scope="row">'.$row['arts_course_id'].'</th>';
echo  '<td>'.$row['arts_course_name'].'</td>';
echo  '<td>'.$row['arts_course_faculty'].'</td>';
echo  '<td>'.$row['arts_course_batch'].'</td>';
echo  '<td>';
echo   '
<form action = "editcourseArts.php" method="POST" class = "d-inline">
<input type = "hidden" name = "id" value = '.$row["arts_course_id"].'>
        <button 
        type = "submit"
        class = "btn btn-success mr-3"
        name = "view"
        value = "View"
        >
        <i class="fa fa-pencil"></i>
        </button>
</form>
 <form action = "" method="POST" class = "d-inline">
  <input type = "hidden" name = "id" value = '.$row["arts_course_id"].'>
<button
type = "submit"
class = "btn btn-info"
name = "delete"
value = "Delete"
>
<i class= "fa fa-trash"></i>
</button>
</form>
 </td>
</tr>';
 } ?>
<tbody>
</table>
<?php } else {
  echo "0 Results";
  }
  
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM course_arts WHERE arts_course_id = {$_REQUEST['id']}";
    if($con->query($sql) == TRUE){
    echo'<meta http-equiv="refresh" content= "0; URL=?deleted" />';
    }
    else {
      echo 'Unable to delete data';
    }
  }
  ?>
</div></div>
<!--div Row close from header -->
<div>
    <a class="btn btn-danger box" href="addCourseArts.php" style = "margin-top: 30px; margin-left: 53vw; margin-bottom: 30px"><i class="fa fa-plus fa-2x"></i></a>
</div>

</section></section>
<!--div Container-Fluid close from header -->

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
 </body>
 </html>