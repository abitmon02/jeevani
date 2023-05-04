<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';

?>
    <!-- content -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <div class="overview">
    <!-- <form action="pdf_appo.php" method="POST">
                                <div class="text-right">
                                    <button type="submit" name="btn_pdf"class="btn btn-light"> </i> Download</button>
                                </div>
                    </form> -->
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <h2 style="color: #9f8e64;">List of Active Appointments</h2><br>
                    <thead class="TableHead">
                        <tr>
                            <th>Sl No.</th>
                            <th>date</th>
                            <th>time</th>
                            <th>patient</th>
                            <th>Symptoms</th>
                            <th>Gender</th>
                            <th>Fee status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $timing_data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`fee_status`,`appoinment_tbl`.`appo_id`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`tbl_patient`.`u_name`,`appoinment_tbl`.`symptom`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`bloodgrp`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end` FROM `appoinment_tbl` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` INNER JOIN `doctor_timing_tbl` on `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` LEFT JOIN `tbl_login` ON `doctor_timing_tbl`.`l_id` = `tbl_login`.`l_id` WHERE `tbl_login`.`l_id` = '" . $user_data['log_id'] . "' AND `tbl_login`.`a_id` = 2 AND `appoinment_tbl`.`status` = 0 AND `appoinment_tbl`.`date` = CURDATE();")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($timing_data)) {
                            $i = 1;
                            foreach ($timing_data as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><?= date("d-m-Y", strtotime($value['date']))  ?></td>
                                    <td><?= $value['start'] . '-' . $value['end'] ?></td>
                                    <td><?= $value['u_name'] ?></td>
                                    <td><?= $value['symptom'] ?></td>
                                    <td><?= $value['gender'] . ',' . $value['bloodgrp'] ?></td>
                                    <td>
                                        <?= $value['fee_status'] == 1 ? 'Fee Paid' : 'Not Paid' ?>
                                    </td>
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
                                        if ($value['status'] == 0 || $value['status'] == 2) { ?>
                                            <button onclick="deleteappo(<?= $value['appo_id'] ?>)" class="btn btn-sm btn-danger">X</button>
                                            <!-- <button onclick="zoomLinkGen(<//?= $value['appo_id'] ?>)" class="btn btn-sm btn-warning">Zoom Link</button> -->
                                            <button onclick="openModal(<?= $value['appo_id'] ?>)" class="btn btn-sm btn-success">Complete</button>
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
                                    No Appointments Today!!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- content end -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Write prescription details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" value="" id="symptom_inp" name="symptom_inp" class="form-control" placeholder="Enter symptoms">
                    </div>
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
    <script type="text/javascript">
        function zoomLinkGen(appo_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    "appo_id": appo_id,
                    'action': 6,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("success", response.msg, 'success');
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }

        function deleteappo(appo_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    "appo_id": appo_id,
                    "userlog_id": <?= isset($user_data['log_id']) ? $user_data['log_id'] : '' ?>,
                    'action': 4,
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

        function openModal(appo_id) {
            $("#modalAppID").val(appo_id);
            $("#exampleModal").modal('show');
        }

        function updateAppo() {
            appo_id = $("#modalAppID").val();
            $prescription = $("#inpPres").val();
            $symptom_inp = $("#symptom_inp").val();

            if ($prescription.length < 3 || $prescription > 1000) {
                swal("error", "Prescription must be minimum 3 charatcer and mximum 1000 character", 'error');
            } else if (Number.isInteger(appo_id)) {
                swal("error", "please select a valid appoinment", 'error');
            } else if ($symptom_inp.length < 3 || $symptom_inp > 1000) {
                swal("error", "please enter symptoms", 'error');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../api/doctor_api.php",
                    data: {
                        "appo_id": appo_id,
                        "presc": $prescription,
                        "symptom": $symptom_inp,
                        "userlog_id": <?= isset($user_data['log_id']) ? $user_data['log_id'] : '' ?>,
                        'action': 5,
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

        function swal(tittle, text, icon) {
            Swal.fire({
                title: tittle,
                text: text,
                icon: icon,
            });
        }
    </script>
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>