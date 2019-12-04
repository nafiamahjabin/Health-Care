<?php

session_start();
header('location:warning.php');


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');

$fName= $_POST['first'];
$lName= $_POST['last'];
$email= $_POST['Email'];
$user= $_POST['username'];
$pass= $_POST['password'];
$mbl= $_POST['mobile'];
$dept= $_POST['dept'];
$deg= $_POST['degree'];
$chem= $_POST['chember'];
$visH= $_POST['visitHour'];
$fFee= $_POST['firstFee'];
$sFee= $_POST['secFee'];
$conN= $_POST['conName'];
$conM= $_POST['conMobile'];
$status= 'pending';


$reg= " INSERT INTO db_healthcare.tbl_doctor (dr_username, dr_password, dr_FirstName, dr_LastName, dr_email, dr_mobile, dr_degree, dr_chember, dr_visitTime, dr_firstFee, dr_secondFee, dr_dept, dr_conName, dr_conMobile, dr_status) VALUES ('$user' , '$pass','$fName','$lName','$email','$mbl','$deg','$chem','$visH',$fFee,$sFee,'$dept','$conN','$conM','$status')";
if(!mysqli_query($con, $reg))
    {
		$_SESSION['msg']='Sorry! username is not available';
    }
    else{
    $_SESSION['msg'] = 'Thank You For Registering. Please Wait untill we validate your profile manually.';
	
	
    header('location:warning.php');
    
}

?>