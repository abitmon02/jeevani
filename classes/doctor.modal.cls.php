    <?php
    class DoctorModalcls extends Dbh
    {
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
        protected function insertTimeDB(string $start, string $end, int $log_id)
        {
            if ($this->connection()->query("INSERT INTO `doctor_timing_tbl`(`l_id`, `start`, `end`, `status`) VALUES ('$log_id','$start','$end',1)")) {
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
