<?php
class UserModalcls extends Dbh
{

    protected function searchProductsDb($keyword)
    {
        return $this->connection()->query('SELECT * FROM `tbl_product` WHERE `tbl_product`.`product_name` LIKE "%' . $keyword . '%" OR `tbl_product`.`description` LIKE "%' . $keyword . '%";')->fetch_all(MYSQLI_ASSOC);
    }
    protected function cancelUserPurchaseDB($pay_id)
    {
        if ($this->connection()->query("UPDATE `tbl_p_purchase` SET `status` = 4 WHERE `tbl_p_purchase`.`pay_id` = '$pay_id';")) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkLogidDB(int $log_id): bool
    {
        if (!empty($this->connection()->query("SELECT * FROM `tbl_login` WHERE `tbl_login`.`l_id` = '$log_id';")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkTimeSheduleDB(string $start, string $end, int $log_id): bool
    {
        if (empty($this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '$log_id' AND (`doctor_timing_tbl`.`start` > '$start' OR `doctor_timing_tbl`.`start` = '$start') || (`doctor_timing_tbl`.`end` < '$end' OR `doctor_timing_tbl`.`end` = '$end');")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkTimeSheduleDB1(int $log_id): bool
    {
        if (empty($this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '$log_id';")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkTimeidDB(int $time_id): bool
    {
        if (!empty($this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` = '$time_id';")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }

    protected function getTImesheduleDataDB(int $doc_log_id)
    {
        return $this->connection()->query("SELECT `tbl_login`.`l_id`,`doctor_timing_tbl`.`time_id`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `tbl_login` INNER JOIN `doctor_timing_tbl` ON `tbl_login`.`l_id` = `doctor_timing_tbl`.`l_id` WHERE `tbl_login`.`l_id` = '$doc_log_id' AND `doctor_timing_tbl`.`status` = 1;")->fetch_all(MYSQLI_ASSOC);
    }
    protected function changeStatusDB(int $appo_id, int $user_log_id): bool
    {
        if ($this->connection()->query("UPDATE `appoinment_tbl` SET `status`= 4 WHERE `appoinment_tbl`.`appo_id` = '$appo_id' AND `appoinment_tbl`.`l_id` = '$user_log_id'")) {
            return true;
        } else {
            return false;
        }
    }
    protected function changeStatusDB1(int $appo_id, int $user_log_id): bool
    {
        if ($this->connection()->query("UPDATE `appoinment_tbl` SET `status`= 2 WHERE `appoinment_tbl`.`appo_id` = '$appo_id' AND `appoinment_tbl`.`l_id` = '$user_log_id'")) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkAppoinmentExistcurrentDB(string $date, int $time_id, int $user_log_id): bool
    {
        if (empty($this->connection()->query("SELECT * FROM `appoinment_tbl` WHERE `appoinment_tbl`.`l_id` ='$user_log_id' AND `appoinment_tbl`.`date` = '$date' AND `appoinment_tbl`.`status` = 0 AND `appoinment_tbl`.`time_id` = '$time_id'")->fetch_all(MYSQLI_ASSOC))) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkDoctorSlotCount(int $time_id, string $date)
    {
        $slot_count = $this->connection()->query("SELECT `doctor_timing_tbl`.`slot_count` as slot_count FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` = '$time_id' ")->fetch_assoc()['slot_count'];
        $curr_count =  $this->connection()->query("SELECT count(*) as curr_count FROM `appoinment_tbl` WHERE `appoinment_tbl`.`time_id` = '$time_id' AND `appoinment_tbl`.`date` ='$date' AND `appoinment_tbl`.`status` = 0")->fetch_assoc()['curr_count'];
        // echo $slot_count, $curr_count;
        if ($curr_count < $slot_count) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkDoctorLeaveStatus(int $time_id, string $date): bool
    {
        if (empty($this->connection()->query("SELECT * FROM `tbl_leave` WHERE '$date' BETWEEN `tbl_leave`.`fdate` AND `tbl_leave`.`tdate` AND `tbl_leave`.`l_id` = (SELECT `doctor_timing_tbl`.`l_id` from `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` ='$time_id') AND `tbl_leave`.`status` = 1;")->fetch_all())) {
            return true;
        } else {
            return false;
        }
    }
    protected function get_time_data($time_id)
    {
        return $this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` = '$time_id';")->fetch_assoc();
    }
    protected function get_curr_appo_count_data($date, $time_id)
    {
        return $this->connection()->query("SELECT COUNT(*) as current_count FROM `appoinment_tbl` WHERE `appoinment_tbl`.`time_id` = '$time_id' AND `appoinment_tbl`.`date` = '$date';")->fetch_assoc();
    }
    protected function insertAppoinment(string $date, int $time_id, int $user_log_id, string $token,): bool
    {
        if ($this->connection()->query("INSERT INTO `appoinment_tbl`(`time_id`, `l_id`, `date`, `token`, `fee_status`,`prescription`, `status`) VALUES ('$time_id','$user_log_id','$date','$token',0,'',0)")) {
            return true;
        } else {
            return false;
        }
    }
    protected function fetchFeeData(int $appo_id): array
    {
        return $this->connection()->query("SELECT `appoinment_tbl`.`appo_id`,`doctor_timing_tbl`.`time_id`,`tbl_doctor`.`d_fees` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` ON `doctor_timing_tbl`.`l_id`=`tbl_doctor`.`l_id`  WHERE `appoinment_tbl`.`appo_id` = '$appo_id';")->fetch_assoc();
    }
    protected function fetchFeeData1(int $package_id): array
    {
        return $this->connection()->query("SELECT * FROM `tbl_packages` WHERE `tbl_packages`.`p_id` = '$package_id';")->fetch_assoc();
    }
    protected function fetchLoggedUserData(int $logged_id)
    {
        return $this->connection()->query("SELECT `tbl_login`.`l_id`,`tbl_patient`.`u_name`,`tbl_patient`.`address`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`tbl_login`.`email` FROM `tbl_login` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id` WHERE `tbl_login`.`l_id` = '$logged_id';")->fetch_assoc();
    }
    protected function customuserPackageDB($userlog_id, $inp_num_days, $status, $appo_date, $main_p_id)
    {
        $conn_temp_obj =  $this->connection();
        if ($conn_temp_obj->query("INSERT INTO `tbl_custom_package`(`user_log_id`, `type_status`, `create_date`,`num_days`,`appo_date`,`admin_custom_p_id`) VALUES ('$userlog_id','$status',now(),'$inp_num_days','$appo_date','$main_p_id')")) {
            return $conn_temp_obj->insert_id;
        } else {
            return  0;
        }
    }
    protected function addUserPackagetblDB($return_last_id, $id)
    {
        if ($this->connection()->query("INSERT INTO `tbl_user_packages`(`package_id`, `each_package_id`) VALUES ('$return_last_id','$id')")) {
            return true;
        } else {
            return false;
        }
    }
    protected function removeCustomPackageDB($remove_id, $userlog_id)
    {
        if ($this->connection()->query("DELETE FROM `tbl_custom_package` WHERE `tbl_custom_package`.`id` = '$remove_id' AND `tbl_custom_package`.`user_log_id` ='$userlog_id' ")) {
            return true;
        } else {
            return false;
        }
    }
    protected function fetchCustomPackageTotalAmt($user_pack_id)
    {
        return $this->connection()->query("SELECT sum(`tbl_packages`.`p_amount` * (SELECT `tbl_custom_package`.`num_days` FROM `tbl_custom_package` WHERE `tbl_custom_package`.`id` = `tbl_user_packages`.`package_id`)) as total FROM `tbl_user_packages` INNER JOIN `tbl_packages` ON `tbl_user_packages`.`each_package_id` = `tbl_packages`.`p_id` WHERE `tbl_user_packages`.`package_id` = '$user_pack_id';")->fetch_assoc();
    }
    protected function fetchCustomPackageData($userlog_id, $user_pack_id)
    {
        return $this->connection()->query("SELECT `tbl_custom_package`.`id`,`tbl_custom_package`.`user_log_id`,`tbl_custom_package`.`type_status`,`tbl_custom_package`.`create_date`,`tbl_custom_package`.`num_days`,`tbl_custom_package`.`appo_date`,`tbl_custom_package`.`admin_custom_p_id`,`admin_custom_pack_main_tbl`.`days`,`admin_custom_pack_main_tbl`.`discount` FROM `tbl_custom_package` LEFT JOIN `admin_custom_pack_main_tbl` ON `tbl_custom_package`.`admin_custom_p_id` = `admin_custom_pack_main_tbl`.`id` WHERE `tbl_custom_package`.`id` = '$user_pack_id' AND `tbl_custom_package`.`user_log_id` = '$userlog_id';")->fetch_assoc();
    }
    protected function addToCartDB($userlog_id, $productId, $qty)
    {
        if ($this->connection()->query("INSERT INTO `tbl_cart`( `product_id`,`user_log_id`, `qty`, `date`) VALUES ('$productId','$userlog_id','$qty',now())")) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkProductExitDB($userlog_id, $productId)
    {
        if (empty($this->connection()->query("SELECT * FROM `tbl_cart` WHERE `tbl_cart`.`user_log_id` = '$userlog_id' AND `tbl_cart`.`product_id` = '$productId'")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }
    protected function removeFromCartDB($cart_id)
    {
        if ($this->connection()->query("DELETE FROM `tbl_cart` WHERE `tbl_cart`.`cart_id` = '$cart_id'")) {
            return true;
        } else {
            return false;
        }
    }
    protected function FetchCartTotal($user_id)
    {
        return $this->connection()->query("SELECT sum(IF(`tbl_cart`.`qty` > 0,`tbl_cart`.`qty` * `tbl_product`.`price`,0)) as total_amount FROM `tbl_cart` INNER JOIN `tbl_product` ON `tbl_cart`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_cart`.`user_log_id` = '$user_id';")->fetch_assoc();
    }
    protected function fetchBillAddress($address_id)
    {
        return $this->connection()->query("SELECT * FROM `tbl_bill_address` INNER JOIN `tbl_login` ON `tbl_bill_address`.`user_log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_bill_address`.`user_log_id` = `tbl_bill_address`.`user_log_id` WHERE `tbl_bill_address`.`address_id` = '$address_id';")->fetch_assoc();
    }
    protected function addNewUserAddressDB($user_id, $contact_number, $address, $pincode)
    {
        if ($this->connection()->query("INSERT INTO `tbl_bill_address`( `user_log_id`, `contact_no`, `address`, `pincode`, `date`) VALUES ('$user_id','$contact_number','$address','$pincode',now())")) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkStock($user_id)
    {
        return $this->connection()->query("SELECT * FROM `tbl_cart` INNER JOIN `tbl_product` ON `tbl_cart`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_cart`.`user_log_id` = '$user_id';")->fetch_all(MYSQLI_ASSOC);
    }
    protected function getStockData($productId)
    {
        return $this->connection()->query("SELECT `tbl_product`.`stock` FROM `tbl_product` WHERE `tbl_product`.`product_id` = '$productId'")->fetch_assoc();
    }
    protected function updateUserProfileDB($data)
    {
        if ($this->connection()->query("UPDATE `tbl_patient` SET `u_name`='" . $data['userName'] . "',`address`='" . $data['address'] . "',`city`='" . $data['city'] . "',`dob`='" . $data['dob_inp'] . "',`gender`='" . $data['gender'] . "',`bloodgrp`='" . $data['bloodgrp'] . "' WHERE `l_id`='" . $data['user_id'] . "'")) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkAppoIdDB($appo_id)
    {
        if (!empty($this->connection()->query("SELECT * FROM `appoinment_tbl` WHERE `appoinment_tbl`.`appo_id` = '$appo_id'")->fetch_assoc())) {
            return true;
        } else {
            return false;
        }
    }

    protected function insertUserDoctorFeedbackDB($appo_id, $response, $rating, $user_id)
    {
        if ($this->connection()->query("INSERT INTO `serv_feedback_tbl`(`appo_id`,`user_id`, `response`, `rating`, `date`) VALUES ('$appo_id','$user_id','$response','$rating',now())")) {
            return true;
        } else {
            return false;
        }
    }
    protected function updateUserDoctorFeedbackDB($appo_id, $response, $rating, $user_id)
    {
        if ($this->connection()->query("UPDATE `serv_feedback_tbl` SET `response`='$response',`rating`='$rating' WHERE `serv_feedback_tbl`.`appo_id` = '$appo_id' AND `serv_feedback_tbl`.`user_id` = '$user_id'")) {
            return true;
        } else {
            return false;
        }
    }
    protected function checkFeedbackExistDB($appo_id, $user_id)
    {
        if (empty($this->connection()->query("SELECT * FROM `serv_feedback_tbl` WHERE `serv_feedback_tbl`.`appo_id` = '$appo_id' AND `serv_feedback_tbl`.`user_id` = '$user_id'")->fetch_all())) {
            return true;
        } else {
            return false;
        }
    }
    protected function getAppoDataDB($time_id)
    {
        return $this->connection()->query("SELECT TIME_FORMAT(`doctor_timing_tbl`.`end`,'%h:%I') as time_end FROM `doctor_timing_tbl` WHERE  `doctor_timing_tbl`.`time_id` = '$time_id'")->fetch_assoc()['time_end'];
    }
}
