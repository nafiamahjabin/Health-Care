<?php

session_start();
header('location:warning.php');

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthCare');

$username = $_POST['user'];
$pass = $_POST['password'];
$fname = $_POST['first'];
$lname= $_POST['last'];
$email = $_POST['Email'];
$blood = $_POST['blood'];
$bday = $_POST['bday'];
$mobile = $_POST['mobile'];
$address= $_POST['address'];

$reg= " insert into tbl_patient(pat_FirstName,pat_LastName,pat_email,pat_username,pat_password,pat_bloodGroup,pat_birthDate,pat_mobile,pat_address) values ('$fname' , '$lname','$email','$username','$pass','$blood ','$bday','$mobile','$address')";
if(!mysqli_query($con, $reg))
    {
		$_SESSION['msg']='Sorry! username is not available';
    }
    else{
    $_SESSION['pat_username'] = $username;
    $_SESSION['msg'] = 'Registration Successful. Thank You!';
    header('location:warning.php');
    
}

?>