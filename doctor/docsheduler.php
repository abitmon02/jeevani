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

    <div class="overview">
        <div class="row mt-5">
            <h2 style="color: #9f8e64;">Manage time shedule</h2><br><br>
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-2 form-group">
                            <label for="start_time" class="form-label text-dark">Start Time</label>
                        </div>
                        <div class="col-6 form-group">
                            <input class="text-dark" class="form-control" type="time" name="start_time" id="start_time">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-2 form-group">
                            <label for="start_time" class="form-label text-dark">End Time</label>
                        </div>
                        <div class="col-6 form-group">
                            <input class="text-dark" type="time" name="end_time" id="end_time">
                            <input type="hidden" class="form-control" id='log_id' value="<?= $user_data['log_id'] ?>">
                        </div>

                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-2 form-group">
                            <label for="start_time" class="form-label text-dark">Slot Max Count</label>
                        </div>
                        <div class="col-6 form-group">
                            <input class="text-dark" class="form-control" type="number" name="slot_count" id="slot_count">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4 space-between">
                    <input class="btn btn-primary" name="addTimingBtn" style="background-color:#82e433;;" id="addTimingBtn" value="Submit">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <table id="exampl" class="table cell-border " style="width:100%">
                    <thead class="TableHead">
                        <tr>
                            <th>Time id</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $timing_data = $dbObj->connFnc()->query("SELECT * FROM `doctor_timing_tbl` WHERE `doctor_timing_tbl`.`l_id` = '" . $user_data['log_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($timing_data)) {
                            $i = 1;
                            foreach ($timing_data as $value) { ?>
                                <tr class="firstRow">
                                    <td><?= $i ?></td>
                                    <td><?= $value['start'] ?></td>

                                    <td><?= $value['end'] ?></td>

                                    <td>
                                        <div class="toggle">
                                            <input type="checkbox" onchange="changeStatus(<?= $value['time_id'] ?>)" <?= $value['status'] == 1 ? 'checked' : '' ?>>
                                            <label for="" class="onbtn">On</label>
                                            <label for="" class="ofbtn">Off</label>
                                        </div>
                                    </td>
                                    <td><button onclick="deleteTime(<?= $value['time_id'] ?>)" class="btn btn-sm btn-danger">X</button></td>
                                </tr>

                            <?php $i++;
                            }
                        } else {
                            ?>
                            <tr class="firstRow">
                                <td>
                                    No Schedules Yet!!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <button onclick="disableDoctor(<//?= $user_data['log_id'] ?>)" class="btn btn-sm btn-danger">Disable All</button>
                <button onclick="enableDoctor(<//?= $user_data['log_id'] ?>)" class="btn btn-sm btn-warning">Enable All</button>
            -->
                <div class="toggle">
                    <h6>For Enable/Disable All</h6>
                    <?php
                    if ($value['status'] == 1) { ?>
                        <!-- <button onclick="disableDoctor(<//?= $user_data['log_id'] ?>)" class="btn btn-sm btn-danger">Disable All</button>  -->
                        <input type="checkbox" onchange="disableDoctor(<?= $user_data['log_id']  ?>)" <?= $value['status'] == 1 ? 'checked' : '' ?>>
                        <label for="" class="onbtn">On</label>
                    <?php } else { ?>
                        <!-- <button onclick="enableDoctor(<//?= $user_data['log_id'] ?>)" class="btn btn-sm btn-warning">Enable All</button> -->
                        <input type="checkbox" onchange="enableDoctor(<?= $user_data['log_id']  ?>)" <?= $value['status'] == 1 ? 'checked' : '' ?>>
                        <label for="" class="ofbtn">Off</label>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <!-- content end -->
    <script type="text/javascript">
        function enableDoctor(doctor_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    "doctor_id": doctor_id,
                    "type": 1,
                    'action': 7,
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

        function disableDoctor(doctor_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    "doctor_id": doctor_id,
                    "type": 0,
                    'action': 7,
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
        $("#addTimingBtn").click(() => {
            log_id = $("#log_id").val();
            $start = $("#start_time").val();
            $end = $("#end_time").val();
            slot_count = $("#slot_count").val();
           
            if ($start == null || $start == '') {
                swal("error", "Please select start time", 'error');
            } else if ($end == null || $end == "") {
                swal("error", "Please select end time", 'error');
            } else if ($start > $end) {
                swal("error", "start time cant be greater than end time", 'error');
            } else if ($start < '07:00') {
                swal("error", "start time oonly betwee 7am to 8pm allowed", 'error');
            } else if ($end > '20:00') {
                swal("error", "end time only between 7am to 8pm allowed", 'error');
            } else if (isNaN(slot_count) || slot_count <= 0) {
                swal("error", "Please enter allowed slot count", 'error');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../api/doctor_api.php",
                    data: {
                        'start': $start,
                        'end': $end,
                        "log_id": log_id,
                        'slot_count': slot_count,
                        'action': 1,
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

        function deleteTime(time_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    "time_id": time_id,
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

        function changeStatus(time_id) {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    'time_id': time_id,
                    'action': 3,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {

                    } else {
                        swal({
                            title: "Error",
                            text: response.msg,
                            icon: "error",
                        });
                    }
                }
            });
        }
        const swal = (msg1, msg2, msg3) => {
            alert(msg2);
        }
    </script>
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>