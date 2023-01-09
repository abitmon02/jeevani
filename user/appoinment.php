<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
    <!-- Page Content -->
    <div class="overview">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Book appoinment</h2>
                <div class="row form-group mt-3">
                    <div class="form-group col-md-3 space-between">
                        <select name="doctor" class="form-control" id="doctor" onchange="fetchDoctorTime($(this).val())">
                            <option value="0">Please Select a doctor</option>
                            <?php
                            $docotr_data = $dbObj->connFnc()->query("SELECT `tbl_login`.`l_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec` FROM `tbl_login` INNER JOIN `tbl_doctor` ON `tbl_login`.`l_id` = `tbl_doctor`.`l_id` WHERE `tbl_login`.`a_id` = 2;")->fetch_all(MYSQLI_ASSOC);
                            if (!empty($docotr_data)) {
                                foreach ($docotr_data as $value) {
                            ?>
                                    <option value="<?= $value['l_id'] ?>"><?= 'Dr.' . $value['d_name'] . "," . $value['spec'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 space-between">
                        <select name="timing" class="form-control" id="timing">
                            <option value="0">Please Select a timing</option>
                        </select>
                    </div>

                    <div class="form-group row d-flex space-between ml-2" style="flex-direction: row;justify-content: space-evenly;align-items: baseline;">
                        <label for="exampleInputEmail1" class="form-label text-dark">Choose Date:</label>
                        <input class="text-dark" class="form-control" style="margin-left: 5px;" type="date" name="date" id="date" min="<?php echo date("Y-m-d"); ?>">
                        <input type="hidden" class="form-control" id='user_id' value="<?= $user_data['log_id'] ?>">
                    </div>

                </div>

                <div class="form-group col-md-4 space-between mb-3">
                    <button class="btn btn-md btn-success" id="addTimingBtn">SUBMIT</button>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>Sl.No</th>
                            <th>doctor</th>
                            <th>Fee</th>
                            <th>Fee status</th>
                            <th>symptom</th>
                            <th>date</th>
                            <th>Appoinment Timing</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($timing_data)) {
                            $i = 1;
                            foreach ($timing_data as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><?= 'Dr.' . $value['d_name'] . ',' . $value['spec'] ?></td>
                                    <td><?= $value['d_fees'] ?></td>
                                    <td>
                                        <?= $value['fee_status'] == 1 ? 'Fee Paid' : 'Not Paid' ?>
                                    </td>
                                    <td><?= $value['symptom'] ?></td>
                                    <td><?= date("Y-m-d", strtotime($value['date'])) ?></td>
                                    <td><?= $value['start'] . "-" . $value['end'] ?></td>

                                    <td>
                                        <?php
                                        if ($value['status'] == 0) {
                                            echo "Appoinment Booked";
                                        } else if ($value['status'] == 3 && $value['fee_status'] == 0) {
                                            echo "Please Pay to Download prescription";
                                        } else if ($value['status'] == 3 && $value['fee_status'] == 1) {
                                            echo "Download prescription";
                                        } else if ($value['status'] == 4) {
                                            echo "Appoinment Cancelled by user";
                                        } else if ($value['status'] == 5) {
                                            echo "Appoinment Cancelled by doctor";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 0) { ?>
                                        <button onclick="deleteappo(<?= $value['appo_id'] ?>)" class="btn btn-sm btn-danger">X</button>
                                            <!-- <button onclick="payappo(<//?= $value['appo_id'] ?>)" class="btn btn-sm btn-success">Pay</button> -->
                                        <?php }
                                        ?>
                                       
                                        <?php
                                        if ($value['status'] == 3 && $value['fee_status'] == 0) { ?>
                                            <button onclick="payappo(<?= $value['appo_id'] ?>)" class="btn btn-sm btn-success">Pay</button>
                                        <?php }
                                        ?>
                                        <?php
                                        if ($value['status'] == 3 && $value['fee_status'] == 1) { ?>
                                            <a href="prescribe.php?appo_id=<?= $value['appo_id'] ?>" class="btn btn-sm btn-success">Download Prescribe</a>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                            <?php $i++;
                            }
                        } else {
                            ?>
                            <tr class="firstRow">
                                <td>
                                    No Appointments yet !!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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
     
        if (doclog_id == 0) {
            swal("error", "Please select a doctor", 'error');
        } else if (time_id == 0) {
            swal("error", "Please select time slot ", 'error');
        } else if (date == null || date == '') {
            swal("error", "Please select date ", 'error');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    'time_id': time_id,
                    "userlog_id": userlog_id,
                    'date': date,
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