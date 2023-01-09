<?php

require '../db/config.php';
require '../db/session.contr.cls.php';
require '../classes/user.modal.cls.php';
require '../classes/user.contr.cls.php';
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    if (isset($_POST)) {
        $userObj = new UserCls();
        if ($_POST['action'] == 3) {
            $date = filter_var($_POST['date'], FILTER_SANITIZE_SPECIAL_CHARS);
            $time_id = filter_var($_POST['time_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);

            $userObj->createAppoinment($date, $time_id, $userlog_id);
        } else if ($_POST['action'] == 2) {
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $appo_id = filter_var($_POST['appo_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->deleteAppoDB($appo_id, $userlog_id);
        } else if ($_POST['action'] == 1) {
            $doc_log_id = filter_var($_POST['doc_log_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->changeStatus($doc_log_id);
        } else if ($_POST['action'] == 4) {
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $appo_id = filter_var($_POST['appo_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->payAppoFnc($appo_id, $userlog_id);
        } else if ($_POST['action'] == 5) {
            $visitDate = filter_var($_POST['visitDate'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $package_id = filter_var($_POST['package_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->payPackageFnc($package_id, $userlog_id, $visitDate);
        } else if ($_POST['action'] == 6) {
            $p_id_list = $_POST['p_id_list'];
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->createCustomPackage($p_id_list, $userlog_id);
        } else if ($_POST['action'] == 7) {
            $remove_id = filter_var($_POST['remove_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->removeCustomPackage($remove_id, $userlog_id);
        } else if ($_POST['action'] == 8) {
            print_r($_POST);
            $p_id_list = $_POST['p_id_list'];
            $days = filter_var($_POST['days'], FILTER_SANITIZE_SPECIAL_CHARS);
            $main_package_id = filter_var($_POST['main_package_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $appo_date = filter_var($_POST['appo_date'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userlog_id = filter_var($_POST['userlog_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userObj->removeCustomPackage($remove_id, $userlog_id);
        }
    }
} else {
    echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
}
