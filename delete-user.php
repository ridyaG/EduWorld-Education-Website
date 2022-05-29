<?php
include('connection.php');
$id=$_GET['id'];
$sql = "DELETE From `admission` where ID ='$id'";
$result = mysqli_query($con, $sql);
//$row = mysqli_num_rows($result);
if ($result >0){

header("location: records.php");
}
?>