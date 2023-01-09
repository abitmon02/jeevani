<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
require '../classes/doctor.modal.cls.php';
require '../classes/doctor.contr.cls.php';
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    if (isset($_POST)) {
        $doctorObj = new DoctorCls();
        if ($_POST['action'] == 1) {
            $start = filter_var($_POST['start'], FILTER_SANITIZE_SPECIAL_CHARS);
            $end = filter_var($_POST['end'], FILTER_SANITIZE_SPECIAL_CHARS);
            $log_id = filter_var($_POST['log_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->createSheduler($start, $end, $log_id);
        } else if ($_POST['action'] == 2) {
            $time_id = filter_var($_POST['time_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->deleteShedule($time_id);
        } else if ($_POST['action'] == 3) {
            $time_id = filter_var($_POST['time_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->changeStatus($time_id);
        } else if ($_POST['action'] == 4) {
            $appo_id = filter_var($_POST['appo_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->changeStatusdoc($appo_id, $userlog_id);
        } else if ($_POST['action'] == 5) {
            $appo_id = filter_var($_POST['appo_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $presc = filter_var($_POST['presc'], FILTER_SANITIZE_SPECIAL_CHARS);
            $symptom = filter_var($_POST['symptom'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->updateAppoDataDB($appo_id, $userlog_id, $presc, $symptom);
        }
    }
} else {
    echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
}
