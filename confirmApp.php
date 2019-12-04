<?php
		session_start();
        $con = mysqli_connect('localhost','root','');

        mysqli_select_db($con, 'db_healthcare');
		$pat_username = $_SESSION['pat_username'];
		$drpat_date = $_POST['date'];
		$drpat_visH = $_POST['time'];
		$dr_username = $_POST['dr_username'];
		$drpat_status = 'pending';
		
		$s = "INSERT INTO db_healthcare.tbl_drpat (dr_username, pat_username, drpat_date, drpat_status, drpat_visH) VALUES ('$dr_username', '$pat_username', '$drpat_date', '$drpat_status', '$drpat_visH')";
		if(mysqli_query($con, $s)){
		$_SESSION['msg']='Appointment Booking Successful';
        header('location: warning.php');
		}
	
	?>