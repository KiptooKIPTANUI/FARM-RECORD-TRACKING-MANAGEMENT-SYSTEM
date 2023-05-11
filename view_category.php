<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Code for deletion   
if(isset($_GET['del'])){    
$cmpid=substr(base64_decode($_GET['del']),0,-5);
$query=mysqli_query($con,"delete from tblcategory where id='$cmpid'");
echo "<script>alert('Category record deleted.');</script>";   
echo "<script>window.location.href='manage-categories.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>View Categories</title>
    <!-- Data Table CSS -->
    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    
   
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">
<!-- Top Navbar -->
<?php include_once('includes/navbar.php');
include_once('includes/sidebar1.php');
?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper" style="background-color: #AEA6C9;background-position: cover;">
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
<li class="breadcrumb-item"><a href="#">Category</a></li>
<li class="breadcrumb-item active" aria-current="page">View</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">

                <!-- Title -->
<div class="hk-pg-header">
 <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="file"></i></span></span>View Category</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">


  <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                            <div class="invoice-from-wrap">
                                <div class="row">
                                    <div class="col-md-7 mb-20">
<h3 class="mb-35 font-weight-600">     DFSMS </h3>
<h6 class="mb-5">Farn Record Tracking and Management Sytem</h6>

</div>

<?php 
//Consumer Details
$cid=substr(base64_decode($_GET['cid']),0,-5);
$query=mysqli_query($con,"select distinct CategoryName,CategoryCode,PostingDate  from tblcategory  where CategoryCode='$cid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{    
?>
<div class="col-md-5 mb-20">
<h4 class="mb-35 font-weight-600">Listed Category</h4>
<span class="d-block">Date:<span class="pl-10 text-dark"><?php echo $row['PostingDate'];?></span></span>
<span class="d-block">Category #<span class="pl-10 text-dark"><?php echo $row['CategoryCode'];?></span></span>
<span class="d-block">Category Name<span class="pl-10 text-dark"><?php echo $row['CategoryName'];?></span></span>
</div>
</div>
</div>
<?php } ?>
<hr class="mt-0">
                        
                          
                       
<div class="row">
<div class="col-sm">
<div class="table-wrap">
<table class="table mb-0" border="1">
<thead>
<tr>
<th>#</th>
<th >Category Code</th>
<th>Category Name</th>
<th>Posting Date</th>

</tr>
                                            </thead>
                                            <tbody>
<?php 
$count=1;
$query="Select * from tblcategory ORDER BY id desc;";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)) 
    { ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row["CategoryCode"]; ?></td>
            <td><?php echo $row["CategoryName"]; ?></td>
          <td><?php echo $row["PostingDate"]; ?></td>                                                      
<?php $count++; } ?>

                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
            <!-- /Container -->

            <!-- Footer -->
<?php include_once('includes/footer.php');?>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->
    </div>
    <!-- /HK Wrapper -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
</body>
</html>
<?php } ?>