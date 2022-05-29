<?php
session_start();
error_reporting(0);
include 'apply-header.php';
include('connection.php');



$sql = "select * from admission where email='".$_SESSION['email']."'"; 
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
$photo=$row['photo'];


if(isset($_POST['btnupload'])){
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"],"./images/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];

 $sql = " update admission set ssce='$location' where email='".$_SESSION['email']."'";
   $_SESSION['reg_success']=$location;
   if (mysqli_query($con, $sql)) {

    ?>
									
<script>
alert('Marksheet has been Uploaded successfully ');
window.location = "upload.php";

</script>

	<?php	
}
}

?>

<title>Upload Image| </title>
	<style type="text/css">
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {color: #FF0000}

    </style>
	<div class="container" style ='text-align: center; font-size: 20px; background: url("./images/home_form_bg.jpg");'>
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
       	<form  class="wizard-big" method="post"  enctype="multipart/form-data">
          <fieldset>
            
			  <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail"><span class="style1">Upload your Marksheet Here </span><br />
              <br />
              Fullname: <?php echo $_SESSION['fullname']; ?>
              </label>
            </div>
			
            <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email: <?php echo $_SESSION['email']; ?>
             
              </label>
            </div>

<div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Application ID: <?php echo $_SESSION['ApplicationID']; ?>
             
              </label>
            </div>
			 <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1"><span class="controls"><br />
              <br />
              <span class="style2" style ='margin-bottom: 50px; color: red;'> N/B: Copy out your email and Application ID</span> <br/>
              <img src="./<?php echo $row['ssce'];?>"  width="333" height="333" style = 'border="6"' /></span><br/>
              <br />
             
                <input type="file" class="form-control" name="image">
              </label>
            </div>
		  <div class="form-group">
             
			 
		    <label class="col-lg-12 control-label" for="pass1"></label>
		  </div>
                <table style = 'border="0"'>
                  <tr>
					  <div class="form-group">
                          <div style = 'text-align: center;'>
                            <button class="btn btn-primary" type="submit" name="btnupload">Upload</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" name="btnupload" onclick="window.location.href='/index_user.php'">Finish</button>
                          </div></div></tr>
          </table> 
             
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>