<?php
class AdminContrlCls extends AdminModalCls
{
    public function removeAdminCustomPackage($remove_id)
    {
        if (is_numeric($remove_id) && $remove_id != 0) {
            if ($this->RemoveAdminCustomPackageDB($remove_id)) {
                $return_data = ['status' => 1, 'msg' => "Your custom package removed."];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to remove package. contact devops', 'code' => 0];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Value manipultaion found.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function createAdminCustomPackage($p_id_list, $discount_inp, $days_inp)
    {
        if (!empty($p_id_list)) {
            if (is_numeric($discount_inp) && $discount_inp >= 0 && $discount_inp <= 100) {
                if (is_numeric($days_inp) && $days_inp >= 0 && $days_inp <= 100) {
                    $last_insert_id = $this->createAdminCustomPackageDB($discount_inp, $days_inp);
                    if ($last_insert_id > 0) {
                        foreach ($p_id_list as $id) {
                            $this->createAdminCustomPackageDB1($last_insert_id, $id);
                        }
                        $return_data = ['status' => 1, 'msg' => "Your custom package created."];
                    } else {
                        $return_data = ['status' => 0, 'msg' => 'Something appen from our end. please contact devops', 'code' => 0];
                    }
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Please enter valid number of days', 'code' => 0];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Please enter valid disocunt', 'code' => 0];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Please select at least one pakcage', 'code' => 0];
        }
        echo json_encode($return_data);
    }
}
