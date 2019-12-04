<?php 
session_start();
$profile="";
if(isset($_SESSION['dr_username'])) $profile="doctorProfile.php";
else if(isset($_SESSION['pat_username'])) $profile="patientProfile.php";

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'db_healthcare');

$s = "select DISTINCT dr_dept from tbl_doctor where dr_status='registered'";

$result = mysqli_query($con, $s);


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
                            <?php while($row = mysqli_fetch_array($result)) {?>
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
    <!--SLIDER-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/slider-1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block mycaption">
             <span>Health Care Medical Service</span>
            <p>To insure good health: eat lightly, breathe deeply, live moderately,<br /> cultivate cheerfulness, and maintain an interest in life.</p>  
    </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100" src="img/slider-2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block captionsec">
      <span>Health Care Medical Service</span>
            <p>The only way to keep your health is to eat what you don't want,<br /> drink what you don't like, and do what you'd rather not</p>
          
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!--End of SLIDER-->
    <!--Service area-->
            <div class="container">
                <div class="service-area">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box1">
                            <div class="text-area">
                         <div class="icon">
                            <i class="fas fa-exclamation-circle"></i>
                            </div> 
                            <h3>Ambulance Service</h3>
                           
                            <p>All contact details of <b>Ambulance</b> in town, </br>you can contact through this when you need.</p>
                            <form action="ambulance.php">
                            <button type="submit" class="btn btn-dark">LEARN MORE</button>
                            </form>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="box2">
                        <div class="text-area">
                         <div class="icon">
                            <i class="fas fa-phone-volume"></i>
                            </div>
                            <h3>Appointment</h3>
                            <p>All famous <b>Doctors</b> of the town are here.<br />Booking Appointment is easy now!</p>
                            <form action="doctor.php">
                            <button type="submit" class="btn btn-dark">MAKE AN APPOINTMENT</button>
                            </form>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-4">
                        <div class="box3">
                        <div class="text-area">
                         <div class="icon">
                            <i class="fas fa-clock"></i>
                            </div>
                            <h3>Blood Donation</h3>
                            <p>Need Blood? Need Help?</br>We will help you.</p>  
                              <form action="blood.php">
                            <button type="submit" class="btn btn-dark">LEARN MORE</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    
    <!--End of Service area-->
    <!--content area-->
    <div class="content-area">
        <div class="container">
                <h2 class="text-center">Most Viewed Doctors</h2>
         </div>
         <div class="container">
          <div class="image-area">
            <div class="row">
           
                <div class="col-md-4">
                    <img src="img/user1.png" alt="" />
                    <p>Professor.Dr. Md. Foyjul Islam </p>
                    <p>Medicine</p>
                    <p>Chamber : Ibn Sina Hospital<p>
                    <button type="button" class="btn btn-dark">Details</button>
                </div>
                <div class="col-md-4"><img src="img/user1.png" alt="" />
                    <p>Dr. Humayra Begum</p>
                    <p>Gynecologist</p>
                    <p>Chamber : Popular Medical Center</p>
                     <button type="button" class="btn btn-dark">Details</button>
                    
                    </div>
                <div class="col-md-4">
                    <img src="img/user1.png" alt="" />
                    <p>Dr. Saira Sakiba</p>
                    <p>Plastic Surgeon</p>
                    <p>Chamber : Popular Medical</p>
                     <button type="button" class="btn btn-dark">Details</button>
                    
                    
                </div>
                </div>
            </div>
         </div>
    </div>
    <!--End of content area-->
    <!--Our servicesecond-area-->
        <div class="servicesecond-area">
             <div class="container">
                <h2 class="text-center">Our services</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box15">
                           <div class="boximg">
                            <img src="img/doctor.png" alt="" />
                            </div>
                            <p class="doctor">Doctor Directory</p>
                            <p class="find">Find Your prefered doctor from our doctor database</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box15">
                           <div class="boximg">
                            <img src="img/agenda.png" alt="" />
                            </div>
                            <p class="doctor">Ambulance</p>
                            <p class="find">Find necessary information to manage ambulance</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="box15">
                           <div class="boximg">
                            <img src="img/blood-transfusion.png" alt="" />
                            </div>
                            <p class="doctor">Blood Donation</p>
                            <p class="find">Find your required donor</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box16">
                           <div class="boximg">
                            <img src="img/feedback.png" alt="" />
                            </div>
                            <p class="doctor">Health Tips</p>
                            <p class="find">Find some important health tips</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box16">
                           <div class="boximg">
                            <img src="img/message.png" alt="" />
                            </div>
                            <p class="doctor">Easy Booking</p>
                            <p class="find">Making appointment easier</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="box16">
                           <div class="boximg">
                            <img src="img/feedback.png" alt="" />
                            </div>
                            <p class="doctor">Tracking</p>
                            <p class="find">Tracking all appointment from our database</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    <!-- End Our service-area-->
     <!-- Latest News-->
       <div class="lateset-news">
            <div class="container">
                <h2 class="text-center">Health Tips</h2>
                <div class="container">
                    <div class="row">
                        <div class="box17">
                            <a href="#" class="text-center">Lung cancer therapy is milestone</a>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><p>
A lung cancer therapy can more than double life expectancy in some patients, a "milestone" trial shows, reports BBC.</p></div>
                                <div class="col-md-2"></div>
                            </div>
                             <a href="#" class="text-center">Lung cancer therapy is milestone</a>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><p>
A lung cancer therapy can more than double life expectancy in some patients, a "milestone" trial shows, reports BBC.</p></div>
                                <div class="col-md-2"></div>
                            </div>
                             <a href="#" class="text-center">Lung cancer therapy is milestone</a>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><p>
A lung cancer therapy can more than double life expectancy in some patients, a "milestone" trial shows, reports BBC.</p></div>
                                <div class="col-md-2"></div>
                            </div>
                             <a href="#" class="text-center">Lung cancer therapy is milestone</a>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><p>
A lung cancer therapy can more than double life expectancy in some patients, a "milestone" trial shows, reports BBC.</p></div>
                                <div class="col-md-2"></div>
                            </div>
                            <a href="#" class="text-center">Lung cancer therapy is milestone</a>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><p>
A lung cancer therapy can more than double life expectancy in some patients, a "milestone" trial shows, reports BBC.</p></div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
       </div>
    
    <!-- End Latest news-->
    <!-- why us-->
        <div class="whyus">
            <div class="container">
                <h2 class="text-center">WHY US?</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box18">
                                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          WHY SHOULD I REGISTER
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            HOW TO FIND A DOCTOR
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
    <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            IS IT SAFE TO DONATE BLOOD
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          HOW CAN I BOOK APPOINTMENT
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
       </div>
         </div>
                        
                        <div class="col-md-6">
                            <img src="img/service-1.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- End why us-->
     <!--Contact us-->
    <section class="contact">
        <div class="context">
                <h1>Contact Us</h1>
                <div class="conline">
                    <hr />
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <div class= "contactform">
            <div class="address">
            <form class="formarea" action="#">
                <input type="text" name="name" placeholder="name"></input><br>
                <input type="email" name="email" placeholder="email"></input><br>
                <input type="text" name="subject" placeholder="subject"></input>
                            
            </form>
            
            </div>
            <div class="msg">
            <form class="formarea">
                <textarea class="msgBox" name="comment" form="usrform", placeholder="Message..."></textarea>                
            </form>
            
            </div>
        </div>
        <div class="btn">
                	<a href="#">Send Message</a>
                </div>
        
    </section>
    <!-- End Contact us-->
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=
    "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
  </body>
</html>