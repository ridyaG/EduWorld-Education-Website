<?php
session_start();
//error_reporting(0);

include('connection.php');
if(strlen($_SESSION['uemail'])=="" || !isset($_SESSION["uemail"]))
    {   
    header("Location: student-login.php"); 
    }
    else{
	}
      
$email = $_SESSION['uemail'];
                
$sql = "select * from admission where email='$email'"; 
$result = $con->query($sql);
$rowaccess = mysqli_fetch_array($result);

?>

		   
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/user-style.css" rel="stylesheet">
    <link rel="shortcut icon" href="./images/favicon.jpg" type="image/x-icon" />

</head>



<body>
    
	<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img src="./images/<?php echo $rowaccess['photo'];  ?>" alt="image" width="142" height="153" class="img-circle"/>
                             </span>
  
   
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="text-muted text-xs block"><?php echo $rowaccess['email'];  ?> <b class="caret"></b></span><span></span></a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="student-logout.php">Logout</a></li>
                        </ul>
                    
  </div>    
  <li class="nav-header">
                 <?php
			   include('sidebar.php');
			   ?> 
                </li>
			   
	       </ul></div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to your Dashboard</span>
                </li>
            </ul>

        </nav>
        </div>
<div class="wrapper wrapper-content">
        <div class="row">
		<?php 
                 
    $query = "SELECT * FROM admission"; 
       $result = mysqli_query($con, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row_users = mysqli_num_rows($result); 
          
    }           
    ?>
	         
			        <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label label-primary pull-right">Application ID</span>
</h5>
						  
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php echo $rowaccess['applicationID']; ?></h3>
						  </div>
                        </div>
                    </div>
	                
					           <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label label-info pull-right">Date Registered</span>
</h5>
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php echo $rowaccess['date_admission'];  ?></h3>
						  </div>
                        </div>
                    </div>
					
                                     <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                              <h5><span class="label label-secondary pull-right">Admission Status</span>
</h5>
                            </div>
                            <div class="ibox-content">
                                <h3 class="no-margins"><?php if(($rowaccess['status'])==(0))
{ ?>
 <h4 style="color:red">No Admission yet.</h4>
			   <?php } else {?>
	 <h4 style="color:green">Congrats, Admission Offered</h4>
     <?php } ?>
</h3></div>
                        </div>
                    </div>

					                   
 
        <div class="row">
          <div class="col-lg-12"> 
            <p>&nbsp;</p>
            <p></p>
            <div class="row">&nbsp;</div>
          </div>
          </div>
            <div class="footer"><div>
<?php include('footer.php'); ?></div>
        </div>
        </div>
</div>

            <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

</body>
</html>