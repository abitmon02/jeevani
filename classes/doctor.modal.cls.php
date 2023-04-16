    <?php
    class DoctorModalcls extends Dbh
    {
        protected function updateDrProfileDB($doctor_id, $d_name, $email, $address, $specialized, $cfee)
        {
            if ($this->connection()->query("UPDATE tbl_doctor set d_name='$d_name',d_address='$address',spec='$specialized',d_fees='$cfee' where `l_id`='$doctor_id'")) {
                return true;
            } else {
                return false;
            }
        }
        protected function doctorLeaveCancelDB($leave_id)
        {
            if ($this->connection()->query("UPDATE `tbl_leave` SET `status`='3' WHERE `tbl_leave`.`lv_id` = '$leave_id'")) {
                return true;
            } else {
                return false;
            }
        }
        protected function insertLeaveDataDB($doctor_id, $reason, $leave_type, $fdate, $tdate): bool
        {
            if ($this->connection()->query("INSERT INTO `tbl_leave`(`l_id`,`type`,`fdate`,`tdate`,`reason`) VALUES ('$doctor_id','$leave_type','$fdate','$tdate','$reason')")) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkLeaveExistOnDateDB($doctor_id, $fdate, $tdate): bool
        {
            if (empty($this->connection()->query("SELECT * FROM `tbl_leave` WHERE `tbl_leave`.`status` in (0,1) AND `tbl_leave`.`l_id` = '$doctor_id' AND '$fdate' BETWEEN `tbl_leave`.`fdate` AND `tbl_leave`.`tdate`;")->fetch_assoc())) {
                if (empty($this->connection()->query("SELECT * FROM `tbl_leave` WHERE `tbl_leave`.`status` in (0,1) AND `tbl_leave`.`l_id` = '$doctor_id' AND '$tdate' BETWEEN `tbl_leave`.`fdate` AND `tbl_leave`.`tdate`;")->fetch_assoc())) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        protected function updateTimingStatusBulk($doctor_id, $status)
        {
            if ($this->connection()->query("UPDATE `doctor_timing_tbl` SET `status`='$status' WHERE `doctor_timing_tbl`.`l_id` = '$doctor_id'")) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkDoctorId($doctor_id)
        {
            if (!empty($this->connection()->query("SELECT * FROM `tbl_login` WHERE `tbl_login`.`l_id` = '$doctor_id' AND `tbl_login`.`a_id` = '2'")->fetch_assoc())) {
                return true;
            } else {
                return false;
            }
        }
        protected function getCorrespondUserDB($appo_id)
        {
            return $this->connection()->query("SELECT `appoinment_tbl`.`appo_id`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `appoinment_tbl` INNER JOIN `tbl_login` ON `appoinment_tbl`.`l_id` = `tbl_login`.`l_id` LEFT JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id` WHERE `appoinment_tbl`.`appo_id` = '$appo_id';")->fetch_assoc();
        }
        protected function checkLogidDB(int $log_id)
        {
            if (!empty($this->connection()->query("SELECT * FROM `tbl_login` WHERE `tbl_login`.`l_id` = '$log_id';")->fetch_assoc())) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkTimeSheduleDB(string $start, string $end, int $log_id)
        {
            if (empty($this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '$log_id' AND (`doctor_timing_tbl`.`start` > '$start' OR `doctor_timing_tbl`.`start` = '$start') AND (`doctor_timing_tbl`.`end` < '$end' OR `doctor_timing_tbl`.`end` = '$end');")->fetch_assoc())) {
                return true;
            } else {
                return false;
            }
        }
        protected function insertTimeDB(string $start, string $end, int $log_id, int  $slot_count)
        {
            if ($this->connection()->query("INSERT INTO `doctor_timing_tbl`(`l_id`, `start`, `end`,`slot_count`, `status`) VALUES ('$log_id','$start','$end','$slot_count',1)")) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkTimeidDB(int $time_id)
        {
            if (!empty($this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` = '$time_id';")->fetch_assoc())) {
                return true;
            } else {
                return false;
            }
        }
        protected function deleteTimeSheduleDB(int $time_id)
        {
            if ($this->connection()->query("DELETE FROM `doctor_timing_tbl` WHERE`doctor_timing_tbl`.`time_id` = '$time_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function getTImesheduleDataDB(int $time_id)
        {
            return $this->connection()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`time_id` = '$time_id';")->fetch_assoc();
        }
        protected function changeStatusDB(int $time_id, int $status)
        {
            if ($this->connection()->query("UPDATE `doctor_timing_tbl` SET `status`='$status' WHERE `doctor_timing_tbl`.`time_id` = '$time_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkAppidDB(int $appo_id): bool
        {
            if (!empty($this->connection()->query("SELECT * FROM `appoinment_tbl` WHERE `appoinment_tbl`.`appo_id` = '$appo_id';"))) {
                return true;
            } else {
                return false;
            }
        }
        protected function updateAppoStatusDB(int $appo_id, int $userlog_id): bool
        {
            if ($this->connection()->query("UPDATE `appoinment_tbl` SET `status`= 5 WHERE `appoinment_tbl`.`appo_id` ='$appo_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function updateAppoStatusDB1(int $appo_id, int $userlog_id, string $presc, string $symptom): bool
        {
            if ($this->connection()->query("UPDATE `appoinment_tbl` SET `prescription`='$presc',`symptom`='$symptom',`status`= 3 WHERE `appoinment_tbl`.`appo_id` ='$appo_id';")) {
                return true;
            } else {
                return false;
            }
        }
    }
