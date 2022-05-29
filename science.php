<?php
    include("connection.php");

    //fetch courses
    $courses = mysqli_query($con,"SELECT * FROM `course` ORDER BY course_id ASC");

    
/////////////////////////////////////////////////////////visitors/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
session_start();
   
if(isset($_SESSION['views']))
    $_SESSION['views'] = $_SESSION['views']+1;
else
    $_SESSION['views']=1;

$sci = $_SESSION['views'];
 
  $sql = "INSERT INTO `course_view`(`sci`) VALUES ($sci)";

  if($con->query($sql) == TRUE){
    $msg = 'Counted';
  }
  else{
    $msg = "Not Counted";
  }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
?>
  
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Science</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/stylesci.css">
</head>
<body>

    <div class="bg_header">
        <div class="container">
            <div class="header_left_section">
                <p class="index_header_left">
                    <img src="images/header_mail.png">
                    <a class="header_info" href="#"><strong>Email: </strong>admission@eduworldeducation.com</a>
                </p>
                
                <p class="index_header_left index_header_right">
                    <img src="images/header_call.png">
                    <a class="header_info" href="tel: 6287287388"><strong>Call Now! 6287287388</strong>  
                    </a>
                </p>
                
                <div class="clearfix"></div>
            </div>
            
            <div class="header_right_section">
                <p>
                    <a href="https://www.facebook.com" class="header_social_icon"><img src="images/facebook.png"></a>
                    <a href="https://www.twitter.com" class="header_social_icon"><img src="images/twitter.png"></a>
                    <a href="https://www.instagram.com" class="header_social_icon"><img src="images/instagram.png"></a>
                    <a href="https://www.gmail.com" class="header_social_icon"><img src="images/google_plus.png"></a>
            
                </p>
            </div>
            
            <div class="clearfix"></div>
        </div>
    </div>
    
    
    <div>
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar5">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" class="img-responsive"></a>
          </div>
          <div id="navbar5" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">Home</a></li>
              <li><a href="index.php #about_us">About us</a></li>
              <li><a href="index.php #events">Events</a></li>
              <li><a href="index.php #courses">Courses</a></li>
              <li><a href="#Timetable">Classes</a></li>
              <li><a href="index.php #contact_us">Contact Us</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
    
    </div>
   
  

<div class="bg1" id="about_us">
	<div class="container">
		<div class="col-sm-6">
			<p class="index_about_company">Science</p>
			<p class="index_about_para">Science works to build and organise knowledge about the Universe by providing testable explanations and predictions.<br>We provide examination materials, study materials and test arrangements for our students.<br><br> Our fee structure is affordable, and reasonable. <br><br>
            Based on our student's ratings, we have the best Science trainers for you!</p>
		</div>
		
		<div class="col-sm-6"><img src="images/about_sci.jpg" class="img-responsive" style="padding:20px 0;"></div>

	</div>
</div>
<div class="bg5" id="Timetable">
	
        <div class="container">
		<h1 class="index_client_testimonial_heading">Classes</h1>
        <div class="row">
           <p> .. </p>
         <?php
         while($row=mysqli_fetch_array($courses)){
       ?>
      
			<div class="col-sm-3 home_services_top_padding">
				<p><i class="fa fa-book home_testimonial_quote" aria-hidden="true"><?php echo $row['sci_course_name'];?></i></p>
				<p class="index_testimoinial_para"><?php echo $row['sci_course_desc'] ?></p>
				<p class="index_testimoinial_para">New Batch Starting From: &nbsp <?php echo $row['sci_course_batch'] ?></p>
				<p><img class="index_testimonial_img" src= "<?php echo $row['sci_faculty_img_src']; ?>"><span class="index_testimonial_name"><span class="index_testimonial_blue_name"><?php echo $row['sci_course_faculty']; ?></p>
			</div>
		

<?php } ?>
</div></div></div>
<footer class="footer_bg" >
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a class="footer_menu_links"  href="index.php">Home</a>
                <a class="footer_menu_links" href="index.php #about_us">About us</a>
                <a class="footer_menu_links" href="index.php #courses">Courses</a></li>
                <a class="footer_menu_links" href="#Timetable">Classes</a>
                <a class="footer_menu_links" href="index.php #contact_us">Contact Us</a>
                
                <hr class="footer_hr">
                
                <span class="footer_responsive"><img src="images/footer_address.png"><span class="footer_address_text">Kishan cold storage gali, 06, Saidpur Rd, Patna, Bihar 800006</span></span>
                
                <span class="footer_responsive"><img src="images/footer_phone.png"><span class="footer_address_text">6287287388</span></span>
                
                <span class="footer_responsive"><img src="images/footer_mail.png"><span class="footer_address_text">admission@eduworldeducation.com</span></span>
            </div>
            
            <div class="col-md-2">
                <p class="footer_get_social_with_us" href="#" style="font-size:14px;color: aliceblue;"><strong>GET SOCIAL WITH US</strong></p>
                <hr class="footer_hr">
                <a href="https://www.facebook.com" class="footer_social_links"><img src="images/footer_facebook.png"></a>
                <a href="https://www.twitter.com" class="footer_social_links"><img src="images/footer_twitter.png"></a>
                <a href="https://www.gmail.com" class="footer_social_links"><img src="images/footer_google_plus.png"></a>
                <a href="https://www.linkedin.com" class="footer_social_links"><img src="images/footer_linked_in.png"></a>
            </div>
            
        <div>
    </div>
</footer>

<div class="copyright_bg">
    <div class="container">
        <p>&copy; Copyright 2022. All Rights Reserved.</p>
    </div>
</div>





</body>
</html>
