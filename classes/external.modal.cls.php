    <?php
    class ExternalModalCls extends Dbh
    {
        protected function processPurchaseDB($pay_id)
        {
            if ($this->connection()->query("UPDATE `tbl_p_purchase` SET `status` = 1 WHERE `tbl_p_purchase`.`pay_id` = '$pay_id';")) {
                return true;
            } else {
                return false;
            }
        }
    }
