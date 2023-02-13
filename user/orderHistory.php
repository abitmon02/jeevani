<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
    <style>
        img {
            position: inherit !important;
            object-fit: contain !important;
        }
    </style>
    <!-- Page Content -->
    <div class="overview">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Order History</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Price/Unit</th>
                            <th>QTY</th>
                            <th>Purchase Amount</th>
                            <th>Bill Address</th>
                            <th>Purchase date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "' AND `appoinment_tbl`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        $result = $dbObj->connFnc()->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id` INNER JOIN `tbl_p1_purchase` ON `tbl_p_purchase`.`pay_id` = `tbl_p1_purchase`.`pay_id` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_p_purchase`.`log_id` = '" . $user_data['log_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($result)) {
                            $i = 1;
                            foreach ($result as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $value['r_pay_id'] ?></td>
                                    <td style="display: flex;justify-content: center;flex-direction: column;"><img src="../images/products/<?= $value['image'] ?>" alt="" srcset=""><b><?= $value['product_name'] ?></b></td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td><?= $value['total_amount'] ?></td>
                                    <td>
                                        <address><?= $value['address'] . ", " . $value['pincode'] . " - " . $value['contact_no'] ?></address>
                                    </td>
                                    <td><?= date("Y-m-d", strtotime($value['date'])) ?></td>
                                    <td><?php if ($value['status'] == 0) { ?>
                                            <span class="badge badge-info">ORDER RECIVED</span>
                                        <?php } else if ($value['status'] == 1) { ?>
                                            <span class="badge badge-success">ORDER SHIPPED</span>
                                        <?php } else if ($value['status'] == 4) { ?>
                                            <span class="badge badge-warning">ORDER CANCELLED BY YOU</span>
                                        <?php } else if ($value['status'] == 5) { ?>
                                            <span class="badge badge-danger">ORDER CANCELLED BY ADMIN</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="viewOrderDetails.php?pay_id=<?= $value['pay_id'] ?>" class="btn btn-large btn-info">VIEW</a>
                                        <?php if ($value['status'] == 0) { ?>
                                            <button onclick="cancelPurchase(<?= $value['pay_id'] ?>)" class="btn btn-large btn-danger">X</button>
                                        <?php } ?>
                                    </td>

                                </tr>
                            <?php $i++;
                            }
                        } else {
                            ?>
                            <tr class="firstRow">
                                <td>
                                    No treatment bookings yet!!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write prescription details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">

                        <textarea name="inpPres" class="form-control" placeholder="Enter details" id="inpPres" cols="30" rows="10"></textarea>
                        <input type="hidden" id="modalAppID">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="updateAppo()" class="btn btn-primary">update</button>
                </div>
            </div>
        </div>
    </div>

<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>
<script type="text/javascript">
    function cancelPurchase(pay_id) {
        if (pay_id != null) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {

                    "pay_id": pay_id,
                    'action': 14,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("success", response.msg, 'success');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }
    }



    function swal(msg1, msg2, msg3) {
        alert(msg2);
    }
</script>