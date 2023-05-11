<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    if ($_SESSION['role'] == 'user') {
        header('location:dashboard.php');
    }
    // Add product Code
    if (isset($_POST['submit'])) {
        //Getting Post Values
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $passwd = md5($_POST['password']);
        $role = $_POST['role'];
        $raw_query = "INSERT INTO tblusers(AdminName, UserName, MobileNumber, Email, Password, Role) VALUES ('$name','$username','$phone','$email','$passwd','$role')";
        $query = mysqli_query($con, $raw_query);
        if ($query) {
            echo "<script>alert('User added successfully.');</script>";
            echo "<script>window.location.href='add-user.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-user.php'</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Add User</title>
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>


        <!-- HK Wrapper -->
        <div class="hk-wrapper hk-vertical-nav">

            <!-- Top Navbar -->
            <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>



            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->



            <!-- Main Content -->
            <div class="hk-pg-wrapper">
                <!-- Breadcrumb -->
                <nav class="hk-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light bg-transparent">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Add User</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Name</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Name" name="name" required>
                                                    <div class="invalid-feedback">Please provide a valid name.</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Username</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="username" name="username" required>
                                                    <div class="invalid-feedback">Please provide a valid username.</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Mobile Number </label>
                                                    <input type="tel" class="form-control" id="validationCustom03" placeholder="Mobile Number" name="phone" required>
                                                    <div class="invalid-feedback">Please provide a phone number.</div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Email </label>
                                                    <input type="email" class="form-control" id="validationCustom03" placeholder="Email Address" name="email" required>
                                                    <div class="invalid-feedback">Please provide a phone number.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Password</label>
                                                    <input type="password" class="form-control" id="validationCustom03" placeholder="Password" name="password" required>
                                                    <div class="invalid-feedback">Please provide a password.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Role</label>
                                                    <select class="form-control custom-select" name="role" required>
                                                        <option value="">---Select Role---</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a role.</div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>


                <!-- Footer -->
                <?php include_once('includes/footer.php'); ?>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>
        <script src="dist/js/init.js"></script>
        <script src="dist/js/validation-data.js"></script>

    </body>

    </html>
<?php } ?>