<?php
require_once '../FPDF/fpdf.php';
require_once '../config.php';
require '../db/session.contr.cls.php';

$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    



$query="SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`tbl_patient`.`u_name`,`appoinment_tbl`.`symptom`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` LEFT JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` WHERE `tbl_login`.`l_id` = '" . $user_data['log_id'] . "' AND `tbl_login`.`a_id` = 2 AND `appoinment_tbl`.`status` = 0;";
$data = mysqli_query($con,$query);
   if(isset($_POST['btn_pdf']))
   {
    $pdf =new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b','14');
    $pdf->AddPage();

   
    $pdf->cell('20','10','sl no','1','0','C');
    $pdf->cell('50','10','Time','1','0','C');
    $pdf->cell('60','10','Name','1','0','C');
    $pdf->cell('60','10','Symptom','1','1','C');

    $pdf->SetFont('arial','','12');
    
    $i=1;
    while($row = mysqli_fetch_assoc($data))   
    {
        $pdf->cell('20','10',$i++,'1','0','C');
        $pdf->cell('50','10',$row['start'],'1','0','C');
        $pdf->cell('60','10',$row['u_name'],'1','0','C');
        $pdf->cell('60','10',$row['symptom'],'1','1','C');
      
        
    } 
    $pdf->Output();

}}
	?>