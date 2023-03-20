<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
 <div class="text-right">
                                    <button id="pdfButton" name="btn_pdf"class="btn"><i class="fa fa-download "></i> Download</button>
                                </div>

    <!-- Page Content -->
    <div class="overview"id="generatePDF">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Treatment book History</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>Sl.No</th>
                            <th>Package type</th>
                            <th>Discount status</th>
                            <th>Hospital visit</th>
                            <th>No of days staying</th>
                            <th>Purchase date</th>
                            <th>payment id</th>
                            <th>Fee Paid</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "' AND `appoinment_tbl`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        $result = $dbObj->connFnc()->query("SELECT `tbl_custom_package`.`fee_status`,`tbl_custom_package`.`id`,`tbl_custom_package`.`user_log_id`,`tbl_custom_package`.`type_status`,`tbl_custom_package`.`create_date`,`tbl_custom_package`.`num_days`,`tbl_custom_package`.`appo_date`,`tbl_custom_package`.`admin_custom_p_id`,`admin_custom_pack_main_tbl`.`days`,`admin_custom_pack_main_tbl`.`discount`,`payment1_tbl`.`r_pay_id`,`payment1_tbl`.`r_order_id`,`payment1_tbl`.`date` as paid_date,`payment1_tbl`.`amount` FROM `tbl_custom_package` LEFT JOIN `admin_custom_pack_main_tbl` ON `tbl_custom_package`.`admin_custom_p_id` = `admin_custom_pack_main_tbl`.`id` LEFT JOIN `payment1_tbl` on `payment1_tbl`.`custom_package_id` = `tbl_custom_package`.`id` WHERE `tbl_custom_package`.`user_log_id` = '" . $user_data['log_id'] . "' AND `tbl_custom_package`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($result)) {
                            $i = 1;
                            foreach ($result as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><?php if ($value['type_status'] == 0) { ?>
                                            <span class="badge badge-success">User customized</span>

                                        <?php } else { ?>
                                            <span class="badge badge-primary">User Created</span>

                                        <?php } ?>
                                    </td>
                                    <td><?php if ($value['type_status'] == 0) { ?>

                                            <span class="badge badge-info"> discount applied <?= $value['discount'] . '%' ?></span>
                                        <?php } else { ?>

                                            <span class="badge badge-danger">No discounts applied</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= date("d-m-Y", strtotime($value['appo_date'])) ?></td>
                                    <td><?= $value['num_days'] ?></td>
                                    <td><?= date("d-m-Y", strtotime($value['paid_date'])) ?></td>
                                    <td><?= $value['r_pay_id'] ?> </td>
                                    <td><?= $value['amount'] ?></td>
                                    <td><span class="label text-light bg-success" style="padding: 10px 10px;border-radius: 10px">Paid</span></td>
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
    $("#addTimingBtn").click(() => {
        doclog_id = $("#doctor").val();
        time_id = $("#timing").val();
        userlog_id = $("#user_id").val();
        date = $("#date").val();
        symptom = $("#symptomInp").val();
        if (doclog_id == 0) {
            swal("error", "Please select a doctor", 'error');
        } else if (time_id == 0) {
            swal("error", "Please select time slot ", 'error');
        } else if (date == null || date == '') {
            swal("error", "Please select date ", 'error');
        } else if (symptom.length < 1 || symptom.length > 250) {
            swal("error", "Please Enter Valid symptom", 'error');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    'time_id': time_id,
                    "userlog_id": userlog_id,
                    'date': date,
                    'symptom': symptom,
                    'action': 3,
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
    })

    function deleteappo(appo_id) {
        userlog_id = $("#user_id").val();
        $.ajax({
            type: "POST",
            url: "../api/user_api.php",
            data: {
                "userlog_id": userlog_id,
                "appo_id": appo_id,
                'action': 2,
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

    function payappo(appo_id) {
        userlog_id = $("#user_id").val();
        $.ajax({
            type: "POST",
            url: "../api/user_api.php",
            data: {
                "userlog_id": userlog_id,
                "appo_id": appo_id,
                'action': 4,
            },
            dataType: 'JSON',
            cache: false,
            success: function(response) {
                if (response.status == 1) {
                    swal("Payment Link Generated", "You will be redirected to the payment page. please pay the fee.", 'success');
                    setTimeout(() => {
                        window.location.href = "payment.php?status=1&amount=" + response.data.amount + "&appo_id=" + response.data.appo_id + "&description=" + response.data.description + "&display_amount=" + response.data.display_amount + "&display_currency=" + response.data.display_currency + "&image=" + response.data.image + "&key=" + response.data.key + "&order_id=" + response.data.order_id + "&contact=" + response.data.prefill.contact + "&email=" + response.data.prefill.email + "&name=" + response.data.prefill.name + "&color=" + response.data.theme.color + "&user_code=" + response.data.user_code;
                    }, 2000);
                } else {
                    swal("error", response.msg, 'error');
                }
            }
        });
    }

    function fetchDoctorTime(doc_log_id) {
        $.ajax({
            type: "POST",
            url: "../api/user_api.php",
            data: {
                'doc_log_id': doc_log_id,
                'action': 1,
            },
            dataType: 'JSON',
            cache: false,
            success: function(response) {
                if (response.status == 1) {
                    $("#timing").empty();
                    response.data.forEach(element => {
                        $("#timing").append($("<option />").val(element.time_id).text(element.start + ' - ' + element.end))
                    });
                } else {
                    $("#timing").empty();
                    $("#timing").append($("<option />").val('error').text(response.msg))
                    swal({
                        title: "Error",
                        text: response.msg,
                        icon: "error",
                    });
                }
            }
        });
    }

    function swal(msg1, msg2, msg3) {
        alert(msg2);
    }
</script>
<script>
      var button = document.getElementById("pdfButton");
      var makepdf = document.getElementById("generatePDF");
      button.addEventListener("click", function () {
         var mywindow = window.open("", "PRINT", "height=600,width=600");
         mywindow.document.write(makepdf.innerHTML);
         mywindow.document.close();
         mywindow.focus();
         mywindow.print();
         return true;
      });
   </script>