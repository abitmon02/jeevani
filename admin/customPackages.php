<?php
require '../config.php';
require '../db/session.contr.cls.php';
if (!isset($_SESSION["email"])) {
    header("Location:../user-login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin</title>

    <style>
        .dropdown {
            position: relative;
            font-size: 14px;
            color: #333;
            width: 350px;
            z-index: 1;
        }

        .dropdown1 {
            position: relative;
            font-size: 14px;
            color: #333;
            width: 350px;
            z-index: 0;
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

</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Jee<span>vani</span></h2>
        </div>

    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="index.php">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Treatments</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="active--link">
                        <span class="icon icon-5"><i class="ri-command-line"></i></span>
                        <span class="sidebar--item"> Custom Packages</span>
                    </a>
                </li>
                <li>
                    <a href="viewpatients.php">
                        <span class="icon icon-3"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Patients</span>

                    </a>
                </li>
                <li>
                    <a href="adddoc.php">
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Doctor</span>
                    </a>
                </li>

                <li>
                    <a href="viewdoctors.php">
                        <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item">Doctors List</span>
                    </a>
                </li>
                <li>
                    <a href="viewtreatment.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Packages Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="manage_drleave.php">
                        <span class="icon icon-6"><i class="ri-map-pin-user-line"></i></span>
                        <span class="sidebar--item">Manage Doctor's Leave</span>
                    </a>
                </li>
                <li>
                    <a href="removedoctor.php">
                        <span class="icon icon-2"><i class="ri-user-settings-fill"></i></span>
                        <span class="sidebar--item">Manage Doctor</span>
                    </a>
                </li>
                <li>
                    <a href="category.php">
                        <span class="icon icon-4"><i class="ri-shopping-bag-2-fill"></i></span>
                        <span class="sidebar--item">Manage Product Category</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="icon icon-4"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Manage Products</span>
                    </a>
                </li>
                <li>
                    <a href="orderHistory.php">
                        <span class="icon icon-4"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Mange orders and History</span>
                    </a>
                </li>
                <li>
                    <a href="vw_fdbck.php">
                        <span class="icon icon-6"><i class="ri-feedback-fill"></i></span>
                        <span class="sidebar--item">Feedbacks</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">

                <li>
                    <a href="../logout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

    </section>


    <!-- CONTENT -->
    <section id="content">
        <!-- MAIN -->
        <main>
            <div class="row table-data">
                <div class="order">
                    <div class="head">
                        <h3>Create Custom Pacakges</h3>
                    </div>
                    <div>

                        <div class="row mb-4 ">
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
                                        while ($r = mysqli_fetch_array($s)) {
                                        ?>
                                            <label class="dropdown-option">
                                                <input type="checkbox" name="dropdown-group" value="<?= $r['p_id'] ?>" />
                                                <?= $r['p_name'] . ' - ' .  $r['p_amount'] . 'RS' ?>
                                            </label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <br>
                                <h6>Days</h6>
                                <div class="dropdown1">
                                    <input type="number" class="form-control" id="days_inp" placeholder="No of days">
                                </div>
                                <br>
                                <h6>Discount in %</h6>
                                <div class="dropdown1">
                                    <input type="number" class="form-control" max="99" min="0" id="discount_inp" value="0">
                                </div>

                                <button onclick="invokeAdminPackageAdd()" class="btn btn-success mt-3" style="background-color: green; border:none;">Create</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <main>

            <div class="order">
                <div class="head">
                    <h3>your package</h3>
                </div>
                <div class="row" style="column-gap: 15px;row-gap: 15px;">
                    <style>
                        .flex-column {
                            display: flex;
                            flex-direction: column;
                            gap: 4rem;
                        }

                        .card {
                            max-width: -webkit-fill-available !important;
                        }

                        /* .cards {
                                max-width: 50rem;
                                height: inherit;
                                margin: auto;
                                padding: 1rem 2rem;
                            } */

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
                            /* margin-left: 2.5rem; */
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
                    $result = $con->query("SELECT * FROM `admin_custom_pack_main_tbl`")->fetch_all(MYSQLI_ASSOC);
                    if (!empty($result)) {
                        $i = 1;
                        foreach ($result as $key) {

                            $total_amt = 0;
                            $temp_data = $con->query("SELECT * FROM `admin_custom_pack_slave_tbl` INNER JOIN `tbl_packages` on `admin_custom_pack_slave_tbl`.`each_package_id` = `tbl_packages`.`p_id` WHERE `admin_custom_pack_slave_tbl`.`main_tbl_id` = '" . $key['id'] . "';")->fetch_all(MYSQLI_ASSOC);

                            foreach ($temp_data as $key1) {
                                $total_amt += $key1['p_amount'] * $key['days'];
                                $final_amt = $total_amt - (($total_amt * $key['discount']) / 100);
                            }

                    ?>

                            <section class="cards flex-column">
                                <div class="card card-one">
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
                                    <button onclick="removeCustomPackage(<?= $key['id'] ?>)" class="cta-btn btn-blue mt-2">Remove</button>

                                </div>

                            </section>
                    <?php
                        }
                        $i++;
                    }
                    ?>
                </div>
            </div>


        </main>
    </section>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
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

        function invokeAdminPackageAdd() {
            days_inp = $("#days_inp").val();
            discount_inp = $("#discount_inp").val();
            var values = [].filter.call(document.getElementsByName('dropdown-group'), function(c) {
                return c.checked;
            }).map(function(c) {
                return c.value;
            });
            if (values.length != 0 && !isNaN(days_inp) && days_inp > 0) {
                $.ajax({
                    type: "POST",
                    url: "../api/admin_api.php",
                    data: {
                        "days_inp": days_inp,
                        "discount_inp": discount_inp,
                        "package_ids": values,
                        'action': 1,
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
            } else {
                swal("error", 'Please make sure to select at least one package, enter valid number of days and dicount', 'error');
            }


        }

        function swal(tittle, text, icon) {
            Swal.fire({
                title: tittle,
                text: text,
                icon: icon,
            });
        }

        function removeCustomPackage(id) {
            if (id != 0) {
                $.ajax({
                    type: "POST",
                    url: "../api/admin_api.php",
                    data: {
                        "remove_id": id,
                        'action': 2,
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
    </script>
</body>

</html>