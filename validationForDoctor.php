<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');

$username = $_POST['user'];
$pass = $_POST['password'];


$s = " select * from tbl_doctor where dr_username = '$username' && dr_password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['dr_username'] = $username;
    header('location:index.php');
}else{
	$_SESSION['msg']='Username and Password did not matched';
  header('location:warning.php');
}

?>