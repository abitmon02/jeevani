<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';

?>
    <!-- content -->

    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    Welcome Dr. <?= $user_data['email'] ?>
                </div>
            </div>
        </div><br>
        <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Active Appointments</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`tbl_patient`.`u_name`,`appoinment_tbl`.`symptom`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` LEFT JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` WHERE `tbl_login`.`l_id` = '" . $user_data['log_id'] . "' AND `tbl_login`.`a_id` = 2 AND `appoinment_tbl`.`status` = 0;");
                        
                                    // $result = mysqli_query($con, $sql);
                                    echo mysqli_num_rows($timing_data);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>

                    </div>
                   
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Attented Appointments</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`tbl_patient`.`u_name`,`appoinment_tbl`.`symptom`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` LEFT JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` WHERE `tbl_login`.`l_id` = '" . $user_data['log_id'] . "' AND `tbl_login`.`a_id` = 2 AND `appoinment_tbl`.`status` = 3 ");
                        
                                    // $result = mysqli_query($con, $sql);
                                    echo mysqli_num_rows($timing_data);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>

                    </div>

                    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Appointments</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`tbl_patient`.`u_name`,`appoinment_tbl`.`symptom`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` LEFT JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` WHERE `tbl_login`.`l_id` = '" . $user_data['log_id'] . "' AND `tbl_login`.`a_id` = 2 ");
                        
                                    // $result = mysqli_query($con, $sql);
                                    echo mysqli_num_rows($timing_data);
                                    ?>
                                </h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>

                    </div>
                </div>
        </div>
    <!-- content end -->
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>