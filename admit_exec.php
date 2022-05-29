<?php
session_start();
error_reporting(0);
include('connection.php');
if(strlen($_SESSION['admin-username'])=="")
    {   
    header("Location: admin.php"); 
    }
    else{
	
$username=$_SESSION['admin-username'];
$current_date = date('Y-m-d H:i:s');

 // for Cancel admission    	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);

mysqli_query($con,"update admission set status='0' where ID='$id'");
header("location: records.php");
}

// for admit user
if(isset($_GET['uid']))
{
$uid=intval($_GET['uid']);

mysqli_query($con,"update admission set status='1' where ID='$uid'");
header("location: records.php");

}
}
?>