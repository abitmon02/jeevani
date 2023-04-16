<?php
require '../config.php';
require '../db/session.contr.cls.php';
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    $var = $user_data['email'];
    require 'header.php';

?>
    <!-- content -->

    <style>
        input[type=submit] {
            background-color: #9f8e64;
            color: white;
            padding: 6px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 style="color: #9f8e64;">APPLY LEAVE</h2><br>

                <div class="form-group col-12 mt-2">
                    <label class="form-label text-dark">Leave Date (From):</label><br>
                    <input type="date" id="fdate" class="form-control" name="fdate" min="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group col-12">
                    <label class="form-label text-dark">Leave Date (To):</label><br>
                    <input type="date" class="form-control" id="tdate" name="tdate" min="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="form-group col-12">
                    <label class="form-label text-dark">Select Leave Type :</label><br>
                    <select name="res" class="form-control" id="res" required>
                        <option class="form-check-input" disabled>Please Select</option>
                        <option value="Sick" name="res">Sick</option>
                        <option value=" Casual" name="res">Casual</option>
                        <option value="Climatic Disaster " name="res">Climatic Disaster</option>
                        <option value=" Family Functions" name="res ">Family Functions</option>
                        <option value=" Family Functions" name="res ">Long Leave</option>
                        <option value="Others" name="res">Others</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label class="form-label text-dark">Description:</label><br>
                    <input type="text" class="form-control" id="reason" name="reason" placeholder="Reason" required>
                </div>
                <div class="form-group col-12">
                    <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                    <input type="submit" name="submit" id="mysubmit" value="Submit">
                    <span style="color: red; margin-left:250px; font-size:12px"></span><br>
                </div>


            </div>
        </div>
    </div>
    <!-- content end -->
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>

<script>
    $("#mysubmit").click(() => {
        //Doctor Profile updation and js validation
        doctor_id = <?= isset($user_data['log_id']) ? $user_data['log_id'] : 0 ?>;
        leave_type = document.getElementById('res').options[document.getElementById('res').selectedIndex].value;;
        reason = $("#reason").val();
        fdate = $("#fdate").val();
        tdate = $("#tdate").val();

        console.log(leave_type);
        if (reason.length <= 3 || reason.length > 25 || !/^[a-zA-Z\s]+$/.test(reason)) {
            swal("error", "Please enter a valid reason.", 'error');
        } else if (fdate == '' || fdate == null) {
            swal("error", "Please select a starting date", 'error');
        } else if (tdate == '' || tdate == null) {
            swal("error", "Please select a ending date", 'error');
        } else if (fdate > tdate) {
            swal("error", "Starting date cant be greater than ending date.", 'error');
        } else if (leave_type == "") {
            swal("error", "Please select a leave type", 'error');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    'doctor_id': doctor_id,
                    'reason': reason,
                    'fdate': fdate,
                    'tdate': tdate,
                    'leave_type': leave_type,
                    'action': 8,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("Success", response.msg, 'success');
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

    function swal(tittle, msg2, action) {
        Swal.fire({
            title: tittle,
            text: msg2,
            icon: action,
            confirmButtonText: 'ok'
        })
    }
</script>