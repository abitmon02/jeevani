<?php


require '../db/config.php';
require '../db/session.contr.cls.php';
require '../classes/external.modal.cls.php';
require '../classes/external.cont.cls.php';
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    if (isset($_POST)) {
        if ($_POST['action'] == 1) {
            $symtopms = filter_var_array($_POST['symptom'], FILTER_DEFAULT);
            $type = $_POST['type'];
            $obj  = new ExternalContrlCls();
            $obj->getApiData($symtopms, $type, $sessObj->getSessionData()['log_id']);
        }
    }
} else {
    echo json_encode(['status' => 404, 'msg' => 'Unauthorized Request']);
}
