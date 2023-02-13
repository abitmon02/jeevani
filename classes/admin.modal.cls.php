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
                return $this->connection()->query("SELECT `tbl_doctor`.`d_name`,COUNT(`appoinment_tbl`.`appo_id`)as total FROM `tbl_doctor` INNER JOIN `appoinment_tbl` ON `tbl_doctor`.`l_id` = `appoinment_tbl`.`l_id` GROUP BY `tbl_doctor`.`d_id`;")->fetch_all(MYSQLI_ASSOC);
            } else if ($type == 3) {
                // line chart
            }
        }
    }
