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
            $slot_count = filter_var($_POST['slot_count'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->createSheduler($start, $end, $log_id, $slot_count);
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
        } else if ($_POST['action'] == 6) {
            $appo_id = filter_var($_POST['appo_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->zoomMeetLinkGen($appo_id);
        } else if ($_POST['action'] == 7) {
            $doctor_id = filter_var($_POST['doctor_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_var($_POST['type'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->changeTimingStatusBulk($doctor_id, $status);
        } else if ($_POST['action'] == 8) {
            $doctor_id = filter_var($_POST['doctor_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $reason = filter_var($_POST['reason'], FILTER_SANITIZE_SPECIAL_CHARS);
            $fdate = filter_var($_POST['fdate'], FILTER_SANITIZE_SPECIAL_CHARS);
            $tdate = filter_var($_POST['tdate'], FILTER_SANITIZE_SPECIAL_CHARS);
            $leave_type = filter_var($_POST['leave_type'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->doctorLeaveApply($doctor_id, $reason, $leave_type, $fdate, $tdate);
        } else if ($_POST['action'] == 9) {
            $leave_id = filter_var($_POST['leave_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->doctorLeaveCancel($leave_id);
        } else if ($_POST['action'] == 10) {
            $doctor_id = filter_var($_POST['doctor_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $d_name = filter_var($_POST['d_name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_var($_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);
            $specialized = filter_var($_POST['specialized'], FILTER_SANITIZE_SPECIAL_CHARS);
            $cfee = filter_var($_POST['cfee'], FILTER_SANITIZE_SPECIAL_CHARS);
            $doctorObj->updateDrProfile($doctor_id, $d_name, $email, $address, $specialized,$cfee);
        }
    }
} else {
    echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
}
