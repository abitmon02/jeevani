<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';

$query="SELECT`tbl_feedback`.`fr_id`,`tbl_feedback`.`feedback`,`tbl_login`.`l_id`,`tbl_patient`.`user_id`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_feedback` INNER JOIN `tbl_login` ON `tbl_feedback`.`fr_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`user_id`;";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('50','10','Name','1','0','C');
    $pdf->cell('60','10','Email','1','0','C');
    $pdf->cell('60','10','Feedback','1','1','C');

    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('50','10',$row['u_name'],'1','0','C');
        $pdf->cell('60','10',$row['email'],'1','0','C');
        $pdf->cell('60','10',$row['feedback'],'1','1','C');
      
        
    } 
    $pdf->Output();

}
	?>