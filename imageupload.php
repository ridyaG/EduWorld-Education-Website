<?php
include "connection.php";
if (isset($_POST['courseSubmitBtn']) && isset($_FILES['sci_faculty_img_src'])) {


	echo "<pre>";
	print_r($_FILES['sci_faculty_img_src']);
	echo "</pre>";

	$img_name = $_FILES['sci_faculty_img_src']['name'];
	$img_size = $_FILES['sci_faculty_img_srce']['size'];
	$tmp_name = $_FILES['sci_faculty_img_src']['tmp_name'];
	$error = $_FILES['sci_faculty_img_src']['error'];

			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO course(sci_faculty_img_src) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
			}else {
				$em = "You can't upload files of this type";
			}
	}else {
		$em = "unknown error occurred!";
		header("Location: addCourse.php?error=$em");
	}