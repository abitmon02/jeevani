<?php
class DoctorCls extends DoctorModalcls
{
    public function createSheduler($start, $end, $log_id)
    {
        if ($this->checkLogidDB($log_id)) {
            if ($this->checkTimeSheduleDB($start, $end, $log_id)) {
                if ($this->insertTimeDB($start, $end, $log_id)) {
                    $return_data = ['status' => 1, 'msg' => 'Successfully created time shedule'];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to create time shedule.Db Error', 'code' => 1];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Sorry. unable to insert the time shedule. coz the shedule is alredy exist.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function deleteShedule($time_id)
    {
        if (is_numeric($time_id) && $this->checkTimeidDB($time_id)) {
            if ($this->deleteTimeSheduleDB($time_id)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully deleted the time shedule'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to delete selected time shedule. Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function changeStatus($time_id)
    {
        if (is_numeric($time_id) && $this->checkTimeidDB($time_id)) {
            $data = $this->getTImesheduleDataDB($time_id);
            if (!empty($data)) {
                if ($this->changeStatusDB($time_id, $data['status'] == 1 ? 0 : 1)) {
                    $return_data = ['status' => 1, 'msg' => 'Successfully updated the status'];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to update status. Db error.', 'code' => 1];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function changeStatusdoc($appo_id, $userlog_id)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkAppidDB($appo_id)) {
            if ($this->updateAppoStatusDB($appo_id, $userlog_id)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully Cancelled the appoinment'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to cancell the update Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function updateAppoDataDB($appo_id, $userlog_id, $presc,$symptom)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkAppidDB($appo_id)) {
            if ($this->updateAppoStatusDB1($appo_id, $userlog_id, $presc,$symptom)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully Completed the appoinment'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to Complete the appoinment. Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
}
