<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
require '../classes/admin.modal.cls.php';
require '../classes/admin.contr.cls.php';
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    if (isset($_POST)) {
        $adminObj = new AdminContrlCls();
        if ($_POST['action'] == 1) {
            $p_id_list = $_POST['package_ids'];
            $discount_inp = filter_var($_POST['discount_inp'], FILTER_SANITIZE_SPECIAL_CHARS);
            $days_inp = filter_var($_POST['days_inp'], FILTER_SANITIZE_SPECIAL_CHARS);
            $adminObj->createAdminCustomPackage($p_id_list, $discount_inp, $days_inp);
        } else if ($_POST['action'] == 2) {
            $remove_id = filter_var($_POST['remove_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $adminObj->removeAdminCustomPackage($remove_id);
        } else if ($_POST['action'] == 3) {
            $pay_id = filter_var($_POST['pay_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $adminObj->cancelUserPurchase($pay_id);
        } else if ($_POST['action'] == 4) {
            $pay_id = filter_var($_POST['pay_id'], FILTER_SANITIZE_SPECIAL_CHARS);
            $adminObj->processPurchaseFnc($pay_id);
        } else if ($_POST['action'] == 5) {
            $type = filter_var($_POST['type'], FILTER_SANITIZE_SPECIAL_CHARS);
            $adminObj->getChartData($type);
        }
    }
} else {
    echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
}
