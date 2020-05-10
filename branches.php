<?php
error_reporting(0);
include('admin/includes/dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>


  <title>BDZ Shipping Management System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand" style="color: white">BDZ Shipping Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="admin/index.php">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/index.php">Admin login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff/index.php">Staff Login</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

 

    <!-- Page Features -->
    <div class="row text-left">
<div class="col-lg-12">
<h4 align="center" style="color:red">Our Branch Details</h4>
<hr>
</div>
     

       
      </div>

   <div class="row text-left">
<?php
$query=mysqli_query($con,"select * from tblbranch");
while ($row=mysqli_fetch_array($query)) {

?>

     <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue"><?php echo $row['BranchName'];?></h4>
            <hr />
<table border="1" style="text-align: center;">
 <tr>
 <th>Contact Number </th>  
 <td><?php echo $row['BranchContactnumber'];?></td>
 </tr> 


 <tr>
 <th>Email ID </th>  
 <td><?php echo $row['BranchEmail'];?></td>
 </tr> 

  <tr>
 <th>Address</th>  
 <td><?php echo $row['BranchAddress'];?></td>
 </tr> 

  <tr>
 <th>City</th>  
 <td><?php echo $row['BranchCity'];?></td>
 </tr> 

  <tr>
 <th>State</th>  
 <td><?php echo $row['BranchState']."-".$row['BranchPincode'];?></td>
 </tr> 

  <tr>
 <th>Country</th>  
 <td><?php echo $row['BranchCountry'];?></td>
 </tr> 


</table>

          </div>
        </div>
      </div>

<?php } ?>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; BDZ Shipping Management System 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
