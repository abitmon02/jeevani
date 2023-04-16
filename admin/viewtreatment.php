<?php
include('../config.php');
session_start();
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="main.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin</title>



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
                    <a href="index.php" >
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
                    <a href="customPackages.php">
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
                    <a href="#" id="active--link">
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
            </ul>            <ul class="sidebar--bottom-items">

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


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>View Treatment Booking</h3>
                        <form action="treatment_pdf.php" class="doctor--card" method="POST">
                            <div class="img--box--cover">
                                <div class="img--box">
                                    <button type="submit" name="btn_pdf" class="btn"><i class="fa fa-download "></i> Download</button>
                                </div>
                        </form>
                    </div>
                </div>
                <table id="example" class="display">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Patient Name</th>
                            <th>Patient Details</th>
                            <th>Package type</th>
                            <th>Discount status</th>
                            <th>Hospital visit</th>
                            <th>No of days staying</th>
                            <th>Purchase date</th>
                            <th>payment id</th>
                            <th>Fee Paid</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $con->query("SELECT `tbl_custom_package`.`fee_status`,`tbl_custom_package`.`id`,`tbl_custom_package`.`user_log_id`,`tbl_custom_package`.`type_status`,`tbl_custom_package`.`create_date`,`tbl_custom_package`.`num_days`,`tbl_custom_package`.`appo_date`,`tbl_custom_package`.`admin_custom_p_id`,`admin_custom_pack_main_tbl`.`days`,`admin_custom_pack_main_tbl`.`discount`,`payment1_tbl`.`r_pay_id`,`payment1_tbl`.`r_order_id`,`payment1_tbl`.`date` as paid_date,`payment1_tbl`.`amount`,`tbl_patient`.`u_name`,`tbl_patient`.`address`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`dob`,`tbl_patient`.`bloodgrp` FROM `tbl_custom_package` LEFT JOIN `admin_custom_pack_main_tbl` ON `tbl_custom_package`.`admin_custom_p_id` = `admin_custom_pack_main_tbl`.`id` LEFT JOIN `payment1_tbl` on `payment1_tbl`.`custom_package_id` = `tbl_custom_package`.`id` INNER JOIN `tbl_patient` ON `tbl_custom_package`.`user_log_id` = `tbl_patient`.`l_id` WHERE `tbl_custom_package`.`fee_status` = 1;")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($result)) {
                            $i = 1;
                            foreach ($result as  $value) {
                        ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $value['u_name'] ?></td>
                                    <td><?= 'address:' . $value['address'] . ',city:' . $value['city'] . ',gender:' . $value['gender'] . ',dob:' . $value['dob'] . ',bloodgrp:' . $value['bloodgrp'] ?></td>
                                    <td><?php if ($value['type_status'] == 0) { ?>
                                            <span class="badge badge-success">User customized</span>

                                        <?php } else { ?>
                                            <span class="badge badge-primary">User Created</span>

                                        <?php } ?>
                                    </td>
                                    <td><?php if ($value['type_status'] == 0) { ?>

                                            <span class="badge badge-info"> discount applied <?= $value['discount'] . '%' ?></span>
                                        <?php } else { ?>

                                            <span class="badge badge-danger">No discounts applied</span>
                                        <?php } ?>
                                    </td>
                                    <td><?= date("Y-m-d", strtotime($value['appo_date'])) ?></td>
                                    <td><?= $value['num_days'] ?></td>
                                    <td><?= date("Y-m-d", strtotime($value['paid_date'])) ?></td>
                                    <td><?= $value['r_pay_id'] ?> </td>
                                    <td><?= $value['amount'] ?></td>
                                    <td><span class="label text-light bg-success" style="padding: 10px 10px;border-radius: 10px">Paid</span></td>
                                </tr>
                            <?php
                                $i++;
                            }
                        } else { ?>
                            <p>No treatment history found!</p>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </main>
    </section>
    <script src="js/script.js"></script>
</body>

</html>