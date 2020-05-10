<?php
include('includes/dbconnection.php');
require('fpdf.php');
define('FPDF_FONTPATH','font/');



//Gets the value from the requesting form 

$manifestnumber=$_POST['manifestgennumber']; 


//Create new pdf file

$pdf=new FPDF('L','mm','Legal');;
$pdf->SetFont('Arial', 'B', 30);

//Disable automatic page break
$pdf->SetAutoPageBreak(false);
$pdf->AliasNbPages();

//Add first page
$pdf->AddPage();



$pdf->Cell(40,10,'Manifest');
$pdf->setXY(10, 10);
$pdf->SetFont('Arial','I',10);
$date =  date("F j, Y");
$pdf->Cell(10,30,'Report date: '.$date);

$pdf->SetDrawColor(0, 0, 0); //black

$pdf->setXY(10, 10);
$pdf->SetFont('Arial','B',12);

$ret=mysqli_query($con,"SELECT * FROM tblcourier WHERE ManifestNumber = '$manifestnumber'");
$row=mysqli_fetch_array($ret); 

    $pdf->Cell(10, 40, "Vessel: ".$row['Vessel']);
    $pdf->setXY(10, 10);
    $pdf->Cell(10, 50, "Container: ".$row['Container']);



$row_height = 6;    


$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->setXY(10, 40); 
$pdf->Cell(20,10,'H/BL NO',1,0,'L',1);
$pdf->Cell(50,10,'EXPORTER',1,0,'L',1);
$pdf->Cell(110,10,'CONSIGNEE & ADDRESS',1,0,'L',1);
$pdf->Cell(90,10,'NO. & DESCRIPTION',1,0,'L',1);
$pdf->Cell(50,10,'MEASUREMENT',1,0,'L',1);

$y = 50;
$x = 10;  
 
$pdf->setXY($x, $y);

$pdf->SetFont('Arial','',9);

$ret=mysqli_query($con,"SELECT * FROM tblcourier WHERE ManifestNumber = '$manifestnumber'");
$cnt=1; 
while ($row=mysqli_fetch_array($ret)) {

        $pdf->Cell(20, 8, $row['RefNumber'], 1);   
        $pdf->Cell(50, 8, $row['SenderName'], 1);
        $pdf->Cell(110, 8, $row['RecipientName'] ." | ".$row['RecipientAddress'].", ".$row['RecipientCity'].", ".$row['RecipientState'], 1);
        $pdf->Cell(90, 8, $row['CourierDes'], 1);
        $pdf->Cell(50, 8, $row['ParcelWeight'], 1);
 
        $y += 8;
        
        if ($y > 260)    // When you need a page break
		{
            $pdf->AddPage();
            $y = 40;
			
		}
        
        $pdf->setXY($x, $y);


}



mysqli_close($con);

//Send file
$pdf->Output();
exit;
?>