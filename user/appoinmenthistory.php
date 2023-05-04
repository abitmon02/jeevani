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
                <h2 style="color: #9f8e64;margin-top: 10px;">Appointment History</h2>

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
                            <th>Appointment Timing</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "' AND `appoinment_tbl`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` WHERE `appoinment_tbl`.`l_id` = '" . $user_data['log_id'] . "'")->fetch_all(MYSQLI_ASSOC);
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
                                    <td><?= date("d-m-Y", strtotime($value['date'])) ?></td>
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
                                        ?><br>
                                        <a href="doctor_history.php?appo_id=<?= $value['appo_id'] ?>">Doctor History</a>
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
                                            <!-- <button onclick="payappo(<//?= $value['appo_id'] ?>)" class="btn btn-sm btn-success">Pay</button> -->
                                        <?php }
                                        ?>
                                        <?php
                                        if ($value['status'] == 3 && $value['fee_status'] == 1) { ?>
                                            <a href="prescribe.php?appo_id=<?= $value['appo_id'] ?>" class="btn btn-sm btn-success">Download Prescribe</a>
                                        <?php }
                                        if ($value['status'] == 3) {
                                        ?> <button onclick="invokeFeedback(<?= $value['appo_id'] ?>)" class="btn btn-sm btn-warning">Feedback</button><?php
                                                                                                                                                    }
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
    <button id="openModalBtn" type="button" style="display: none;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <style>
        /* #full-stars-example-two { */

        /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
        .rating-group {
            display: inline-flex;
        }

        /* make hover effect work properly in IE */
        .rating__icon {
            pointer-events: none;
        }

        /* hide radio inputs */
        .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        /* hide 'none' input from screenreaders */
        .rating__input--none {
            display: none
        }

        /* set icon padding and size */
        .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
        }

        /* set default star color */
        .rating__icon--star {
            color: orange;
        }

        /* if any input is checked, make its following siblings grey */
        .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        /* make all stars orange on rating group hover */
        .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
        }

        /* make hovered input's following siblings grey on hover */
        .rating__input:hover~.rating__label .rating__icon--star {
            color: #ddd;
        }

        /* } */
    </style>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Please Enter Feedbackdata</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" id="appoinment_id_hidden">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Response</label>
                            <textarea class="form-control" id="response_inp" rows="3"></textarea>
                        </div>

                        <div id="full-stars-example-two">
                            <div class="rating-group">
                                <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                                <label title="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                                <label title="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                                <label title="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                                <label title="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                                <label title="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star ri-star-fill"></i></label>
                                <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
                            </div>
                            <p class="desc" style="font-family: sans-serif; font-size:0.9rem">
                                Must select a star value for doctor rating</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="finalSbtBtn" type="button" onclick="invokeFeedbackSubmit()" class="btn btn-primary">Submit</button>
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
    function invokeFeedbackSubmit() {
        appo_id = document.getElementById("appoinment_id_hidden").value;
        response = document.getElementById("response_inp").value;
        rating = $('input[name="rating3"]:checked').val();
        console.log(rating)
        if (typeof rating != 'number' && isNaN(rating)) {
            swal('info', 'Please rate doctor!', 'info');
        } else if (response.length < 10) {
            swal('info', 'response length should be atleat 10 character', 'info');
        } else if (rating <= 0 || rating == null) {
            swal('info', 'Please rate us at least 1 star', 'info');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    'appo_id': appo_id,
                    'response': response,
                    'rating': rating,
                    'action': 17,
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


    function invokeFeedback(appo_id) {
        document.getElementById("appoinment_id_hidden").value = appo_id;
        $("#openModalBtn").click();
    }

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

    function swal(tittle, msg2, action) {
        Swal.fire({
            title: tittle,
            text: msg2,
            icon: action,
            confirmButtonText: 'ok'
        })
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