<?php
require_once '../vendor/autoload.php';
define('key_id', 'rzp_test_D41v2YKNMela73');
define('key_secret', '1rQWy8jpOREORWActw8qs4Lt');
// require '../db/session.contr.cls.php';
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class UserCls extends UserModalcls
{
    public function insertUserDoctorFeedback($appo_id, $response, $rating, $user_log_id)
    {
        if (!empty($appo_id) && $this->checkAppoIdDB($appo_id) && !empty($user_log_id)) {
            if ($this->checkFeedbackExistDB($appo_id, $user_log_id)) {
                if ($this->insertUserDoctorFeedbackDB($appo_id, $response, $rating, $user_log_id)) {
                    $return_data = ['status' => 1, 'msg' => "Feedback submitted successfully", 'error_code' => 1];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to submit your feedback. plese retry', 'code' => 0];
                }
            } else {
                if ($this->updateUserDoctorFeedbackDB($appo_id, $response, $rating, $user_log_id)) {
                    $return_data = ['status' => 1, 'msg' => "Feedback already submitted, feedback updated successfully", 'error_code' => 1];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to submit your feedback. plese retry', 'code' => 0];
                }
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'No records found', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function updateUserProfile($data)
    {
        if (!empty($data['user_id'] && is_numeric($data['user_id']))) {
            if ($this->updateUserProfileDB($data)) {
                $return_data = ['status' => 1, 'msg' => "Sucess: Profile updated successfully", 'code' => 001];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Error : Failed to update profile, something happen', 'code' => 000];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Error : unauthorized request', 'code' => 000];
        }
        echo json_encode($return_data);
    }
    public function searchProducts(string $keyword)
    {
        if (strlen($keyword) > 0) {
            $data = $this->searchProductsDb($keyword);
            if (!empty($data)) {
                $return_data = ['status' => 1, 'data' => $data, 'code' => 001];
            } else {
                $return_data = ['status' => 0, 'msg' => 'No products found', 'code' => 000];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'No products found', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function cancelUserPurchase($pay_id)
    {
        if (is_numeric($pay_id) && $pay_id != NULL) {
            if ($this->cancelUserPurchaseDB($pay_id)) {
                $return_data = ['status' => 1, 'msg' => "Success Purchase cancelled"];
            } else {
                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.3];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value manipulation found", 'error_code' => 2.4];
        }
        echo json_encode($return_data);
    }
    public function addNewUserAddress($user_id, $contact_number, $address, $pincode)
    {
        if (is_numeric($user_id)) {
            if ($this->addNewUserAddressDB($user_id, $contact_number, $address, $pincode)) {
                $return_data = ['status' => 1, 'msg' => "New address added."];
            } else {
                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value manipulation found", 'error_code' => 1];
        }
        echo json_encode($return_data);
    }
    public function removeFromCart($cart_id)
    {
        if (is_numeric($cart_id)) {
            if ($this->removeFromCartDB($cart_id)) {
                $return_data = ['status' => 1, 'msg' => "Product removed from cart"];
            } else {
                $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value manipulation found", 'error_code' => 1];
        }
        echo json_encode($return_data);
    }
    public function addToCart($userlog_id, $productId, $qty)
    {
        if (is_numeric($userlog_id) && is_numeric($productId) && is_numeric($qty) && $qty > 0 && $qty <= 9) {
            if ($this->checkProductExitDB($userlog_id, $productId)) {
                $stockResult = $this->getStockData($productId);
                if ($stockResult['stock'] < $qty) {
                    $return_data = ['status' => 0, 'msg' => "Entered quantiy not able to process. Out of stock!", 'error_code' => 1];
                } else {
                    if ($this->addToCartDB($userlog_id, $productId, $qty)) {
                        $return_data = ['status' => 1, 'msg' => "Product added to cart"];
                    } else {
                        $return_data = ['status' => 0, 'msg' => "Something happen from our end. please contact admin.", 'error_code' => 2.1];
                    }
                }
            } else {
                $return_data = ['status' => 0, 'msg' => "Product already exist in cart.", 'error_code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value manipulation found", 'error_code' => 1];
        }
        echo json_encode($return_data);
    }
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
        if ($this->checkLogidDB($user_log_id) && $this->checkTimeidDB($time_id) && is_numeric($time_id) && is_numeric($user_log_id)) {
            // $token =   'Token-' . bin2hex(random_bytes(5));
            date_default_timezone_set("Asia/Kolkata");
            $token1 =   'Token-' . bin2hex(random_bytes(5));
            $token = hexdec(substr($token1, -2));
            #1. check user appoinment exist or not for the doctor
            if ($this->checkAppoinmentExistcurrentDB($date, $time_id, $user_log_id)) {
                #2. check the selected doctor leave on the particular date.
                if ($this->checkDoctorLeaveStatus($time_id, $date)) {
                    #3. check the doctor visitor count
                    if ($this->checkDoctorSlotCount($time_id, $date)) {
                        $appo_end_time = $this->getAppoDataDB($time_id);
                        $time=explode(':',$appo_end_time);
                        $appo_end_time=$time[0].":".$time[1];
                        if (findDifferenceOfTwoDates($date, date('Y-m-d')) == 0 && compareTimeStrings(date('H:i'), $appo_end_time) != -1) {
                            // Returns -1 if $time1 is less than $time2, 1 if $time1 is greater than $time2, and 0 if they are equal
                            $return_data = ['status' => 0, 'msg' => 'Sorry! selected visiting time over for today\'s date'];
                        } else {
                            if ($this->insertAppoinment($date, $time_id, $user_log_id, $token)) {
                                $return_data = ['status' => 1, 'msg' => "Your appoinment successfull."];
                            } else {
                                $return_data = ['status' => 0, 'msg' => "Failed to create appoinment", 'error_code' => 3];
                            }
                        }
                    } else {
                        $return_data = ['status' => 0, 'msg' => "Selected time slot filled for selected date. appoinment failed", 'error_code' => 2];
                    }
                } else {
                    $return_data = ['status' => 0, 'msg' => "Selected doctor is on leave for the date.", 'error_code' => 2.2];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => "Appoinment Exist on same date for the doctor!", 'error_code' => 2.1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied. Something happen from our side. please retry', 'code' => 0];
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
    public function payProductFnc($user_id, $address_id)
    {
        if (is_numeric($address_id) && is_numeric($user_id) && $this->checkLogidDB($user_id)) {
            $flag = 1;
            $temp_error = "";
            $stockData = $this->checkStock($user_id);
            if (!empty($stockData)) {
                foreach ($stockData as $item) {
                    if ($item['qty'] > $item['stock'] || $item['stock'] <= 0) {
                        $flag = 0;
                        $temp_error = "Out of stock. Cant proccess Entered quantiy. Product Name :" . $item['product_name'];
                    }
                }
                if ($flag != 0) {
                    $total_amount = $this->FetchCartTotal($user_id);
                    $bill_address = $this->fetchBillAddress($address_id);
                    if (!empty($total_amount) && $total_amount['total_amount'] > 0 && !empty($bill_address)) {
                        $total_amount = $total_amount['total_amount'];

                        $api = new Api(key_id, key_secret);
                        $orderData = [
                            'receipt' => $user_id,
                            'amount' => (int)($total_amount * 100), // 2000 rupees in paise
                            'currency' => 'INR',
                            'payment_capture' => 1, // auto capture
                        ];
                        $razorpayOrder = $api->order->create($orderData);
                        $razorpayOrderId = $razorpayOrder['id'];
                        $amount = $orderData['amount'];
                        $data = [
                            "user_code" => $user_id,
                            "key" => key_id,
                            "amount" => $amount,
                            "name" => $bill_address['u_name'],
                            "package_id" => $address_id,
                            "description" => "Please Choose payment option",
                            "image" => 'https://s29.postimg.org/r6dj1g85z/daft_punk.jpg',
                            "prefill" => [
                                "name" => $bill_address['u_name'],
                                "email" => $bill_address['email'],
                                "contact" => 1234567890,
                            ],
                            "notes" => [
                                "user_id" => $bill_address,
                                'appoinment' => $address_id
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
                            "user_id" => $user_id,
                            "address_id" => $address_id,
                            "final_amount" => $total_amount,
                            "order_id" => $razorpayOrderId,
                            "display_currency" => "INR",
                            'order_mode' => 4,
                            "user_note" => "Payment"
                        ];

                        $sessObj = new SessionManageCls();
                        $sessObj->setRazorPayOrderId($sessdata);
                        $return_data = ['status' => 1, 'data' => $data];
                    } else {
                        $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 1];
                    }
                } else {
                    $return_data = ['status' => 0, 'msg' => $temp_error, 'code' => 0];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Cart is Empty', 'code' => 0];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
}

function findDifferenceOfTwoDates($date1, $date2)
{
    // Check if the dates are valid
    if (!is_string($date1) || !is_string($date2)) {
        error_log('Invalid date format. Dates must be strings.');
        return false;
    }

    // Convert the dates to timestamps
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);

    // Calculate the difference in seconds
    $difference = abs($date1 - $date2);

    // Convert the difference to days
    $differenceInDays = floor($difference / (60 * 60 * 24));

    return $differenceInDays;
}
/**
 * Compares two time strings
 *
 * @param string $time1 The first time string
 * @param string $time2 The second time string
 *
 * @return int Returns -1 if $time1 is less than $time2, 1 if $time1 is greater than $time2, and 0 if they are equal
 *
 * @throws \InvalidArgumentException if either of the time strings is not a valid time string
 */
function compareTimeStrings($time1, $time2)
{
    if (!preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $time1) || !preg_match('/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/', $time2)) {
        throw new \InvalidArgumentException('Time strings must be in the format HH:MM');
    }

    $time1Parts = explode(':', $time1);
    $time2Parts = explode(':', $time2);

    if ($time1Parts[0] < $time2Parts[0]) {
        return -1;
    } elseif ($time1Parts[0] > $time2Parts[0]) {
        return 1;
    } elseif ($time1Parts[1] < $time2Parts[1]) {
        return -1;
    } elseif ($time1Parts[1] > $time2Parts[1]) {
        return 1;
    } else {
        return 0;
    }
}
