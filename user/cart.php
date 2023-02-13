<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
$final_total = 0;
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
    <!-- Page Content -->
    <style>
        img {
            position: inherit !important;
            width: 50%;
            height: 50%;
            object-fit: cover;
        }
    </style>
    <div class="overview">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Cart</h2>

            </div>
        </div>
        <div class="row">
            <button id="invokeModalBtn" class="btn btn-primary" type="button" data-toggle="modal" data-target="#purchaseModel">Add Address</button>
            <div class="col-lg-12 mt-2">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>Sl.No</th>
                            <th>product</th>
                            <th></th>
                            <th>qty</th>
                            <th>Prcie/unit</th>
                            <th>total amount</th>
                          
                            <th>date</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "' AND `appoinment_tbl`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        $cart_data = $dbObj->connFnc()->query("SELECT IF(`tbl_cart`.`qty` > 0,`tbl_cart`.`qty` * `tbl_product`.`price`,0) as total_amount,`tbl_cart`.`cart_id`,`tbl_cart`.`date`,`tbl_cart`.`product_id`,`tbl_cart`.`qty`,`tbl_product`.`product_name`,`tbl_product`.`stock`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_cart` INNER JOIN `tbl_product` ON `tbl_cart`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_cart`.`user_log_id` = '" . $user_data['log_id'] . "'")->fetch_all(MYSQLI_ASSOC);

                        if (!empty($cart_data)) {

                            $i = 1;
                            foreach ($cart_data as $value) {
                                $final_total += $value['total_amount'];
                        ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><img src="../images/products/<?= $value['image'] ?>" alt="<?= $value['image'] ?>" /></td>
                                    <td><?= $value['product_name'] ?></td>
                                    <td>
                                        <?= $value['qty'] ?>
                                    </td>
                                    <td>₹<?= $value['price'] ?></td>
                                    <td>₹<?= $value['total_amount'] ?></td>
                                    <td><?= date("Y-m-d", strtotime($value['date'])) ?></td>
                                   
                                    <td><button onclick="removeCartItem(<?= $value['cart_id'] ?>)" class="btn btn-danger">X</button></td>

                                    <td>
                                        <?php
                                        // if ($value['status'] == 0) {
                                        //     echo "Appoinment Booked";
                                        // } else if ($value['status'] == 3 && $value['fee_status'] == 0) {
                                        //     echo "Please Pay to Download prescription";
                                        // } else if ($value['status'] == 3 && $value['fee_status'] == 1) {
                                        //     echo "Download prescription";
                                        // } else if ($value['status'] == 4) {
                                        //     echo "Appoinment Cancelled by user";
                                        // } else if ($value['status'] == 5) {
                                        //     echo "Appoinment Cancelled by doctor";
                                        // }
                                        ?>
                                    </td>

                                </tr>
                            <?php $i++;
                            }
                        } else {
                            ?>
                            <tr class="firstRow">
                                <td>
                                    No cart items yet!!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2">
                                <h3>Total : ₹<?= $final_total ?></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button data-toggle="modal" data-target="#purchaseModel1" class="btn btn-success">Complete Purchase</button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="purchaseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Enter data</h5>
                    <button type="button" id="modalClsBtn" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="disvokePurchaseBtn()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contact Number</label>
                        <input type="number" class="form-control" id="contactNo_inp" placeholder="Enter Contact number">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address</label>
                        <textarea class="form-control" id="address_inp" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pincode</label>
                        <input type="number" class="form-control" id="pincode_inp" placeholder="Enter Pincode">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Country</label>
                        <input type="text" class="form-control" id="country" value="INDIA" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="finalSbtBtn" type="button" onclick="invokeAddAddress()" class="btn btn-primary">Add new address</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="purchaseModel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select billing address</h5>
                    <button type="button" id="modalClsBtn1" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="disvokePurchaseBtn1()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $cart_data = $dbObj->connFnc()->query("SELECT * FROM `tbl_bill_address` WHERE `tbl_bill_address`.`user_log_id` = '" . $user_data['log_id'] . "'")->fetch_all(MYSQLI_ASSOC);

                    if (!empty($cart_data)) {
                        foreach ($cart_data as $value) {
                    ?>
                            <div class="form-check text-center mb-2" style="display: flex;justify-content: space-evenly;align-items: center;padding: 10px 10px;background: cadetblue;">
                                <b> <input class="form-check-input position-static" type="radio" name="address_radio" value="<?= $value['address_id'] ?>">Choose this</b>
                                <address>Contact No: <?= $value['contact_no'] ?><br>Address : <?= $value['address'] ?> <br> pincode: <?= $value['pincode'] ?></address>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No address's found. please add new.";
                    }
                    ?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="finalSbtBtn1" type="button" onclick="invokePayment()" class="btn btn-primary">Proceed to payment</button>
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
    function invokePayment() {
        if (!$("input[name='address_radio']:checked").val()) {
            swal("error", "please select a address to continue", "error");
        } else {
            user_id = <?= $user_data['log_id'] ?>;
            address_id = $("input[name='address_radio']:checked").val();
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    "user_id": user_id,
                    "address_id": address_id,
                    'action': 13,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        $("#modalClsBtn1").trigger('click');
                        swal("Payment Link Generated", "You will be redirected to the payment page. please pay the fee.", 'success');
                        setTimeout(() => {
                            window.location.href = "payment.php?status=4&amount=" + response.data.amount + "&package_id=" + response.data.package_id + "&description=" + response.data.description + "&display_amount=" + response.data.display_amount + "&display_currency=" + response.data.display_currency + "&image=" + response.data.image + "&key=" + response.data.key + "&order_id=" + response.data.order_id + "&contact=" + response.data.prefill.contact + "&email=" + response.data.prefill.email + "&name=" + response.data.prefill.name + "&color=" + response.data.theme.color + "&user_code=" + response.data.user_code;
                        }, 2000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }
    }

    function removeCartItem(cart_id) {
        $.ajax({
            type: "POST",
            url: "../api/user_api.php",
            data: {
                'cart_id': cart_id,
                'action': 11,
            },
            dataType: 'JSON',
            cache: false,
            success: function(response) {
                if (response.status == 1) {
                    swal("success", "product removed from cart", "success");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    swal("error", response.msg, "error");
                }
            }
        });
    }

    function invokeAddAddress() {
        user_id = <?= $user_data['log_id'] ?>;
        contact_number = $("#contactNo_inp").val();
        address = $("#address_inp").val();
        pincode = $("#pincode_inp").val();

        if (!isNaN(contact_number) && contact_number.length == 10) {
            if (address.length > 8) {
                if (!isNaN(pincode) && pincode.length == 6) {
                    $("#finalSbtBtn").attr('disabled', 'disabled');
                    $.ajax({
                        type: "POST",
                        url: "../api/user_api.php",
                        data: {
                            'user_id': user_id,
                            'contact_number': contact_number,
                            'address': address,
                            'pincode': pincode,
                            'action': 12,
                        },
                        dataType: 'JSON',
                        cache: false,
                        success: function(response) {
                            $("#finalSbtBtn").removeAttr('disabled', 'disabled');
                            if (response.status == 1) {
                                $("#modalClsBtn").trigger('click');
                                swal("success", "New address added.", "success");
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            } else {
                                swal("error", response.msg, "error");
                            }
                        }
                    });
                } else {
                    swal("error", "please enter a valid 6 digit pincode", "error");
                }

            } else {
                swal("error", "please enter a valid address. minimum 8 characters", "error");
            }
        } else {
            swal("error", "please enter a valid 10 digit contact number", "error");
        }


    }


    function swal(tittle, text, icon) {
        Swal.fire({
            title: tittle,
            text: text,
            icon: icon,
        });
    }
</script>