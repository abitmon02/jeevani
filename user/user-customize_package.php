<?php
require '../config.php';
require '../db/session.contr.cls.php';

$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true && isset($_GET['id'])) {
    $user_data = $sessObj->getSessionData();
    $package_id = $_GET['id'];
    $var = $user_data['email'];
    $key = $con->query("SELECT * FROM `admin_custom_pack_main_tbl` WHERE `admin_custom_pack_main_tbl`.`id` = '$package_id'")->fetch_assoc();
    $total_amt = 0;
    $all_packages = $con->query("SELECT * FROM `tbl_packages`")->fetch_all(MYSQLI_ASSOC);
    $temp_data = $con->query("SELECT * FROM `admin_custom_pack_slave_tbl` INNER JOIN `tbl_packages` on `admin_custom_pack_slave_tbl`.`each_package_id` = `tbl_packages`.`p_id` WHERE `admin_custom_pack_slave_tbl`.`main_tbl_id` = '$package_id';")->fetch_all(MYSQLI_ASSOC);

    foreach ($temp_data as $key1) {
        $total_amt += $key1['p_amount'] * $key['days'];
        $final_amt = $total_amt - (($total_amt * $key['discount']) / 100);
    }
    require 'header.php';


?>

    <!-- content -->

    <div class="overview">

        <h4>package customization</h4>
        <style>
            .elements {
                clear: both;
                list-style: none;
                padding-left: 0;
                width: 100%;
            }

            .elements li {
                display: inline-block;
                background-color: #0098a9;
                padding-top: 10px;
                padding-left: 20px;
                padding-right: 20px;
                padding-bottom: 10px;
                margin-bottom: 10px;
                margin-right: 10px;
                min-height: 42px;
                width: 100%;
                color: #fff;
            }

            .elements li a {
                color: #fff;
            }

            .fa {
                float: right;
            }
        </style>
        <div class="row">
            <input type="hidden" id="user_id" value="<?= $user_data['log_id'] ?>">
            <select name="package_sel" id="package_sel" class="form-control mb-2">
                <?php
                $s = mysqli_query($con, "SELECT * FROM `tbl_packages`");
                while ($r = mysqli_fetch_array($s)) { ?>
                    <option value="<?= $r['p_id'] ?>" data-value='<?= json_encode($r) ?>'><?= $r['p_name'] . ' - ' .  $r['p_amount'] . 'RS' ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <a href="#" id="add-todo-item" class="btn btn-primary">Add pacakge</a>
            <br>
            <ul id="elements" class="elements mt-3">
                <?php
                $j = 1;
                foreach ($temp_data as $key1) {
                ?>
                    <li data-id=<?= $key1['p_id'] ?>><?= $j . '.' . $key1['p_name'] . ' - RS' . $key1['p_amount'] . ' 1 day' ?><span class='removeItemElement'><a href='#'><i class='fa fa-times'>X</i></a></span></li>

                <?php
                    $j++;
                }
                ?>
                <br>
            </ul>
            </<div>
        </div>

        <div class="row">


            <section class="cards flex-column">
                <div class="card card-one">
                    <div class="card-header">
                        <h2>
                            <span id="green">#</span>
                            Pack - <?= $key['id'] ?> &nbsp &nbsp&nbsp&nbsp
                        </h2>
                        <strong>Total Amount : RS<?= $total_amt ?></strong>

                    </div>
                    <div class="card-header" style="text-align: left;align-self: left;">
                        <h4 class="text-left">
                            <span id="green">Discount Rate - RS<?= $final_amt ?></span>
                        </h4>
                    </div>
                    <div class="card-header" style="text-align: left;align-self: left;">
                        <h4 class="text-left">
                            <span id="blue">Discount <?= $key['discount'] ?>%</span>
                        </h4>
                    </div>
                    <div class="card-header" style="text-align: left;align-self: left;">
                        <h4 class="text-left">
                            <span id="blue">Number of days <?= $key['days'] ?></span>
                        </h4>
                    </div>

                </div>

            </section>

        </div>
        <br>
        <button type="button" class="btn btn-primary" id="modal_open_btn">
            Create and book
        </button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Need more details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Number of days staying</label>
                        <input type="number" class="form-control" id="inp_num_days" value="<?= $key['days'] ?>" placeholder="Enter number of days">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Appoinment Date</label>
                        <input type="date" class="form-control" id="inp_appo_date" placeholder="">
                    </div>

                    <div class="card card-one">

                        <div class="card-header" style="text-align: left;align-self: left;">
                            <h4 class="text-left">
                                <span id="total_amt_span"></span>
                            </h4>
                        </div>
                        <div class="card-header" style="text-align: left;align-self: left;">
                            <h4 class="text-left">
                                <span id="final_amt_span">Discount <?= $key['discount'] ?>%</span>
                            </h4>
                        </div>

                        <ul class="list">
                            <li class="item"> items on this package</li>
                            <ul id="final_list" class="list1">

                            </ul>

                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" is="close_modal_btn">Close</button>
                    <button id="confirm_btn" type="button" class="btn btn-primary">Confirm</button>
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
    var count = <?= count($temp_data) > 0 ? count($temp_data) : 0 ?>;
    var package_list = [];

    function addElement() {
        $value = JSON.parse(JSON.stringify($('#package_sel').find(':selected').data('value')));
        count = count + 1;
        $flag = true;
        $('#elements').find($('[data-id="' + $value.p_id + '"]')).each(function(i) {
            $flag = false;
        });
        if ($flag == true) {
            $("#elements").append("<li data-id='" + $value.p_id + "'>" + count + " : " + $value.p_name + " - RS" + $value.p_amount +
                "<span class='removeItemElement'><a href='#'>" +
                "<i class='fa fa-times'>X</i></a></span></li>");
        } else {
            alert("Selected package already added.");
        }
    }

    $("#confirm_btn").click(() => {
        userlog_id = $("#user_id").val();
        days = $("#inp_num_days").val();
        appo_date = $("#inp_appo_date").val();
        main_package_id = '<?= $package_id ?>';
        if (days > 0 && appo_date != null) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    "userlog_id": userlog_id,
                    "p_id_list": package_list,
                    "appo_date": appo_date,
                    "days": days,
                    "main_package_id": main_package_id,
                    'action': 8,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("error", response.msg, 'error');
                        setTimeout(() => {
                            location.href = "packages.php";
                        }, 1000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }
    })

    function swal(error, msg, error1) {
        alert(error + ":" + msg);
    }
    $("#close_modal_btn").click(() => {
        $('#exampleModal').modal('hide')
    })
    $("#modal_open_btn").click(() => {
        $("#final_list").empty();
        package_list = [];
        var div = document.getElementById('elements');
        $(div).find('li').each(function() {
            package_list.push($(this).data('id'));
        });
        elm = "";
        $final_amt = 0;
        temp_data1 = <?= json_encode($key) ?>;
        temp_data = <?= json_encode($all_packages) ?>;
        package_list.forEach(key => {
            temp_data.forEach(element => {
                if (element.p_id == key) {
                    $final_amt += element.p_amount * temp_data1.days
                    elm += "<li class='item1'>" + element.p_name + " - RS" + element.p_amount + "</li>"
                }
            });
        });
        $("#final_list").append(elm);
        $("#total_amt_span").html("Total amount : RS" + $final_amt);
        $("#final_amt_span").html("final amount : RS" + ($final_amt - ($final_amt * temp_data1.discount) / 100));
        $('#exampleModal').modal('show')
    })

    $("#inp_num_days").change(() => {
        $final_amt = 0;
        days = $("#inp_num_days").val();
        package_list.forEach(key => {
            temp_data.forEach(element => {
                if (element.p_id == key) {
                    $final_amt += element.p_amount * days;
                }
            });
        });
        $("#total_amt_span").html("Total amount : RS" + $final_amt);
        $("#final_amt_span").html("final amount : RS" + ($final_amt - ($final_amt * temp_data1.discount) / 100));
    })

    function deleteELement(e, item) {
        e.preventDefault();
        $(item).parent().fadeOut('200', function() {
            $(item).parent().remove();
        });

    }


    $(function() {

        $("#add-todo-item").on('click', function(e) {
            e.preventDefault();
            addElement()
        });

        $('#removeFirst').click(function() {
            $("li:first").remove();
            count - 1;
        });


        $('#removeElement').click(function() {
            $("li:last").remove();
            count - 1;
        });



        //EVENT DELEGATION
        //#elements is the event handler because .removeItemElement doesn't exist when the document loads, it is generated later by a todo entry
        //https://learn.jquery.com/events/event-delegation/
        $("#elements").on('click', '.removeItemElement', function(e) {
            var item = this;
            deleteELement(e, item)
            count - 1;

        })

    });
</script>