<?php 
session_start();
$profile="";
if(isset($_SESSION['dr_username'])) $profile="doctorProfile.php";
else if(isset($_SESSION['pat_username'])) {
    $profile="patientProfile.php";  
}


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');
$dr_username=$_SESSION['dr_username'];
$s = "select * from tbl_doctor Where dr_username = '$dr_username'";

$result = mysqli_query($con, $s);
$str = "select DISTINCT dr_dept from tbl_doctor where dr_status='registered'";

$res = mysqli_query($con, $str);


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />

    <title>Health Care!</title>
  </head>
  <body>
    <!--Header-area-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/logo.png" alt="logo" />
                </div>
                 <div class="col-md-4">
                   
                </div>
				 <?php if(!isset($_SESSION['dr_username']) && !isset($_SESSION['pat_username'])) { ?>
                 <div class="col-md-4">
                        <div class="log-in">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                            Log In
                        </button>

                        <!--login Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
						<div class="logModal">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doctorModalLogin">
                            Log In as doctor
                        </button>
						</div>
						<div class="logModal">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientModalLogin">
                            Log In as patient
                        </button>
						</div>
						</div>
						</div>
						</div>
						</div>
						<!-- Doctor Modal starts-->
                        <div class="modal fade" id="doctorModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTwo" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabeltwo">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="validationForDoctor.php" method="post">
                               <div class="form-group">
							   
                                    <label class="error">Username</label>
                                    <input type="text" name="user" class="form-control" required>  
                                </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>  
                               </div>
                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                     </div>
               </div>
         </div>
     </div>
	 <!--Doctor model end -->
	 	<!--patient Modal starts-->
                        <div class="modal fade" id="patientModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelTwo" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabeltwo">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="validationForPatient.php" method="post">
                               <div class="form-group">
							   
                                    <label>Username</label>
                                    <input type="text" name="user" class="form-control" required>  
                                </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>  
                               </div>
                              
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                     </div>
               </div>
         </div>
     </div>
	 <!--patient model end -->
 </div>      
    <div class="sign-up">
    <!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signupModal">
					Sign Up
				</button>

				<!--login Modal -->
				<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				<div class="logModal">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doctorModalSignup">
					Sign Up as doctor
				</button>
				</div>
				<div class="logModal">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientModalSignup">
					Sign Up as patient
				</button>
				</div>
				</div>
				</div>
				</div>
				</div>
						
<!--Patient Sign Up Modal -->
<div class="modal fade" id="patientModalSignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
 <form action="registrationForPatient.php" method="post">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first" class="form-control" required>  
            </div>                           
            <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last" class="form-control" required>  
            </div> 
            <div class="form-group">
            <label>Email</label>
            <input type="Email" name="Email" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Username</label>
            <input type="text" name="user" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="" required>  
            </div>
            <div class="form-group">
            <label>Mobile No.</label>
            <input type="text" name="mobile" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Birth Date</label>
            <input type="date" name="bday" class="form-control"  placeholder="dd/mm/yy" required>  
            </div>
            <div class="form-group">
            <label>Blood Group</label>
			<select name="blood">
                <option >Unknown</option>
                <option >O+</option>
                <option >O-</option>
                <option >A+</option>
                <option >A-</option>
                <option >B+</option>
                <option >B-</option>
                <option >AB+</option>
                <option >AB-</option>
            </select>
             
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
      </div>  
   </div> 
 </div>
             
		</div>
		
		<!-- End of Patient Sign up Modal -->
 <!--Doctor Sign Up Modal -->
<div class="modal fade" id="doctorModalSignup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
 <form action="registrationForDoctor.php" method="post">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first" class="form-control" required>  
            </div>                           
            <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last" class="form-control" required>  
            </div> 
            <div class="form-group">
            <label>Email</label>
            <input type="Email" name="Email" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Contact No.</label>
            <input type="text" name="mobile" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Department</label>
            <input type="text" name="dept" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Qualification</label>
            <input type="text" name="degree" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Chember Address</label>
            <input type="text" name="chember" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Visiting Hours</label>
            <input type="text" name="visitHour" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>First Visit Fees</label>
            <input type="text" name="firstFee" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Second Visit Fees</label>
            <input type="text" name="secFee" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Ticket Provider's Name</label>
            <input type="text" name="conName" class="form-control" required>  
            </div>
            <div class="form-group">
            <label>Publicly Reachable Contact No.</label>
            <input type="text" name="conMobile" class="form-control" required>  
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
      </div>  
   </div> 
 </div>
             
		</div>
		
		<!-- End of Doctor Sign up Modal -->
    </div>
    </div>
	
		 <?php } else { ?>
		   <div class="col-md-4">
						   <div class="log-in">
						   <form action= "<?=$profile?>">
						 <button type="submit" class="btn btn-primary" >
                            Profile
                        </button>
						</form>
							</div>
					   <div class="sign-up">
						<form action="logout.php">
						   <button type="submit" class="btn btn-primary">
                            Log Out
                        </button>
                        </form>
					 </div>
				 </div>
		 <?php } ?>
    </div>
    </div>
    <!--END OF Header-area-->
    <!---Nav bar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="doctor.php">Our Doctors</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Department
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php while($row = mysqli_fetch_array($res)) {?>
							<form action="department.php" method="post">
							<button class="dropdown-item" type="submit" name="dept" value="<?=$row['dr_dept']?>"><?=$row['dr_dept']?></button>
                            </form>
							<?php } ?>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="ambulance.php">Ambulance Service</a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link disabled" href="blood.php">Blood Donation</a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link disabled" href="about.php">About Us</a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link disabled" href="contact.php">Contact Us</a>
                      </li>
                    </ul>
                  </div>
</nav>
</div>
    
    <!---End of Nav bar-->
	 <!--content-area-->
	 <div class="profile-area" >
		 <div class="container">
        <div class="row">
		<div class="col-md-4">
			</div>  
		<div class="col-md-6">
        <div class="content-title">
            <h2 class="text-center">Doctor's Profile</h2>
        </div>
		</div>
		</div>
		<?php if($row = mysqli_fetch_array($result)){ ?>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Name: </label>
			<label class="detail"><?=$row['dr_FirstName'].' '.$row['dr_LastName']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Email: </label>
			<label class="detail"><?=$row['dr_email']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Mobile No: </label>
			<label class="detail"><?=$row['dr_mobile']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Username: </label>
			<label class="detail"><?=$row['dr_username']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Password: </label>
			<label class="detail"><?=$row['dr_password']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Department: </label>
			<label class="detail"><?=$row['dr_dept']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Qualification: </label>
			<label class="detail"><?=$row['dr_degree']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Chember Location: </label>
			<label class="detail"><?=$row['dr_chember']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Visiting Hours: </label>
			<label class="detail"><?=$row['dr_visitTime']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">First Visit Fees: </label>
			<label class="detail"><?=$row['dr_firstFee']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Second Visit Fees: </label>
			<label class="detail"><?=$row['dr_secondFee']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Ticket Provier's Name: </label>
			<label class="detail"><?=$row['dr_conName']?></label>
			</div>
            <div class="row">
			<div class="col-md-4">
			</div>  
			<label class="detail">Publicly Reachable Contact No.: </label>
			<label class="detail"><?=$row['dr_conMobile']?></label>
			</div>
		<?php }?>
		
            <div class="row">
			<div class="col-md-4">
			</div>  
			<a class="aButton" href="editProfileDoctor.php">Edit Information</a>
			</div>
			
			
			
			
		</div>
		</div>
        <!--end of content-area-->
	
	
     <!---Footer area-->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="img/doctor.png" alt="" />
                        </div>
                        <div class="col-md-8">
                            <p>We are here to reduce your harassment in taking appointment for Doctor and making your health more safe.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="us">
                            <h2>CONTACT US</h2>
                        </div>
                        <div class="footericon">
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-envelope"></i></div>
                            <div class="col-md-4"><p>support@examples.com </br>helpme@examples.com</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-location-arrow"></i></div>
                            <div class="col-md-8"><p>Paira 130, Dorgah Moholla, Sylhet-3100, Bangladesh</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-phone"></i></div>
                            <div class="col-md-9"><p>Office: (+880) 0823 560 433 Cell: (+880) 0723 161 343</p></div>
                        </div>
                        </div>
                        </div>
                         <div class="col-md-4">
                         <div class="us">
                            <h2>SUPPPORT LINKS</h2>
                         </div>
                         <div class="row">
                            <div class="col-md-1"><i class="fas fa-angle-right"></i></div>
                            <div class="col-md-9"><p>ABOUT US</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-angle-right"></i></div>
                            <div class="col-md-9"><p>CONTACT US</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-angle-right"></i></div>
                            <div class="col-md-9"><p>MEMBERS</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-angle-right"></i></div>
                            <div class="col-md-9"><p>CAMPAIGN</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"><i class="fas fa-angle-right"></i></div>
                            <div class="col-md-9"><p>BLOG</p></div>
                        </div>
                        </div>
                         <div class="col-md-4">
                            <div class="us">
                            <h2>SUBSCRIBE US</h2>
                            <p>Signup for regular newsletter and stay up to date with our latest news.</p>
                            <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email"> </div>
                        <button type="button" class="btn btn-danger">JOIN NEWSLETTER</button>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <p>Copyright 2019 - Nafia Mahjabin Sumaiya. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-2">
                        
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <a href="#" class="scrolltotop"><i class="fa fa-angle-up"></i></a>
    
    <!---End of Footer area-->
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>