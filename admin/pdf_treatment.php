<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';

$query="SELECT * FROM tbl_packages";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('70','10','Name','1','0','C');
    $pdf->cell('50','10','Amount','1','0','C');
    $pdf->cell('50','10','Days','1','1','C');
     
  
    
    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('70','10',$row['p_name'],'1','0','C');
        $pdf->cell('50','10',$row['p_amount'],'1','0','C');
        $pdf->cell('50','10',"1day",'1','1','C');
    
      
        
    } 
    $pdf->Output();

}
	?>