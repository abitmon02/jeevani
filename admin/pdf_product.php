<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';

$query="SELECT `tbl_product`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`stock`,`tbl_product`.`price`,`tbl_product`.`image`,`tbl_product`.`description`,`tbl_product`.`date`,`tbl_product`.`status`,`tbl_category`.`cata_name` FROM `tbl_product` INNER JOIN `tbl_category` ON `tbl_product`.`cata_id` = `tbl_category`.`cata_id`;";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('50','10','Cat Name','1','0','C');
    $pdf->cell('50','10','Pro Name','1','0','C');
    $pdf->cell('50','10','Created on','1','0','C');
    $pdf->cell('20','10','stock','1','1','C');
  
    
    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('50','10',$row['cata_name'],'1','0','C');
        $pdf->cell('50','10',$row['product_name'],'1','0','C');
        $pdf->cell('50','10',$row['date'],'1','0','C');
        $pdf->cell('20','10',$row['stock'],'1','1','C');
      
        
    } 
    $pdf->Output();

}
	?>