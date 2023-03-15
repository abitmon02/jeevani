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
                    Welcome User <?= $user_data['email'] ?>
                </div>
            </div>
        </div>
    </div>
    <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Appointments</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "'");
                        
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
                                <h5 class="card--title">Total Treatment Bookings</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `tbl_custom_package`.`fee_status`,`tbl_custom_package`.`id`,`tbl_custom_package`.`user_log_id`,`tbl_custom_package`.`type_status`,`tbl_custom_package`.`create_date`,`tbl_custom_package`.`num_days`,`tbl_custom_package`.`appo_date`,`tbl_custom_package`.`admin_custom_p_id`,`admin_custom_pack_main_tbl`.`days`,`admin_custom_pack_main_tbl`.`discount`,`payment1_tbl`.`r_pay_id`,`payment1_tbl`.`r_order_id`,`payment1_tbl`.`date` as paid_date,`payment1_tbl`.`amount` FROM `tbl_custom_package` LEFT JOIN `admin_custom_pack_main_tbl` ON `tbl_custom_package`.`admin_custom_p_id` = `admin_custom_pack_main_tbl`.`id` LEFT JOIN `payment1_tbl` on `payment1_tbl`.`custom_package_id` = `tbl_custom_package`.`id` WHERE `tbl_custom_package`.`user_log_id` = '" . $user_data['log_id'] . "' AND `tbl_custom_package`.`fee_status` = 1;");
                        
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
                                <h5 class="card--title">Total Product Orders</h5>
                                <h1>
                                    <?php
                                    $sql = "SELECT * from tbl_patient where status=0";
                                    $timing_data = $dbObj->connFnc()->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id` INNER JOIN `tbl_p1_purchase` ON `tbl_p_purchase`.`pay_id` = `tbl_p1_purchase`.`pay_id` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_p_purchase`.`log_id` = '" . $user_data['log_id'] . "';");
                        
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