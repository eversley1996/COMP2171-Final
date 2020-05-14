<?php
error_reporting(0);
include('admin/includes/dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

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
            <a class="nav-link" href="branches.php">Locations</a>
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

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <form name="search" method="post">
    <!-- Jumbotron Header -->
       <div class="card my-4">
          <h5 class="card-header">Tracking / Refrence Number</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" name="searchdata" placeholder="Search for..." required="true">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit" name="search">Search!</button>
              </span>
            </div>
          </div>
        </div>
</form>
    </header>

    <!-- Page Features -->
    <div class="row text-left">
<?php
if(isset($_POST['search'])){
$searchdata=$_POST['searchdata'];
$ret=mysqli_query($con,"select tblcourier.id as cid, tblcourier.RefNumber,tblcourier.SenderName,tblcourier.SenderCity,tblcourier.SenderState,tblcourier.SenderEMail,tblcourier.SenderCountry,tblcourier.RecipientName,tblcourier.RecipientCity,tblcourier.RecipientState,tblcourier.RecipientEMail,tblcourier.RecipientCountry from  tblcourier where tblcourier.RefNumber='$searchdata'");
$num=mysqli_num_rows($ret);
if($num >0){
while ($row=mysqli_fetch_array($ret)) {

?><div class="col-lg-12">
<h4 align="center" style="color:red">Tracking / Reference Id <?php echo $searchdata;?> Details</h4>
<hr>
</div>
      <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Sender</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
 
<tr>
<th> Name</th>
<td><?php  echo $row['SenderName'];?></td>
</tr> 
<tr>
<th> City</th>
<td><?php  echo $row['SenderCity'];?></td>
</tr> 
<tr>
<th> State</th>
<td><?php  echo $row['SenderState'];?></td>
</tr> 
<tr>
<th>E-mail</th>
<td><?php  echo $row['SenderEMail'];?></td>
</tr> 
<tr>
<th>Country</th>
<td><?php  echo $row['SenderCountry'];?></td>
</tr> 
</table>

          </div>
        </div>
      </div>

       <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Recipient</h4>
            <hr />
  <table border="1" width="100%" style="text-align: center;">
<tr>
<th> Name</th>
<td><?php  echo $row['RecipientName'];?></td>
</tr> 
<tr>
<th> City</th>
<td><?php  echo $row['RecipientCity'];?></td>
</tr> 
<tr>
<th> State</th>
<td><?php  echo $row['RecipientState'];?></td>
</tr> 
<tr>
<th>E-Mail</th>
<td><?php  echo $row['RecipientEMail'];?></td>
</tr> 
<tr>
<th>Country</th>
<td><?php  echo $row['RecipientCountry'];?></td>
</tr> 
</table>
          </div>
        </div>
      </div>
      <?php

$cid=$row['cid'];   
$ret=mysqli_query($con,"select remark,status,StatusDate from tblcouriertracking where  CourierId='$cid'");
$num=mysqli_num_rows($ret);
if($num>0){
?>
     <div class="col-lg-12 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Tracking History</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
  <tr>
    <th>Date / Time</th>
    <th>Status </th>
    <th>Remark</th>
  </tr>
 <?php while ($row=mysqli_fetch_array($ret)) { ?>
<tr>
<td><?php  echo $row['StatusDate'];?></td>
<td><?php  echo $row['status'];?></td>
<td><?php  echo $row['remark'];?></td>
</tr>  
<tr>
<?php }?>
</table>

          </div>
        </div>
      </div>

<?php
} else{ ?>
<h4 style="color:red" align="center">Not Shipped yet </h4>
   <?php } }} else {  ?>

<h4 align="center" style="color:red">Invalid Tracking / Reference Number </h4>
<?php }}?>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
