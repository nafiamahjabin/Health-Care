<?php

session_start();
header('location:doctorProfile.php');


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');
$username=$_SESSION['dr_username'];
$firstName= $_POST['firstName'];
$lastName= $_POST['lastName'];
    $pass= $_POST['pass'];
    $mobile= $_POST['mobile'];
    $chem= $_POST['chem'];
    $vH= $_POST['vH'];
    $conN= $_POST['conN'];
    $email= $_POST['email'];
    $conM= $_POST['conM'];
    $deg= $_POST['deg'];
    $fFee= $_POST['fFee'];
    $sFee= $_POST['sFee'];
    $dept= $_POST['dept'];

$s = "UPDATE tbl_doctor SET dr_FirstName = '$firstName', dr_LastName = '$lastName', dr_chember = '$chem', dr_password = '$pass', dr_visitTime= '$vH',dr_email = '$email',dr_mobile = '$mobile',dr_dept = '$dept',dr_conName = '$conN',dr_conMobile = '$conM',dr_degree = '$deg',dr_firstFee = $fFee, dr_secondFee = $sFee WHERE dr_username = '$username';";

$result = mysqli_query($con, $s);

?>