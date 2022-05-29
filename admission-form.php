<?php
session_start();
error_reporting(1);
include 'form_header.php';
include('connection.php');


//update user status
$sqli = " update users set status='1' where mobile='".$_SESSION['mobile']."'";
if (mysqli_query($con, $sqli)) {
}

if(isset($_POST["btnsubmit"]))
{
$current_date = date('Y-m-d');
//Get application ID
function applicationID(){
$string = (uniqid(rand(), true));
return substr($string, 0,5);
}
	
$applicationID = "ADM/".date("Y")."/".applicationID();		


$fullname = mysqli_real_escape_string($con,$_POST['txtfullname']);
$sex = mysqli_real_escape_string($con,$_POST['cmdsex']);
$phone = mysqli_real_escape_string($con,$_POST['txtphone']);
$email = mysqli_real_escape_string($con,$_POST['txtemail']);
$board = mysqli_real_escape_string($con,$_POST['txtlga']);
$state = mysqli_real_escape_string($con,$_POST['txtstate']);
$regno = mysqli_real_escape_string($con,$_POST['txtjambno']);
$boardscore = mysqli_real_escape_string($con,$_POST['txtjambscore']);
$faculty = mysqli_real_escape_string($con,$_POST['txtfaculty']);
$dept = mysqli_real_escape_string($con,$_POST['txtdept']);
$exam = mysqli_real_escape_string($con,$_POST['txtexam']);

$photo='upload/default.jpg';
$credential='upload/Result-Report-card-software.png';

$status='0';


//check if registration number already exist
$sql_u = "SELECT * FROM admission WHERE reg_number='$regno'";
$res_u = mysqli_query($con, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Registration number already exist";

}else {	
//check if  email already exist
$sql_u = "SELECT * FROM admission WHERE email='$email'";
$res_u = mysqli_query($con, $sql_u);
if (mysqli_num_rows($res_u) > 0) {
$msg_error = "Email already exist";

}else {
$sql = "INSERT INTO admission (fullname,sex,phone,email,board,state,reg_number,board_score,faculty,dept,details,ssce,status,photo,date_admission,applicationID)VALUES( '$fullname','$sex','$phone','$email','$board','$state','$regno','$boardscore','$faculty','$dept','$exam','$credential','$status','$photo','$current_date','$applicationID')";
 
 if ($con->query($sql) === TRUE) {
 
$_SESSION['email']=$email;
$_SESSION['fullname']=$fullname;
$_SESSION['ApplicationID']=$applicationID;

header("Location: upload.php"); 
    }else { 
?>
<script>
alert('Problem Occured , Try Again');

</script>
<?php
}
}
}
}
?>

<style>
    .form-group{
  margin-top: 10px;
}</style>

<form class="form-horizontal contactform" action="" method="post" name="f" >
          <fieldset>
	
                <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Fullname:
                <input type="text"  id="pass1" class="form-control" name="txtfullname" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
            <label class="col-lg-12 control-label" for="pass1">Sex:
               <select name="cmdsex" id="gender" class="form-control" required="">
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                              </select>
              </label>
            </label>
            </div>
			  <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">phone:
                <input type="text"  id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" required="">
              </label>
            </div>
				  <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email:
             <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php if (isset($_POST['txtemail']))?><?php echo $_POST['txtemail']; ?>" required>
              </label>
            </div>
			 <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Board:
                <input type="text"  id="pass1" class="form-control" name="txtlga" value="<?php if (isset($_POST['txtlga']))?><?php echo $_POST['txtlga']; ?> " required="">
              </label>
            </div>
				<!--<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">State:
                <input type="text"  id="pass1" class="form-control" name="txtstate" value="<?php //if (isset($_POST['txtstate']))?><?php //echo $_POST['txtstate']; ?>" required="">
              </label>
            </div>-->
            <div class="input_field select_option" name="txtstate" value="<?php if (isset($_POST['txtstate']))?><?php echo $_POST['txtstate']; ?>" >
            <label class="col-lg-12 control-label" for="pass1" >State:
                <select required="">
                <option>Select a State</option><i aria-hidden="true" class="fa fa-caret-up"></i>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                </select>
              </div>
			
		<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Reg. Number:
                <input type="text"  id="pass1" class="form-control" name="txtjambno"  value="<?php if (isset($_POST['txtjambno']))?><?php echo $_POST['txtjambno']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Board score:
                <input type="text"  id="pass1" class="form-control" name="txtjambscore"  value="<?php if (isset($_POST['txtjambscore']))?><?php echo $_POST['txtjambscore']; ?>" required="">
              </label>
            </div>
						<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Faculty:
                <input type="text"  id="pass1" class="form-control" name="txtfaculty"  value="<?php if (isset($_POST['txtfaculty']))?><?php echo $_POST['txtfaculty']; ?>" required="">
              </label>
            </div>
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Department:
                <input type="text"  id="pass1" class="form-control" name="txtdept"  value="<?php if (isset($_POST['txtdept']))?><?php echo $_POST['txtdept']; ?>" required="">
              </label>
            </div>
			
			<div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Preparation(Exam Name/Year):
                <input type="text"  id="pass1" class="form-control" name="txtexam"  value="<?php if (isset($_POST['txtexam']))?><?php echo $_POST['txtexam']; ?>" required="">
              </label>
            </div>
		 

            <div style="height: 10px;clear: both"></div>

            <div class="form-group">
			
			
              <div class="col-lg-10">
                <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button> 
              </div>
            </div>
          </fieldset>
        </form>