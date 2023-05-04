<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
    <!-- <button  id="pdfButton" ><b>Print</b></button> -->

    <div class="text-right">
        <button id="pdfButton" name="btn_pdf" class="btn"><i class="fa fa-download "></i> Download</button>
    </div>


    <!-- Page Content -->
    <div class="overview" id="generatePDF">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Doctor History</h2>
            </div>
        </div>
        <div class="row">
            <?php
            $data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`l_id` as patient_id, `doctor_timing_tbl`.`l_id` as doctor_id FROM `appoinment_tbl` INNER JOIN  `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` WHERE `appoinment_tbl`.`appo_id` = '" . $_GET['appo_id'] . "';")->fetch_assoc();
            $doctor_data = $dbObj->connFnc()->query("SELECT * FROM `tbl_doctor` WHERE `tbl_doctor`.`l_id` = '" . $data['doctor_id'] . "';")->fetch_assoc();
            $count = $history = $dbObj->connFnc()->query("SELECT count(*) as tot_count from `appoinment_tbl` WHERE `appoinment_tbl`.`time_id` IN (select `doctor_timing_tbl`.`time_id` FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '" . $data['doctor_id'] . "') AND `appoinment_tbl`.`l_id` = '" . $data['patient_id'] . "';")->fetch_assoc()['tot_count'];
            ?>

            <div class="col-lg-12">
                <h6>Doctor Name : Dr.<?= $doctor_data['d_name'] ?></h6>
                <h6>Specialized in : <?= $doctor_data['spec'] ?></h6>
                <h6>Address : <?= $doctor_data['d_address'] ?></h6>
                <h6>Total Appointments : <?= $count ?></h6>
                <h6> Dr Fees : <?= $doctor_data['d_fees'] ?>

                    <table id="exampl" class="table cell-border mt-2" style="width:100%">
                        <thead class="TableHead">
                            <tr>
                                <th>Sl.No</th>
                                <th>date</th>
                                <th>Appointment Timing</th>
                                <th>Fee status</th>
                                <th>symptom</th>
                                <th>Status</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (!empty($data)) {
                                $history = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`fee_status`,`appoinment_tbl`.`prescription`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` from `appoinment_tbl` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` WHERE `appoinment_tbl`.`time_id` IN (select `doctor_timing_tbl`.`time_id` FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '" . $data['doctor_id'] . "') AND `appoinment_tbl`.`l_id` = '" . $data['patient_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                            }
                            if (!empty($history)) {

                                $i = 1;
                                foreach ($history as $value) { ?>
                                    <tr class="firstRow">
                                        <td><?= $i ?></td>
                                        <td><?= date("d-m-Y", strtotime($value['date'])) ?></td>
                                        <td><?= $value['start'] . "-" . $value['end'] ?></td>
                                        <td>
                                            <?= $value['fee_status'] == 1 ? 'Fee Paid' : 'Not Paid' ?>
                                        </td>
                                        <td><?= $value['symptom'] ?></td>
                                        <td>
                                            <?php
                                            if ($value['status'] == 0) {
                                                echo "Appointment Booked";
                                            } else if ($value['status'] == 3 && $value['fee_status'] == 0) {
                                                echo "Please Pay to Download prescription";
                                            } else if ($value['status'] == 3 && $value['fee_status'] == 1) {
                                                echo "Download prescription";
                                            } else if ($value['status'] == 4) {
                                                echo "Appointment Cancelled by user";
                                            } else if ($value['status'] == 5) {
                                                echo "Appointment Cancelled by doctor";
                                            }
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                            if ($value['status'] == 0) { ?>
                                                <!-- <button onclick="deleteappo(<//?= $value['appo_id'] ?>)" class="btn btn-sm btn-danger">X</button> -->
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
                                        No Appointments yet!!!</td>

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
    button.addEventListener("click", function() {
        var mywindow = window.open("", "PRINT", "height=600,width=600");
        mywindow.document.write(makepdf.innerHTML);
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
        return true;
    });
</script>