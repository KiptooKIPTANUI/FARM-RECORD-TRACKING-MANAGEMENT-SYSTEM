<?php

session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['Register']))
  {
    $adminname=$_POST['uname'];
    $adminuser=$_POST['username'];
    $mobilenumber=$_POST['number'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $query="INSERT INTO tbladmin(`AdminName`,`UserName`,`MobileNumber`,`Email`,`Password`)
    VALUES('$adminname','$adminuser','$mobilenumber','$email','$password')";
    $SQL= mysqli_query($con,$query);
     if(!$query){
                  die('Could not enter data: ' .mysqli_error($con)); 
            }else{
              echo '<script>
              alert("Registration successful. You can now login to your account")</script>';
              header("location: index.php");
              }

  } 
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Registration Page</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    
   
    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
<a class="d-flex auth-brand align-items-center" href="#">
<span class="text-white font-30">Farm Records Tracking and Management System</span>
                </a>
               
            </header>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner2.png);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                       
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner1.png);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                      
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>





                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
     <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="post">
                                    <h1 class="display-4 mb-10">Welcome</h1>
                                 
<div class="form-group">
<input class="form-control" placeholder="Name" type="text" name="uname" required="true">
</div>
<div class="form-group">
<input class="form-control" placeholder="Username" type="text" name="username" required="true">
</div>
<div class="form-group">
<input class="form-control" placeholder="Mobile Number" type="text" name="number" required="true">
</div>
<div class="form-group">
<input class="form-control" placeholder="Email" type="text" name="email" required="true">
</div>
<div class="form-group">
<div class="input-group">
<input class="form-control" placeholder="Password" type="password" name="password" required="true">
<div class="input-group-append">
<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
</div>
</div>
</div>
<div style="font-size: 18px;">
    <h3>Alredy Registered?<a href="index.php"><i>login</i></a></h3>
</div>
                              
<button class="btn btn-warning btn-block" type="submit" name="Register">Register</button>

     
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>
</body>

</html>

