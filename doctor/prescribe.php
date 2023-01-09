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
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row form-group">
                    <div class="form-group col-md-3 space-between">
                        <label style="margin-top: -500px;" for="exampleInputEmail1" class="form-label text-dark">Enter Symptoms</label>
                        <input style="margin-top: 50px;" type="text" class="form-control" placeholder="Please enter symptoms" id="symptomInp">
                    </div>
                </div>
                <div class="form-group col-md-4 space-between mb-3">
                    <button class="btn btn-md btn-success" id="addTimingBtn">SUBMIT</button>
                </div>
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