<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';

$query="SELECT * FROM `tbl_category`";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('30','10','sl no','1','0','C');
    $pdf->cell('40','10','Name','1','0','C');
     
    $pdf->cell('90','10','Created on','1','1','C');
  
    
    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('30','10',$i++,'1','0','C');
        $pdf->cell('40','10',$row['cata_name'],'1','0','C');
        $pdf->cell('90','10',$row['date'],'1','1','C');
      
        
    } 
    $pdf->Output();

}
	?>