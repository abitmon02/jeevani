    <?php
    class AdminModalCls extends Dbh
    {
        protected function processPurchaseDB($pay_id)
        {
            if ($this->connection()->query("UPDATE `tbl_p_purchase` SET `status` = 1 WHERE `tbl_p_purchase`.`pay_id` = '$pay_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function cancelUserPurchaseDB($pay_id)
        {
            if ($this->connection()->query("UPDATE `tbl_p_purchase` SET `status` = 5 WHERE `tbl_p_purchase`.`pay_id` = '$pay_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function checkLogidDB(int $log_id)
        {
            if (!empty($this->connection()->query("SELECT * FROM `tbl_login` WHERE `tbl_login`.`l_id` = '$log_id';")->fetch_assoc())) {
                return true;
            } else {
                return false;
            }
        }
        protected function createAdminCustomPackageDB($discount_inp, $days_inp)
        {
            $temp_conn = $this->connection();
            if ($temp_conn->query("INSERT INTO `admin_custom_pack_main_tbl`(`days`, `discount`, `status`) VALUES ('$days_inp','$discount_inp',1)")) {
                return $temp_conn->insert_id;
            } else {
                return 0;
            }
        }
        protected function createAdminCustomPackageDB1($last_insert_id, $id)
        {
            if ($this->connection()->query("INSERT INTO `admin_custom_pack_slave_tbl`(`main_tbl_id`, `each_package_id`) VALUES ('$last_insert_id','$id')")) {
                return true;
            } else {
                return false;
            }
        }
        protected function RemoveAdminCustomPackageDB($remove_id)
        {
            if ($this->connection()->query("DELETE FROM `admin_custom_pack_main_tbl` WHERE `admin_custom_pack_main_tbl`.`id` = '$remove_id';")) {
                return true;
            } else {
                return false;
            }
        }
        protected function getChartDataDB($type)
        {
            if ($type == 1) {
                // bar chart
                return $this->connection()->query("SELECT `tbl_product`.`product_name`,SUM(`tbl_p1_purchase`.`qty`) as total FROM `tbl_p1_purchase` INNER JOIN `tbl_product` on `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` GROUP BY `tbl_p1_purchase`.`product_id`;")->fetch_all(MYSQLI_ASSOC);
            } else if ($type == 2) {
                return $this->connection()->query("SELECT `tbl_doctor`.`d_name`,COUNT(`appoinment_tbl`.`appo_id`) as total FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` INNER JOIN `tbl_doctor` ON `tbl_login`.`l_id` = `tbl_doctor`.`l_id` GROUP BY `tbl_doctor`.`l_id`;")->fetch_all(MYSQLI_ASSOC);
            } else if ($type == 3) {
                // histogram
                return $this->connection()->query("SELECT COUNT(*) as tot_count,`preditction_anys1_tbl`.`result_out` FROM `preditction_anys1_tbl` GROUP BY `preditction_anys1_tbl`.`result_out`;")->fetch_all(MYSQLI_ASSOC);
            }
        }
    }
