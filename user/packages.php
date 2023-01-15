<?php
require '../config.php';
require '../db/session.contr.cls.php';

$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();

    $var = $user_data['email'];
    require 'header.php';

?>
    <style>
        .dropdown {
            position: relative;
            font-size: 14px;
            color: #333;
            width: 350px;
            z-index: 1;
        }

        .dropdown .dropdown-list {
            padding: 12px;
            background: #fff;
            position: absolute;
            top: 30px;
            left: 2px;
            right: 2px;
            box-shadow: 0 1px 2px 1px rgba(0, 0, 0, .15);
            transform-origin: 50% 0;
            transform: scale(1, 0);
            transition: transform 0.15s ease-in-out 0.15s;
            max-height: 66vh;
            overflow-y: scroll;
        }

        .dropdown .dropdown-option {
            display: block;
            padding: 8px 12px;
            opacity: 0;
            transition: opacity 0.15s ease-in-out;
        }

        .dropdown .dropdown-label {
            display: block;
            height: 30px;
            background: #fff;
            border: 1px solid #ccc;
            padding: 6px 12px;
            line-height: 1;
            cursor: pointer;
        }

        .dropdown .dropdown-label:before {
            content: '▼';
            float: right;
        }

        .dropdown.on .dropdown-list {
            transform: scale(1, 1);
            transition-delay: 0s;
        }

        .dropdown.on .dropdown-list .dropdown-option {
            opacity: 1;
            transition-delay: 0.2s;
        }

        .dropdown.on .dropdown-label:before {
            content: '▲';
        }

        .dropdown [type="checkbox"] {
            position: relative;
            top: -1px;
            margin-right: 4px;
        }
    </style>
    <!-- content -->

    <div class="overview">
        <input type="hidden" id="user_id" value="<?= $user_data['log_id'] ?>">
        <div class="row mb-4">
            <div class="form-group col-md-12 space-between">
                <h6>Choose and create your own packages</h6>

                <div class="dropdown" data-control="checkbox-dropdown">
                    <label class="mt-3 dropdown-label">Select</label>

                    <div class="dropdown-list">
                        <a href="#" data-toggle="check-all" class="dropdown-option">
                            Check All
                        </a>
                        <?php
                        $s = mysqli_query($con, "SELECT * FROM `tbl_packages`");
                        while ($r = mysqli_fetch_array($s)) { ?>
                            <label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="<?= $r['p_id'] ?>" />
                                <?= $r['p_name'] . ' - ' .  $r['p_amount'] . 'RS' ?>
                            </label>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Number of days staying</label>
                    <input type="number" class="form-control" id="inp_num_days" value="1" placeholder="Enter number of days">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Appoinment Date</label>
                    <input type="date" class="form-control" id="inp_appo_date" placeholder="">
                </div>
                <button onclick="invokePackageAdd()" class="btn btn-success mt-3" style="background-color: green; border:none;">Create</button>
            </div>

        </div>
        <h4>Your Custom Packages</h4>
        <div class="row">
            <style>
                .flex-column {
                    display: flex;
                    flex-direction: column;
                    gap: 4rem;
                }

                .cards {
                    max-width: 50rem;
                    height: inherit;
                    margin: auto;
                    padding: 1rem 2rem;
                }

                .card1 {
                    width: 24rem;
                    padding: 2rem 1rem;
                    background-color: #fdf6c9;
                    position: relative;
                }

                .card1::before {
                    position: absolute;
                    content: "";
                    width: 16rem;
                    height: 0.625rem;
                    top: -0.625rem;
                    left: 3.5rem;
                    background-color: #ebebeb;
                }

                .card1::after {
                    position: absolute;
                    content: "";
                    width: 16rem;
                    height: 0.625rem;
                    bottom: -0.625rem;
                    left: 3.5rem;
                    background-color: #ebebeb;
                }

                .card-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 1rem;
                    font-family: "Moon Dance", cursive;
                    background-color: #ffffff;
                    border: 1px solid black;
                    opacity: 0.6;
                }

                .card-header h2 {
                    color: #24211c;
                    word-spacing: -3px;
                    font-size: 2rem;
                }

                .card-header h2 span {
                    display: inline-block;
                    margin-right: 0.25rem;
                }

                .card-header #green {
                    color: #96bc8d;
                }

                .card-header #blue {
                    color: #5f96cd;
                }

                .card-header strong {
                    font-size: 2.25rem;
                }

                .card-one {
                    border: 0.625rem solid #96bc8d;
                }

                .card-two {
                    border: 0.625rem solid #5f96cd;
                }

                .list {
                    padding: 0 4rem;
                    list-style-type: disc;
                    margin-bottom: 1rem;
                    background-color: #ffffff;
                    border: 1px solid black;
                    opacity: 0.6;
                }

                .list .item {
                    color: #40361e;
                    font-size: 0.825rem;
                    font-weight: 600;
                    padding-bottom: 0.5rem;
                }

                .list .item::marker {
                    font-size: 1.125rem;
                    color: #40361e;
                }

                .list1 {
                    padding: 0 4rem;
                    list-style-type: disc;
                    margin-bottom: 1rem;
                }

                .list1 .item1 {
                    color: red;
                    font-size: 0.825rem;
                    font-weight: 600;
                    padding-bottom: 0.5rem;
                }

                .list1 .item1::marker {
                    font-size: 1.125rem;
                    color: red;
                }

                .cta-btn {
                    text-align: center;
                    display: block;
                    width: calc(100% - 20%);
                    padding: 0.75rem;
                    margin-left: 2.5rem;
                    color: #fff;
                    font-size: 1.125rem;
                    font-weight: 600;
                    border: 0;
                    outline: 0.125rem solid;
                    outline-offset: 0.125rem;
                    cursor: pointer;
                }

                .cta-btn.btn-green {
                    background-color: #96bc8d;
                    outline-color: #96bc8d;
                }

                .cta-btn.btn-blue {
                    background-color: #5f96cd;
                    outline-color: #5f96cd;
                }
            </style>
            <?php
            $result = $con->query("SELECT `tbl_custom_package`.`id`,`tbl_custom_package`.`user_log_id`,`tbl_custom_package`.`type_status`,`tbl_custom_package`.`create_date`,`tbl_custom_package`.`num_days`,`tbl_custom_package`.`appo_date`,`tbl_custom_package`.`admin_custom_p_id`,`admin_custom_pack_main_tbl`.`days`,`admin_custom_pack_main_tbl`.`discount` FROM `tbl_custom_package` LEFT JOIN `admin_custom_pack_main_tbl` ON `tbl_custom_package`.`admin_custom_p_id` = `admin_custom_pack_main_tbl`.`id` WHERE `tbl_custom_package`.`user_log_id` = '" . $user_data['log_id'] . "' AND `tbl_custom_package`.`fee_status` = 0;")->fetch_all(MYSQLI_ASSOC);

            if (!empty($result)) {
                $i = 1;
                foreach ($result as $key) {
                    $total_amt = 0;
                    $temp_data = $con->query("SELECT * FROM `tbl_user_packages` INNER JOIN `tbl_packages` on `tbl_user_packages`.`each_package_id` = `tbl_packages`.`p_id` WHERE `tbl_user_packages`.`package_id` = '" . $key['id'] . "';")->fetch_all(MYSQLI_ASSOC);

                    $image_array = [];
                    foreach ($temp_data as $key1) {
                        array_push($image_array, '../images/' . $key1['p_image']);
                        $total_amt += $key1['p_amount'] * $key['num_days'];
                    }
                    if ($key['type_status'] == 1) {
                        $total_amt = $total_amt - (($total_amt * $key['discount']) / 100);
                    }
            ?>
                    <section class="cards flex-column">
                        <div class="card card-one" style="background-image: url('<?= $image_array[rand(0, count($image_array) - 1)] ?>');">

                            <div class="card-header">

                                <h2>
                                    <span id="green">#</span>
                                    Pack - <?= $key['id'] ?> &nbsp &nbsp&nbsp&nbsp
                                </h2>
                                <strong>RS<?= $total_amt ?></strong>

                            </div>

                            <ul class="list">

                                <?php if ($key['type_status'] == 0) { ?>
                                    <li> Package type : <span class="badge badge-success">User customized</span> </li>
                                    <li>Discount : <span class="badge badge-info"><?= $key['discount'].'%' ?> discount applied</span> </li>
                                <?php } else { ?>
                                    <li> Package type : <span class="badge badge-primary">User Created</span> </li>
                                    <li> Discount : <span class="badge badge-danger">No discounts applied</span> </li>
                                <?php } ?>
                                <li class="item"><?= 'staying days : ' . $key['num_days']  ?></li>
                                <li class="item"><?= count($temp_data) ?> items on this package</li>
                                <ul class="list1">
                                    <?php
                                    $j = 1;
                                    foreach ($temp_data as $key1) {
                                    ?>
                                        <li class="item1"><?= $j . '.' . $key1['p_name'] . ' - RS' . $key1['p_amount'] . ' per/day' ?></li>
                                        <?php
                                        ?>
                                    <?php
                                        $j++;
                                    }
                                    ?>
                                </ul>
                                <li class="item"><?= 'Created on : ' . $key['create_date']  ?></li>
                            </ul>
                            <button onclick="paytreatment(<?= $key['id'] ?>)" class="cta-btn btn-green">Book & pay</button>
                            <button onclick="removeCustomPackage(<?= $key['id'] ?>)" class="cta-btn btn-blue mt-2">Remove</button>

                        </div>

                    </section>
                <?php
                }
                $i++;
            } else { ?>
                <div class="col-md-12">
                    <h6>please add / customize packages first.</h6>
                </div>
            <?php }
            ?>
        </div>
        <br>
        <h4>OUR TREATMENTS</h4>
        <div class="row">

            <?php
            $result = $con->query("SELECT * FROM `admin_custom_pack_main_tbl`")->fetch_all(MYSQLI_ASSOC);
            if (!empty($result)) {
                $i = 1;
                foreach ($result as $key) {
                    $total_amt = 0;
                    $temp_data = $con->query("SELECT * FROM `admin_custom_pack_slave_tbl` INNER JOIN `tbl_packages` on `admin_custom_pack_slave_tbl`.`each_package_id` = `tbl_packages`.`p_id` WHERE `admin_custom_pack_slave_tbl`.`main_tbl_id` = '" . $key['id'] . "';")->fetch_all(MYSQLI_ASSOC);
                    $image_array = [];
                    foreach ($temp_data as $key1) {
                        array_push($image_array, '../images/' . $key1['p_image']);
                        $total_amt += $key1['p_amount'] * $key['days'];
                        $final_amt = $total_amt - (($total_amt * $key['discount']) / 100);
                    }

            ?>

                    <section class="cards flex-column">
                        <div class="card card-one" style="background-image: url('<?= $image_array[rand(0, count($image_array) - 1)] ?>');">
                            <div class="card-header">
                                <h2>
                                    <span id="green">#</span>
                                    Pack - <?= $key['id'] ?> &nbsp &nbsp&nbsp&nbsp
                                </h2>
                                <strong>RS<?= $total_amt ?></strong>

                            </div>
                            <div class="card-header" style="text-align: center;align-self: center;">
                                <h4 class="text-center">
                                    <span id="green">Discount Rate - <?= $final_amt ?></span>
                                </h4>
                            </div>
                            <div class="card-header" style="text-align: center;align-self: center;">
                                <h4 class="text-center">
                                    <span id="blue">Discount <?= $key['discount'] ?>%</span>
                                </h4>
                            </div>
                            <ul class="list">
                                <li class="item"><?= count($temp_data) ?> items on this package</li>
                                <ul class="list1">
                                    <?php
                                    $j = 1;
                                    foreach ($temp_data as $key1) {

                                    ?>

                                        <li class="item1"><?= $j . '.' . $key1['p_name'] . ' - RS' . $key1['p_amount'] . ' 1 day' ?></li>
                                        <?php
                                        ?>

                                    <?php
                                        $j++;
                                    }
                                    ?>
                                </ul>

                            </ul>
                            <a href="user-customize_package.php?id=<?= $key['id'] ?>" class="cta-btn btn-blue mt-2">Customize</a>

                        </div>

                    </section>
            <?php
                }
                $i++;
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <!-- content end -->
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>
<script>
    function removeCustomPackage(id) {
        userlog_id = $("#user_id").val();
        if (id != 0) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    "userlog_id": userlog_id,
                    "remove_id": id,
                    'action': 7,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("error", response.msg, 'error');
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

    function openModal(package_id) {
        $("#modalAppID").val(package_id);
        $("#exampleModal").modal('show');
    }

    function paytreatment(user_pack_id) {
        userlog_id = $("#user_id").val();
        if (user_pack_id != '' && user_pack_id != null) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    "userlog_id": userlog_id,
                    "user_pack_id": user_pack_id,
                    'action': 9,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("Payment Link Generated", "You will be redirected to the payment page. please pay the fee.", 'success');
                        setTimeout(() => {
                            window.location.href = "payment.php?status=3&amount=" + response.data.amount + "&package_id=" + response.data.package_id + "&description=" + response.data.description + "&display_amount=" + response.data.display_amount + "&display_currency=" + response.data.display_currency + "&image=" + response.data.image + "&key=" + response.data.key + "&order_id=" + response.data.order_id + "&contact=" + response.data.prefill.contact + "&email=" + response.data.prefill.email + "&name=" + response.data.prefill.name + "&color=" + response.data.theme.color + "&user_code=" + response.data.user_code;
                        }, 2000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        } else {
            alert("Error: please select a visit date.");
        }
    }

    function swal($msg1, $msg2, $msg3) {
        alert($msg2);
    }
</script>
<style>
    .card-img-top {
        position: relative !important;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<script>
    (function($) {
        var CheckboxDropdown = function(el) {
            var _this = this;
            this.isOpen = false;
            this.areAllChecked = false;
            this.$el = $(el);
            this.$label = this.$el.find('.dropdown-label');
            this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
            this.$inputs = this.$el.find('[type="checkbox"]');

            this.onCheckBox();

            this.$label.on('click', function(e) {
                e.preventDefault();
                _this.toggleOpen();
            });

            this.$checkAll.on('click', function(e) {
                e.preventDefault();
                _this.onCheckAll();
            });

            this.$inputs.on('change', function(e) {
                _this.onCheckBox();
            });
        };

        CheckboxDropdown.prototype.onCheckBox = function() {
            this.updateStatus();
        };

        CheckboxDropdown.prototype.updateStatus = function() {
            var checked = this.$el.find(':checked');

            this.areAllChecked = false;
            this.$checkAll.html('Check All');

            if (checked.length <= 0) {
                this.$label.html('Select Options');
            } else if (checked.length === 1) {
                this.$label.html(checked.parent('label').text());
            } else if (checked.length === this.$inputs.length) {
                this.$label.html('All Selected');
                this.areAllChecked = true;
                this.$checkAll.html('Uncheck All');
            } else {
                this.$label.html(checked.length + ' Selected');
            }
        };

        CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
            if (!this.areAllChecked || checkAll) {
                this.areAllChecked = true;
                this.$checkAll.html('Uncheck All');
                this.$inputs.prop('checked', true);
            } else {
                this.areAllChecked = false;
                this.$checkAll.html('Check All');
                this.$inputs.prop('checked', false);
            }

            this.updateStatus();
        };

        CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
            var _this = this;

            if (!this.isOpen || forceOpen) {
                this.isOpen = true;
                this.$el.addClass('on');
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('[data-control]').length) {
                        _this.toggleOpen();
                    }
                });
            } else {
                this.isOpen = false;
                this.$el.removeClass('on');
                $(document).off('click');
            }
        };

        var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
        for (var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
            new CheckboxDropdown(checkboxesDropdowns[i]);
        }
    })(jQuery);

    function invokePackageAdd() {
        userlog_id = $("#user_id").val();
        inp_num_days = $("#inp_num_days").val();
        inp_appo_date = $("#inp_appo_date").val();
        var values = [].filter.call(document.getElementsByName('dropdown-group'), function(c) {
            return c.checked;
        }).map(function(c) {
            return c.value;
        });
        if (values.length != 0) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    "userlog_id": userlog_id,
                    "p_id_list": values,
                    "inp_num_days": inp_num_days,
                    'inp_appo_date': inp_appo_date,
                    'action': 6,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("success", response.msg, 'error');
                        setTimeout(() => {
                            location.href = "packages.php";
                        }, 1000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }


    }
</script>