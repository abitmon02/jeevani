<link rel="stylesheet" href="user.css">
<link rel="stylesheet" href="../dist/sweetalert.css">
<?php
require '../vendor/autoload.php';
require '../db/config.php';
require '../db/session.contr.cls.php';

define('key_id', 'rzp_test_D41v2YKNMela73');
define('key_secret', '1rQWy8jpOREORWActw8qs4Lt');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    $success = true;
    $error = "Payment Failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
        $api = new Api(key_id, key_secret);

        try {
            // Please note that the razorpay order ID must
            // come from a trusted source (session here, but
            // could be database or something else)
            $attributes = array(
                'razorpay_order_id' => $_POST['razorpay_order_id'],
                'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                'razorpay_signature' => $_POST['razorpay_signature'],
            );

            $api->utility->verifyPaymentSignature($attributes);
        } catch (SignatureVerificationError $e) {
            $success = false;
            $error = 'Razorpay Error : ' . $e->getMessage();
        }
    }

    if ($success === true) {
        $razorpay_order_id = $_POST['razorpay_order_id'];
        $razorpay_payment_id = $_POST['razorpay_payment_id'];
        $html = "<p>Your payment was successful.you will be redirected to appoinment page</p>
                    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
        $orderData = $sessObj->getRazorPayOrderData();
        if (!empty($orderData)) {
            if (isset($_POST['status']) && $_POST['status'] == 1) {
                if ($dbObj->connFnc()->query("INSERT INTO `payment_tbl`( `r_pay_id`, `r_order_id`, `appo_id`,`treament_id`, `date`) VALUES ('$razorpay_payment_id','$razorpay_order_id','" . $orderData['appo_id'] . "',0,'" . $orderData['date'] . "')")) {
                    if ($dbObj->connFnc()->query("UPDATE `appoinment_tbl` SET `fee_status`= 1 WHERE `appoinment_tbl`.`appo_id` = '" . $orderData['appo_id'] . "'")) {
                        echo $html;
                        header("refresh:5;url=appoinmenthistory.php");
                    } else {
                        $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                    }
                } else {
                    $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                }
            } else  if (isset($_POST['status']) && $_POST['status'] == 2) {
                $dbObj = $dbObj->connFnc();
                if ($dbObj->query("INSERT INTO `tbl_c_packages`(`p_id`, `l_id`,`visit_date`, `status`) VALUES ('" . $orderData['package_id'] . "','" . $orderData['user_id'] . "','" . $orderData['visitDate'] . "',1)")) {
                    $treatment_book_id = $dbObj->insert_id;
                    if ($dbObj->query("INSERT INTO `payment_tbl`( `r_pay_id`, `r_order_id`, `appo_id`,`treament_id`, `date`) VALUES ('$razorpay_payment_id','$razorpay_order_id',0,'$treatment_book_id','" . $orderData['date'] . "')")) {
                        echo $html;
                        header("refresh:5;url=appoinmenthistory.php");
                    } else {
                        $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                    }
                } else {
                    $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                }
            } else  if (isset($_POST['status']) && $_POST['status'] == 3) {
                $dbObj = $dbObj->connFnc();
                if ($dbObj->query("UPDATE `tbl_custom_package` SET `fee_status`='1' WHERE `tbl_custom_package`.`id` = '" . $orderData['package_id'] . "' AND `tbl_custom_package`.`user_log_id` = '" . $orderData['user_id'] . "'")) {
                    if ($dbObj->query("INSERT INTO `payment1_tbl`( `r_pay_id`, `r_order_id`, `custom_package_id`, `date`,`amount`) VALUES ('$razorpay_payment_id','$razorpay_order_id','" . $orderData['package_id'] . "','" . $orderData['date'] . "','" . $orderData['final_amount'] . "')")) {
                        echo $html;
                        header("refresh:5;url=treatmenthistory.php");
                    } else {
                        $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                    }
                } else {
                    $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                }
            } else  if (isset($_POST['status']) && $_POST['status'] == 4 && $orderData['order_mode'] == 4) {
                $dbObj = $dbObj->connFnc();
                $cart_data = $dbObj->query("SELECT * FROM `tbl_cart` WHERE `tbl_cart`.`user_log_id` = '" . $orderData['user_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                if (!empty($cart_data)) {
                    if ($dbObj->query("INSERT INTO `tbl_p_purchase`(`log_id`,`bill_id`,`r_pay_id`, `r_order_id`, `total_amount`, `date`,`status`) VALUES ('" . $orderData['user_id'] . "','" . $orderData['address_id'] . "','$razorpay_payment_id','$razorpay_order_id','" . $orderData['final_amount'] . "','" . $orderData['date'] . "',0)")) {
                        $insert_id = $dbObj->insert_id;
                        foreach ($cart_data as $item) {
                            $dbObj->query("INSERT INTO `tbl_p1_purchase`( `pay_id`, `qty`, `product_id`) VALUES ('$insert_id','" . $item['qty'] . "','" . $item['product_id'] . "')");
                            $total_stock = $dbObj->query("SELECT  `stock` FROM `tbl_product` WHERE `tbl_product`.`product_id` = '" . $item['product_id'] . "';")->fetch_assoc();
                            $stock = $total_stock['stock'] - $item['qty'];
                            $dbObj->query("UPDATE `tbl_product` SET `stock`='" . $stock . "' WHERE `tbl_product`.`product_id` = '" . $item['product_id'] . "';");
                        }
                        if ($dbObj->query("DELETE FROM `tbl_cart` WHERE `tbl_cart`.`user_log_id` = '" . $orderData['user_id'] . "';")) {
                            echo $html;
                            header("refresh:5;url=orderHistory.php");
                        } else {
                            $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                            <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                        }
                    } else {
                        $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                        <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                    }
                } else {
                    $html = "<p>Your payment was successful.But something wrong happen from our side.</p>
                    <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                }
            }
        }
    } else {
        $html = "<p>Your payment was Failed.Please retry</p>";
        echo $html;
    }
} else {
    header("Location:../user-login.php");
}
?>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../dist/sweetalert.js"></script>
