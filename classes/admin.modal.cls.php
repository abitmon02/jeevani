    <?php
    class AdminModalCls extends Dbh
    {
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
    }
