<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';
require '../db/session.contr.cls.php';

$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    



$query="SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '" . $user_data['log_id'] . "';";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('50','10','Start','1','0','C');
    $pdf->cell('60','10','End','1','0','C');
    $pdf->cell('60','10','Slot','1','1','C');

    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('50','10',$row['start'],'1','0','C');
        $pdf->cell('60','10',$row['end'],'1','0','C');
        $pdf->cell('60','10',$row['slot_count'],'1','1','C');
      
        
    } 
    $pdf->Output();

}}
	?>