<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/BDZ_Database.php'); //Databse class

if (strlen($_SESSION['cmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
{

$cmsaid=$_SESSION['cmssid'];
$senbranchname=$_POST['senderbranchname'];
$sendername=$_POST['sendername'];
$sendercontnum=$_POST['sendercontactnumber'];
$senderadd=$_POST['senderaddress'];
$sendercity=$_POST['sendercity'];
$senderstate=$_POST['senderstate'];
$SenderEMail=$_POST['SenderEMail'];
$sendercountry=$_POST['sendercountry'];
$recname=$_POST['recipientname'];
$reccontactnumber=$_POST['recipientcontactnumber'];
$recadd=$_POST['recaddress'];
$reccity=$_POST['recipientcity'];
$recstate=$_POST['recipientstate'];
$recpEMail=$_POST['RecipientEMail'];
$reccountry=$_POST['recipientcountry'];
$shipvessel = $_POST['vessel'];
$shipcontainer = $_POST['container'];
$shipmanifest = $_POST['manifestnumber'];
$courierdes=$_POST['courierdes'];
$courierwt=$_POST['courierwt'];
$parlength=$_POST['length'];
$parwidth=$_POST['width'];
$parheight=$_POST['height'];
$parprice=$_POST['parcelprice'];
$refnumber=mt_rand(100000000, 999999999);
$status='0';

//OOP
/* 
$databaseObj = new BDZ_Database(); //Database object

$query_string='insert into tblcourier(RefNumber,SenderBranch,SenderName,SenderContactnumber,SenderAddress,SenderCity,SenderState,SenderEMail,SenderCountry,RecipientName,RecipientContactnumber,RecipientAddress,RecipientCity,RecipientState,RecipientEMail,RecipientCountry,CourierDes, Vessel, Container, ManifestNumber, ParcelWeight,ParcelDimensionlen,ParcelDimensionwidth,ParcelDimensionheight,ParcelPrice,Status) value ('.$refnumber.','.$senbranchname.','.$sendername.','.$sendercontnum.','.$senderadd.','.$sendercity.','.$senderstate.','.$SenderEMail.','.$sendercountry.','.$recname.','.$reccontactnumber.','.$recadd.','.$reccity.','.$recstate.','.$recpEMail.','.$reccountry.','.$courierdes.','.$shipvessel.','.$shipcontainer.','.$shipmanifest.','.$courierwt.','.$parlength.','.$parwidth.','.$parheight.','.$parprice.','.$status.')';

$msg=$databaseObj->db_insert($query_string);

*/

$query=mysqli_query($con,"insert into tblcourier(RefNumber,SenderBranch,SenderName,SenderContactnumber,SenderAddress,SenderCity,SenderState,SenderEMail,SenderCountry,RecipientName,RecipientContactnumber,RecipientAddress,RecipientCity,RecipientState,RecipientEMail,RecipientCountry,CourierDes, Vessel, Container, ManifestNumber, ParcelWeight,ParcelDimensionlen,ParcelDimensionwidth,ParcelDimensionheight,ParcelPrice,Status) value('$refnumber','$senbranchname','$sendername','$sendercontnum','$senderadd','$sendercity','$senderstate','$SenderEMail','$sendercountry','$recname','$reccontactnumber','$recadd','$reccity','$recstate','$recpEMail','$reccountry','$courierdes','$shipvessel','$shipcontainer','$shipmanifest','$courierwt','$parlength','$parwidth','$parheight','$parprice','$status')");

if ($query) {
    $msg="Courier Detail has been added.";
}
else{
    $msg="Something Went Wrong. Please try again";
}

}

?>


<!doctype html>
<html lang="en">

    <head>
        <!-- App title -->
        <title>BDZ Shipment</title>

        <!-- Switchery css -->
        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include_once('includes/header.php');?>
           <?php include_once('includes/leftbar.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Shipment Detail</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="header-title m-t-0 m-b-30">Sender Detail</h4>
                                           
                                            <form name="submit" method="post"> 
                                                <fieldset class="form-group">
                                                    <label for="exampleInputEmail1">Sender Branch</label>
                                                    <select name='senderbranchname' id="senderbranchname" class="form-control white_bg" readonly='true'>
     
      <?php
      $sid=$_SESSION['cmssid']; 
      $query=mysqli_query($con,"select * from  tblstaff where ID=$sid");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['BranchName'];?>"><?php echo $row['BranchName'];?></option>
                  <?php } ?>  
   </select>
                                            
                                                    
                                                </fieldset>
                                                
                                                <fieldset class="form-group">
                                                    <label for="exampleInputPassword1">Sender Name</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="sendername" required="true">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="exampleSelect1">Sender Contact Number</label>
                                                    <input type="text" class="form-control"
                                                           id="exampleInputPassword1" name="sendercontactnumber" maxlength="20" required="true">
                                                </fieldset>
                                              
                                                <fieldset class="form-group">
                                                    <label for="exampleTextarea">Sender Address</label>
                                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="senderaddress" required="true"></textarea>
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label >Sender City</label>
                                                    <input class="form-control" type="text" name="sendercity" required="true">
                                                </fieldset>
                                                 <fieldset class="form-group">
                                                    <label >Sender State</label>
                                                    <input class="form-control" type="text" name="senderstate" required="true">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label >Sender E-Mail</label>
                                                    <input class="form-control" type="email" name="SenderEMail" required="true">
                                                </fieldset>
                                                 <fieldset class="form-group">
                                                    <label >Sender Country</label>
                                                    <input class="form-control" type="text" name="sendercountry" required="true">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                <label>Vessel</label>
                                                <input class="form-control" type="text" name ="vessel" required ="False">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label>Container</label>
                                                    <input class="form-control" type="text" name ="container" required ="False">
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <label>Manifest Number</label>
                                                    <input class="form-control" type="text" name="manifestnumber" required ="False">
                                                </fieldset>



                                                
                                            
                                        </div><!-- end col -->

                                        <div class="col-xl-6 m-t-sm-40">
                                             <h4 class="header-title m-t-0 m-b-30">Recipient Detail</h4>
                                          
                                                <fieldset>
                            
                                                 
                                                        <label for="disabledSelect">Recipient Name</label>
                                                       <input type="text" class="form-control m-b-20" id="exampleInputPassword1" name="recipientname" required="true">
                                              
                                                </fieldset>

                                                <fieldset>
                                                    <label >Recipient Contact Number</label>
                                                    <input class="form-control m-b-20" type="text"  name="recipientcontactnumber" required="true" maxlength="20">
                                                    
                                                    
                                                </fieldset>

                                                <fieldset>
                                                    <label>Recipient Address</label>

                                                    <textarea class="form-control m-b-20" id="exampleTextarea" rows="3" name="recaddress" required="true"></textarea>

                                                   

                                                   
                                                    

                                                </fieldset>
                                                <fieldset>
                                                    <label >Recipient City</label>
                                                    <input class="form-control m-b-20" type="text"name="recipientcity" required="true">
                                                    
                                                    
                                                </fieldset>
                                                 <fieldset>
                                                    <label >Recipient State</label>
                                                    <input class="form-control m-b-20" type="text" name="recipientstate" required="true">
                                                    
                                                    
                                                </fieldset>
                                                <fieldset>
                                                    <label >Recipient E-Mail</label>
                                                    <input class="form-control m-b-20" type="email" name="RecipientEMail" required="true">
                                                    
                                                    
                                                </fieldset>
                                                 
                                                 <fieldset class="form-group">
                                                    <label >Recipient Country</label>
                                                    <input class="form-control m-b-20" type="text" name="recipientcountry" required="true">
                                                </fieldset>
                                          
                                        </div><!-- end col -->

                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->




                        <div class="row">

                            <div class="col-md-12">
                                <div class="card-box">
   

                                   <h4 class="header-title m-t-0 m-b-30">Shipment Detail</h4>

                                    <div class="form-group row">
                                       
                                        <label for="example-text-input" class="col-2 col-form-label">Shipment Description</label>
                                        <div class="col-10">
                                            <textarea class="form-control" type="text" value=""  name="courierdes" required="true" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-2 col-form-label">Parcel weight(in kg)</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="courierwt" required="true" placeholder="for example:2kg or .2kg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-2 col-form-label">Parcel Dimension(in inch)</label>
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="" id="" name="length" required="true">
                                        </div>X
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="w" id="" name="width" required="true">
                                        </div>X
                                        <div class="col-2">
                                            <input class="form-control" type="text" value="" id="" name="height" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-url-input" class="col-2 col-form-label">Parcel Price</label>
                                        <div class="col-10">
                                            <input class="form-control" type="text" value="" id="" name="parcelprice" required="true">
                                        </div>
                                    </div>
                                   
                                    
                                   
                                                                     
                                                                
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-10">
                                          <p style="text-align: center;">  <button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
                                           
                                        </div>
                                        
                                    </div>
                                </form>
                                </div>

                            </div>
                        </div>


                       
                        <!-- end row -->


                    <!-- container -->




            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



            <?php include_once('includes/footer.php');?>


        </div>
    </div></div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>