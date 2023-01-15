<?php
require_once '../vendor/autoload.php';
define('key_id', 'rzp_test_D41v2YKNMela73');
define('key_secret', '1rQWy8jpOREORWActw8qs4Lt');
// require '../db/session.contr.cls.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class UserCls extends UserModalcls
{
    public function removeCustomPackage($remove_id, $userlog_id)
    {
        if (is_numeric($remove_id) && is_numeric($userlog_id)) {
            if ($this->removeCustomPackageDB($remove_id, $userlog_id)) {
                $return_data = ['status' => 1, 'msg' => "Your custom package Removed."];
            } else {
                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value manipulation found", 'error_code' => 1];
        }
        echo json_encode($return_data);
    }
    public function __call($name_of_function, $arguments)
    {
        // It will match the function name
        if ($name_of_function == 'createCustomPackage') {
            switch (count($arguments)) {
                case 5:
                    // If there is only 5 argument
                    // invoke function overriding and insert  custom user packages to db
                    if (!empty($arguments[0])) {
                        if (is_numeric($arguments[2]) && $arguments[2] > 0) {
                            $return_last_id =  $this->customuserPackageDB($arguments[1], $arguments[2], $arguments[3], $arguments[4], 0);
                            if ($return_last_id != 0) {
                                foreach ($arguments[0] as $id) {
                                    $this->addUserPackagetblDB($return_last_id, $id);
                                }
                                $return_data = ['status' => 1, 'msg' => "Your custom package created."];
                            } else {
                                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
                            }
                        } else {
                            $return_data = ['status' => 0, 'msg' => "Minimum statying day is 1.", 'error_code' => 1];
                        }
                    } else {
                        $return_data = ['status' => 0, 'msg' => "Please choose at least one package", 'error_code' => 1];
                    }
                    echo json_encode($return_data);
                    break;
                case 6:
                    if (!empty($arguments[0])) {
                        if (is_numeric($arguments[2]) && $arguments[2] > 0) {
                            $return_last_id =  $this->customuserPackageDB($arguments[1], $arguments[2], $arguments[3], $arguments[4], $arguments[5]);
                            if ($return_last_id != 0) {
                                foreach ($arguments[0] as $id) {
                                    $this->addUserPackagetblDB($return_last_id, $id);
                                }
                                $return_data = ['status' => 1, 'msg' => "Your custom package created."];
                            } else {
                                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
                            }
                        } else {
                            $return_data = ['status' => 0, 'msg' => "Minimum starting day is 1.", 'error_code' => 1];
                        }
                    } else {
                        $return_data = ['status' => 0, 'msg' => "Please choose at least one package", 'error_code' => 1];
                    }
                    echo json_encode($return_data);
                    break;
                default:
                    $return_data = ['status' => 0, 'msg' => "unauthorized request", 'error_code' => 1];
                    echo json_encode($return_data);
                    break;
            }
        }
    }
    public function createAppoinment($date, $time_id, $user_log_id)
    {
        if ($this->checkLogidDB($user_log_id) && $this->checkTimeSheduleDB1($time_id) && is_numeric($time_id) && is_numeric($user_log_id)) {
            $token =   'Token-' . bin2hex(random_bytes(5));
            $data = $this->checkAppoinmentExistcurrentDB($date, $user_log_id);
            if (!empty($data)) {
                $temp = array();
                foreach ($data as $value) {
                    if ($date ==  date("Y-m-d", strtotime($value['date'])) && $value['status'] == 0) {
                        array_push($temp, $value['appo_id']);
                    }
                    if ($date ==  date("Y-m-d", strtotime($value['date'])) && $value['status'] == 2) {
                        array_push($temp, $value['appo_id']);
                    }
                    if ($date ==  date("Y-m-d", strtotime($value['date'])) && $value['status'] == 3) {
                        array_push($temp, $value['appo_id']);
                    }
                }
                if (empty($temp)) {
                    if ($this->insertAppoinment($date, $time_id, $user_log_id, $token)) {
                        $return_data = ['status' => 1, 'msg' => "Your appoinment successfull."];
                    } else {
                        $return_data = ['status' => 0, 'msg' => "Failed to create appoinment", 'error_code' => 3];
                    }
                } else {
                    $return_data = ['status' => 0, 'msg' => "Appoinment Exist on same date", 'error_code' => 2];
                }
            } else {
                if ($this->insertAppoinment($date, $time_id, $user_log_id, $token)) {
                    $return_data = ['status' => 1, 'msg' => "Your appoinment successfull."];
                } else {
                    $return_data = ['status' => 0, 'msg' => "Failed to create appoinment", 'error_code' => 1];
                }
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function deleteAppoDB($appo_id, $userlog_id)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkLogidDB($userlog_id)) {
            if ($this->changeStatusDB($appo_id, $userlog_id)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully canceled the Appoinment'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to cencel selected Appoinment shedule. Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function payAppoFnc($appo_id, $userlog_id)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkLogidDB($userlog_id)) {
            $doctor_data = $this->fetchFeeData($appo_id);
            $patient_data = $this->fetchLoggedUserData($userlog_id);
            if (!empty($doctor_data)) {
                $api = new Api(key_id, key_secret);
                $orderData = [
                    'receipt' => $userlog_id,
                    'amount' => (int)($doctor_data['d_fees'] * 100), // 2000 rupees in paise
                    'currency' => 'INR',
                    'payment_capture' => 1, // auto capture
                ];
                $razorpayOrder = $api->order->create($orderData);
                $razorpayOrderId = $razorpayOrder['id'];
                $amount = $doctor_data['d_fees'];
                $data = [
                    "user_code" => $userlog_id,
                    "key" => key_id,
                    "amount" => $amount,
                    "name" => $patient_data['u_name'],
                    "appo_id" => $appo_id,
                    "description" => "Please Choose payment option",
                    "image" => 'https://s29.postimg.org/r6dj1g85z/daft_punk.jpg',
                    "prefill" => [
                        "name" => $patient_data['u_name'],
                        "email" => $patient_data['email'],
                        "contact" => 1234567890,
                    ],
                    "notes" => [
                        "user_id" => $patient_data,
                        'appoinment' => $appo_id
                    ],
                    "theme" => [
                        "color" => "#F37254",
                    ],
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    "display_amount" => $amount / 100
                ];
                // for session store
                $sessdata = [
                    'date' => date("Y-m-d h:i:sa"),
                    "user_id" => $userlog_id,
                    "appo_id" => $appo_id,
                    "final_amount" => $amount / 100,
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    'order_mode' => 1,
                    "user_note" => "Payment"
                ];

                $sessObj = new SessionManageCls();
                $sessObj->setRazorPayOrderId($sessdata);
                $return_data = ['status' => 1, 'data' => $data];
            }
            // if ($this->changeStatusDB1($appo_id, $userlog_id)) {
            //     $return_data = ['status' => 1, 'msg' => 'Successfully paid the fee'];
            // } else {
            //     $return_data = ['status' => 0, 'msg' => 'Failed to Pay the fee. Db error', 'code' => 1];
            // }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function changeStatus($doc_log_id)
    {
        if (is_numeric($doc_log_id) && $this->checkLogidDB($doc_log_id)) {
            $data = $this->getTImesheduleDataDB($doc_log_id);
            if (!empty($data)) {
                $return_data = ['status' => 1, 'data' => $data];
            } else {
                $return_data = ['status' => 0, 'msg' => 'No data Found', 'code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function payPackageFnc($package_id, $userlog_id, $visitDate)
    {
        if (is_numeric($package_id) && is_numeric($userlog_id) && $this->checkLogidDB($userlog_id)) {
            $treatment_data = $this->fetchFeeData1($package_id);
            $patient_data = $this->fetchLoggedUserData($userlog_id);
            if (!empty($treatment_data)) {
                $api = new Api(key_id, key_secret);
                $orderData = [
                    'receipt' => $userlog_id,
                    'amount' => (int)($treatment_data['p_amount'] * 100), // 2000 rupees in paise
                    'currency' => 'INR',
                    'payment_capture' => 1, // auto capture
                ];
                $razorpayOrder = $api->order->create($orderData);
                $razorpayOrderId = $razorpayOrder['id'];
                $amount = $treatment_data['p_amount'];
                $data = [
                    "user_code" => $userlog_id,
                    "key" => key_id,
                    "amount" => $amount,
                    "name" => $patient_data['u_name'],
                    "package_id" => $package_id,
                    "description" => "Please Choose payment option",
                    "image" => 'https://s29.postimg.org/r6dj1g85z/daft_punk.jpg',
                    "prefill" => [
                        "name" => $patient_data['u_name'],
                        "email" => $patient_data['email'],
                        "contact" => 1234567890,
                    ],
                    "notes" => [
                        "user_id" => $patient_data,
                        'appoinment' => $package_id
                    ],
                    "theme" => [
                        "color" => "#F37254",
                    ],
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    "display_amount" => $amount / 100
                ];
                // for session store
                $sessdata = [
                    'date' => date("Y-m-d h:i:sa"),
                    'visitDate' => $visitDate,
                    "user_id" => $userlog_id,
                    "package_id" => $package_id,
                    "final_amount" => $amount / 100,
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    'order_mode' => 1,
                    "user_note" => "Payment"
                ];

                $sessObj = new SessionManageCls();
                $sessObj->setRazorPayOrderId($sessdata);
                $return_data = ['status' => 1, 'data' => $data];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function payCustomPackageFnc($userlog_id, $user_pack_id)
    {
        if (is_numeric($user_pack_id) && is_numeric($userlog_id) && $this->checkLogidDB($userlog_id)) {
            $main_pack_data = $this->fetchCustomPackageData($userlog_id, $user_pack_id);
            if (!empty($main_pack_data)) {
                $total_amount = $this->fetchCustomPackageTotalAmt($user_pack_id)['total'];
                if ($main_pack_data['type_status'] == 0) {
                    $total_amount = $total_amount - (($total_amount * $main_pack_data['discount']) / 100);
                }
                $patient_data = $this->fetchLoggedUserData($userlog_id);

                $api = new Api(key_id, key_secret);
                $orderData = [
                    'receipt' => $userlog_id,
                    'amount' => (int)($total_amount * 100), // 2000 rupees in paise
                    'currency' => 'INR',
                    'payment_capture' => 1, // auto capture
                ];
                $razorpayOrder = $api->order->create($orderData);
                $razorpayOrderId = $razorpayOrder['id'];
                $amount = $orderData['amount'];
                $data = [
                    "user_code" => $userlog_id,
                    "key" => key_id,
                    "amount" => $amount,
                    "name" => $patient_data['u_name'],
                    "package_id" => $user_pack_id,
                    "description" => "Please Choose payment option",
                    "image" => 'https://s29.postimg.org/r6dj1g85z/daft_punk.jpg',
                    "prefill" => [
                        "name" => $patient_data['u_name'],
                        "email" => $patient_data['email'],
                        "contact" => 1234567890,
                    ],
                    "notes" => [
                        "user_id" => $patient_data,
                        'appoinment' => $user_pack_id
                    ],
                    "theme" => [
                        "color" => "#F37254",
                    ],
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    "display_amount" => $amount / 100
                ];
                // for session store
                $sessdata = [
                    'date' => date("Y-m-d h:i:sa"),
                    "user_id" => $userlog_id,
                    "package_id" => $user_pack_id,
                    "final_amount" => $total_amount,
                    "order_id" => $razorpayOrderId,
                    "display_currency" => "INR",
                    'order_mode' => 1,
                    "user_note" => "Payment"
                ];

                $sessObj = new SessionManageCls();
                $sessObj->setRazorPayOrderId($sessdata);
                $return_data = ['status' => 1, 'data' => $data];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
}
