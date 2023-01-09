<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';

?>
    <!-- contents -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <h2 style="color: #9f8e64;">List of Leaves</h2><br>
                    <thead class="TableHead">
                        <tr>
                            <th>Sl No.</th>
                            <th>Type</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $timing_data = $dbObj->connFnc()->query("SELECT * FROM `tbl_leave` WHERE `tbl_leave`.`l_id` = '" . $user_data['log_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                        
                        if (!empty($timing_data)) {
                            $i = 1;
                            foreach ($timing_data as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><?= $value['type'] ?></td>
                                    <td><?= date("Y-m-d", strtotime($value['fdate']))  ?></td>
                                    <td><?= date("Y-m-d", strtotime($value['tdate']))  ?></td>
                                    <td><?= $value['reason'] ?></td>
                                    <td>
                                        <?php
                                        if ($value['status'] == 'Pending') { ?>
                                            <span class="badge badge-pill badge-secondary">Pending</span>
                                        <?php
                                        } else if ($value['status'] == 'Approved') { ?>
                                            <span class="badge badge-pill badge-success">Approved</span>
                                        <?php } else if ($value['status'] == 'Rejected') { ?>
                                            <span class="badge badge-pill badge-danger">Rejected</span>
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
                                    No Leaves yet !!!</td>

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
            if ($prescription.length < 3 || $prescription > 1000) {
                swal("error", "Prescription must be minimum 3 charatcer and mximum 1000 character", 'error');
            } else if (Number.isInteger(appo_id)) {
                swal("error", "please select a valid appoinment", 'error');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../api/doctor_api.php",
                    data: {
                        "appo_id": appo_id,
                        "presc": $prescription,
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

        function swal(msg1, msg2, msg3) {
            alert(msg2);
        }
    </script>
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>