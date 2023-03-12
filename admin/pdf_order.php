<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';

$query="SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id` INNER JOIN `tbl_p1_purchase` ON `tbl_p_purchase`.`pay_id` = `tbl_p1_purchase`.`pay_id` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` INNER JOIN `tbl_login` ON `tbl_p_purchase`.`log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id`;";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('40','10','Name','1','0','C');
    $pdf->cell('40','10','Product','1','0','C');
    $pdf->cell('30','10','Price','1','0','C');
    $pdf->cell('30','10','Quantity','1','0','C');
    $pdf->cell('30','10','Total','1','1','C');
     
  
    
    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('40','10',$row['u_name'],'1','0','C');
        $pdf->cell('40','10',$row['product_name'],'1','0','C');
        $pdf->cell('30','10',$row['price'],'1','0','C');
        $pdf->cell('30','10',$row['qty'],'1','0','C');
        $pdf->cell('30','10',$row['total_amount'],'1','1','C');
    
      
        
    } 
    $pdf->Output();

}
	?>