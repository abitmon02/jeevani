<?php
class UserModalcls extends Dbh
{
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
    protected function checkAppoinmentExistcurrentDB(string $date, int $user_log_id)
    {
        return $this->connection()->query("SELECT * FROM `appoinment_tbl` WHERE `appoinment_tbl`.`l_id` ='$user_log_id' AND `appoinment_tbl`.`date` = '$date'")->fetch_all(MYSQLI_ASSOC);
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
    protected function customuserPackageDB($userlog_id)
    {
        $conn_temp_obj =  $this->connection();
        if ($conn_temp_obj->query("INSERT INTO `tbl_custom_package`(`user_log_id`, `status`, `date`) VALUES ('$userlog_id','1',now())")) {
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
}
