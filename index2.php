<?php 
session_start();
include("connection.php");

///////////////////////////////////fetch notices////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$notices = mysqli_query($con, "SELECT * FROM `notices` ORDER BY id ASC");
	
///////////////////////////////////send feedback////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['commentSubmitBtn'])){
$name = $_POST["uname"];
$email = $_POST["uemail"];
$mobile = $_POST["umobile"];
$subject = $_POST["usubject"];
$comments = $_POST["ucomments"];
$sql = "INSERT INTO `feedback`(uname, uemail, umobile, usubject, ucomments) VALUES ('{$name}','{$email}','{$mobile}','{$subject}','{$comments}')";
$result = mysqli_query($con, $sql) or die("Query failed");


if($con->query($sql) == TRUE){
	$msg = '<div class= "alert alert-success col-12" role = "alert"> Updated Successfully </div>';
}
else{
	$msg = '<div class = "alert alert-danger col-12" role = "alert">Failed To Update</div>';
}

mysqli_close($con);
}
/////////////////////////////////////////////////////////Add login///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////visitors/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include('Mobile_Detect.php');
include('BrowserDetection.php');


$browser=new Wolfcast\BrowserDetection;

$browser_name=$browser->getName();
$browser_version=$browser->getVersion();

$detect=new Mobile_Detect();

if($detect->isMobile()){
	$type='Mobile';
}elseif($detect->isTablet()){
	$type='Tablet';
}else{
	$type='PC';
}

if($detect->isiOS()){
	$os='IOS';
}elseif($detect->isAndroidOS()){
	$os='Android';
}else{
	$os='Window';
}

$url=(isset($_SERVER['HTTPS'])) ? "https":"http";
$url.="//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ref='';
if(isset($_SERVER['HTTP_REFERER'])){
	$ref=$_SERVER['HTTP_REFERER'];
}
$sql="insert into visitor(browser_name,browser_version,type,os,url,ref) values('$browser_name','$browser_version','$type','$os','$url','$ref')";
mysqli_query($con,$sql);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edu World- Set Your Career With Us </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Open+Sans:400,600,700,800" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=601e75803d01430011c105c8&product=image-share-buttons' async='async'></script>

</head>
<body>
	<!--preloader
<div class="pagewrapper" id = "content">
	<div class="loader-wrap" id = "preloader">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>  
		 
    </div>-->




<div class="bg_header">
	<div class="container">
		<div class="header_left_section">
			<p class="index_header_left">
				<img src="images/header_mail.png">
				<a class="header_info" href="#"><strong>Email:  </strong>admission@eduworldeducation.com</a>
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
  <!--<nav class="navbar navbar-default">
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
        <ol class="nav navbar-nav navbar-right">
		  <li><a href="#">Home</a></li>
		  <li><a href="#events">Events</a></li>
          <li><a href="#courses">Courses</a></li>
		  <li><a href="#results">Results</a></li>
		  <li><a href="#contact_us">Contact Us</a></li>
		  <li><a href = "login.php"><span class = "fa fa-user"></span> Sign In</a></li>
		  <li><a onclick="myFunction()">Apply</a></li> 
        </ol>
      </div>
      <!-/.nav-collapse -->
  <nav class="container1">
    <input id="nav-toggle" type="checkbox" />
    <div class="logo">Con<strong>flix</strong></div>
    <ul class="links">
      <li class="list">
        <a href="">Home</a>
        <div class="home_underline"></div>
      </li>
      <li class="list">
        <a href="">Products</a>
        <div class="home_underline"></div>
      </li>
      <li class="list">
        <a href="">About</a>
        <div class="home_underline"></div>
      </li>
      <button class = "b1">Contact</button>
    </ul>
    <label for="nav-toggle" class="icon-burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </label>
  </nav>
    </div>
    <!--/.container-fluid -->
  <!--</nav>-->

</div>

<script>
function myFunction() {
	alert("Please Sign-in first!");}
</script>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
		<div class="content-overlay" ></div>
      <a href="#"><img src="images/slider1.jpg" alt="slider1" style="width:100%;z-index: -10;"></a>
	  <div class="carousel-item">
		<div class="carousel-caption d-none d-md-block">
        </div>
	  </div>
    </div>

    <div class="item">
      <a href="#"><img src="images/slider2.jpg" alt="slider2" style="width:100%;z-index: -10;"></a>
	  <div class="carousel-item">
			<div class="carousel-caption d-none d-md-block">
		</div>
	  </div>
    </div>
	
	<div class="item">
		<a href="#"><img src="images/slider3.jpg" alt="slider2" style="width:100%;z-index: -10;"></a>
		<div class="carousel-item">
			<div class="carousel-caption d-none d-md-block">
		</div>
	  </div>
	  </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="home_about_us_bg" id="about_us">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 home_padding_top_bottom">
				<h2 class="home_about_us_about">About Us</h2>
				<p class="home_about_sub_heading">Aanand Kumar</p>
				<p class="home_about">Founder Member & CEO</p>
				<!--<p class="home_about_sub_heading">Rohit Kumar</p>
				<p class="home_about">Managing Director </p>-->
				<h5 class="home_about_us"><i class="fa fa-trophy"> &nbsp Our Mission</i></h5>
	
			<p class="home_about_para">We Established in the year 2008. Eduworld has admitted its name in numerous success stories. Tution classes are very helpful for students to overcome their weakness in subjects in which they struggle. We work with you around the clock to help you with your queries.</p>
			
			<h5 class="home_about_us"><i class="fa fa-user"> &nbsp Our Strategy</i></h5>
			<p class="home_about_para">At EduWorld we understand that having proper guidance and support is equally important for gaining the insight needed in order to prosper.</p>
			</div>
			<div class="col-sm-6 home_padding_top_bottom">
				<p><img src="images/about_img.jpg" class="img-responsive"></p>
			</div>
		</div>
	</div>
</div>

<div class="home_achievements_bg" id="events">
<div class="news">
	<h3 style = "font-family: 'Josefin Sans', sans-serif;">EVENT UPDATES</h3>
	<marquee direction="up" height= "410px;" onmouseover="this.stop();" onmouseout="this.start();">
	<?php
         while($row=mysqli_fetch_array($notices)){
       ?>
		<div class="news-block">
			<div class="news-icon">
			<i class="fa fa-newspaper-o"></i>
		    </div>
		    <div class="news-post">
			<p><?php echo $row['notice_detail']; ?></p>
		    </div>
		</div>
	<?php } ?>
	</marquee>
</div></div>

<div class="home_our_courses_bg" id="courses">	
	<div class="container">
		<h1 class="home_our_courses_head">Our Courses</h1>
		<div class="box">
			<div class="imgBox">
				<img src="images/science.jpg">
			</div>
			<div class="details">
				<div class="content">
					<a href="science.php"><h2>Science</h2></a>
					<p>Science works to build and organise knowledge about the Universe by providing testable explanations and predictions.<br>
					   Based on our student's ratings, we have the best Science trainers for you!</p>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images/commerce.jpg">
			</div>
			<div class="details">
				<div class="content">
					<a href="commerce.php"><h2>Commerce</h2></a>
					<p>EduWorld provides the stream of Chartered Accountancy(CA) and Cost and Management Accountancy(CMA).<br>
					   Thus, we provide those excellent standards of quality education at affordable fees. </p>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images/arts.jpg">
			</div>
			<div class="details">
				<div class="content">
					<a href="arts.php"><h2>Arts</h2></a>
					<p>The major subjects in Arts Stream include Economics, Geography, Hindi, History, Philosophy, Political Science, Psychology, Regional language, Sociology etc.<br>
					   Based on our student's ratings, we have the best trainers for you! </p>
				</div>
			</div>
		</div>
	</div>
</div>



<!---->
<div class="home_our_courses_bg" id="studentshub">	
	<div class="container">
		<h1 class="home_our_courses_head">Previous Year Questions & Solutions</h1>
		<div class="box">
			<div class="imgBox">
				<img src="images/jeem1.png">
			</div>
			<div class="details">
				<div class="content">
					<a href="pdf/JEE-Main.pdf">
					<h2>JEE Mains</h2>
</a>
					<p>JEE Main and JEE Advanced are national level entrance exams which are held for offering admission in the premier engineering institutes in India. </p>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images/jeea.png">
			</div>
			<div class="details">
				<div class="content">
				<a href="pdf/JEE-Adv.pdf">	
					<h2>JEE Advanced</h2></a>
					
					<p>EduWorld provides free JEE study material which is complete in itself, covering all the topics which are required to study for JEE Advanced examinations. </p>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images/neet.jpg">
			</div>
			<div class="details">
				<div class="content">
					<a href="pdf/NEET.pdf"><h2>NEET</h2></a>
					
					<p>EduWorld was created by the vision and toil to be the most premier coaching institute for NEET and AIIMS preparations. </p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home_achievements_bg">
	<div class="container">
		<h1 class="home_achievement_head" id="results">Our Results</h1>
		<?php $query="SELECT * FROM `results` ORDER BY id DESC"; // Fetch all the data from the table customers
		$result=mysqli_query($con,$query);
		$row = mysqli_fetch_row($result);
		?>
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12 home_achievement_top_margin">
				<p class="home_achievements_line"></p>
				<div id="counter">
				<div class="home_value" data-count=<?php echo $row['1']; ?>>0</div>
				<div class="home_value">+</div>
			</div>
				<p class="home_achievement_desc">Satisfied <br>Students</p>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-12 home_achievement_top_margin">
				<p class="home_achievements_line"></p>
				<div id="counter">
					<div class="home_value" data-count=<?php echo $row['2']; ?>>0</div>
					<div class="home_value">+</div>
				</div>
				<p class="home_achievement_desc">JEE Mains(2021)<br>Selections</p>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-12 home_achievement_top_margin">
				<p class="home_achievements_line"></p>
				<div id="counter">
					<div class="home_value" data-count=<?php echo $row['3']; ?>>0</div>
					<div class="home_value">+</div>
				</div>
				<p class="home_achievement_desc">JEE Advanced<br>(2021)<br>Selections</p>
				
				<div class="clearfix"></div>
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-12 home_achievement_top_margin">
				<p class="home_achievements_line"></p>
				<div id="counter">
					<div class="home_value" data-count=<?php echo $row['4']; ?>>0</div>
					<div class="home_value">+</div>
				</div>
				<p class="home_achievement_desc">NEET(2021) Selections</p>
				
				<div class="clearfix"></div>
			</div>
			
			
		</div>
	</div>
</div>

<div class="index_contact_form" id="contact_us" id="contact_us">
	<div class="container">
	<h1 class="home_choose_rooms_heading">Get In Touch With Us</h1>
		<div class="home_form_1">
			<form class="form1" action="" method="POST" autocomplete = "OFF">
				<input type="text" name="uname" id="ful_name" placeholder="Full Name">
				<input type="text" name="uemail" id="email" placeholder="Email"> <br><br>
				<input type="text" name="umobile" id="phone_number" placeholder="Phone Number">
				<input type="text" name="usubject" id="subject" placeholder="Subject"> <br>
				<textarea id="message" name="ucomments" placeholder="Message" ></textarea> <br>
				<input type="submit" value="SEND NOW" name="commentSubmitBtn">
				<?php if(isset($msg)){echo $msg;} ?>
			</form>
		</div>
	</div>
</div>

	<footer class="footer_bg" >
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<a class="footer_menu_links" href="#">HOME</a>
					<a class="footer_menu_links" href="#about_us">ABOUT US</a>
					<a class="footer_menu_links" href="#events">EVENTS</a>
					<a class="footer_menu_links" href="#courses">COURSES</a>
					<a class="footer_menu_links" href="#studentshub">STUDENT'S HUB</a>
					<a class="footer_menu_links" href="#results">RESULTS</a>
					<a class="footer_menu_links" href="faq.html">FAQ</a>
					<a class="footer_menu_links" href="#contact_us">CONTACT US</a>
					
					<hr class="footer_hr">
					
					<span class="footer_responsive"><img src="images/footer_address.png"><span class="footer_address_text"> Kishan cold storage gali, 06, Saidpur Rd, Patna, Bihar 800006</span></span>
					
					<span class="footer_responsive"><img src="images/footer_phone.png"><span class="footer_address_text">6287287388</span></span>
					
					<span class="footer_responsive"><img src="images/footer_mail.png"><span class="footer_address_text">admission@eduworldeducation.com</span></span>
				</div>
				
				<div class="col-md-2">
					<p class="footer_get_social_with_us" href="#" style="font-size:14px;"><strong>GET SOCIAL WITH US</strong></p>
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




<!--
<div class="bg1">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>
-->


<script>
	var flag = 0;
	
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (flag == 0 && $(window).scrollTop() > oTop) {
    $('.home_value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    flag = 1;
  }

});

/*function handlePreloader() {
		if($('.loader-wrap').length){
			$('.loader-wrap').delay(1000).fadeOut(500);
		}
		TweenMax.to($(".loader-wrap .overlay"), 1.2, {
            force3D: true,
            left: "100%",
            ease: Expo.easeInOut,
        });
	};

 TweenMax.to($(".loader-wrap .overlay"), 1.2, {
            force3D: true,
            left: "100%",
            ease: Expo.easeInOut,
        });	

*/

/*if ($(".preloader-close").length) {
        $(".preloader-close").on("click", function(){
            $('.loader-wrap').delay(200).fadeOut(500);
        })
    }*/

var preloader;

function preload(opacity) {
    if(opacity <= 0) {
        showContent();
    }
    else {
        preloader.style.opacity = opacity;
        window.setTimeout(function() { preload(opacity - 0.05) }, 100);
    }
}

function showContent() {
    preloader.style.display = 'none';
    document.getElementById('content').style.display = 'block';
}

document.addEventListener("DOMContentLoaded", function () {
    preloader = document.getElementById('preloader');
    preload(1);
});

</script>


</body>
</html>
