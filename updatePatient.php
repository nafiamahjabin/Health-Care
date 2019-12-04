<?php

session_start();
header('location:patientProfile.php');


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');
$username=$_SESSION['pat_username'];
$pass=$_POST['password']; 
$firstName=$_POST['first'];
$lastName=$_POST['lastname'];
$address=$_POST['address'];
$mobile=$_POST['mobile'];
$bloodGroup=$_POST['bloodtype'];
$bday=$_POST['bday'];
$email=$_POST['email'];

$s = "UPDATE tbl_patient SET pat_FirstName = '$firstName', pat_LastName = '$lastName', pat_address = '$address', pat_password = '$pass', pat_birthDate= '$bday',pat_email = '$email',pat_mobile = '$mobile',pat_bloodGroup = '$bloodGroup' WHERE pat_username = '$username';";

$result = mysqli_query($con, $s);

?>