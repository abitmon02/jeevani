<?php

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
                    <a href="#" id="active--link">
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
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Doctors</h3>

                        <form action="docdet_pdf.php" class="doctor--card" method="POST">
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
                            <th>sl no.</th>
                            <th>Name</th>
                            <th>total-appointments</th>
                            <th>total feedback</th>
                            <th>rating</th>
                            <th>Address</th>
                            <th>Fees</th>
                            <th>Email</th>
                            <th>Specialization</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $d = 1;

                        include('../config.php');
                        $data = $con->query("SELECT * FROM `tbl_login` INNER JOIN `tbl_doctor` ON `tbl_login`.`l_id` = `tbl_doctor`.`l_id` AND `tbl_login`.`a_id` = 2;")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($data)) {
                            $d = 0;
                            foreach ($data as $value) {
                        ?>

                                <tr>
                                    <td>
                                        <p><?php echo $d++; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $value['d_name']; ?></p>
                                    </td>
                                    <td><?php $count = $con->query("SELECT count(*) AS total_count FROM `doctor_timing_tbl` INNER JOIN `appoinment_tbl` ON `doctor_timing_tbl`.`time_id` = `appoinment_tbl`.`time_id` WHERE `doctor_timing_tbl`.`l_id` = '" . $value['l_id'] . "' AND `appoinment_tbl`.`status` = 3;")->fetch_assoc()['total_count'];
                                        echo $count;
                                        ?></td>
                                    <td><?php $count = $con->query("SELECT count(*) as total_count FROM `doctor_timing_tbl` INNER JOIN `appoinment_tbl` ON `doctor_timing_tbl`.`time_id` =  `appoinment_tbl`.`time_id` INNER JOIN `serv_feedback_tbl` ON `appoinment_tbl`.`appo_id` = `serv_feedback_tbl`.`appo_id` WHERE `doctor_timing_tbl`.`l_id` = '" . $value['l_id'] . "';")->fetch_assoc()['total_count'];
                                        echo $count;
                                        ?></td>
                                    <td><?php $count = $con->query("SELECT ROUND(AVG(`serv_feedback_tbl`.`rating`),1) as total_count FROM `doctor_timing_tbl` INNER JOIN `appoinment_tbl` ON `doctor_timing_tbl`.`time_id` =  `appoinment_tbl`.`time_id` INNER JOIN `serv_feedback_tbl` ON `appoinment_tbl`.`appo_id` = `serv_feedback_tbl`.`appo_id` WHERE `doctor_timing_tbl`.`l_id` = '" . $value['l_id'] . "';")->fetch_assoc()['total_count'];
                                        if (!empty($count)) {
                                            echo $count;
                                        } else {
                                            echo "0";
                                        }
                                        ?></td>
                                    <td>
                                        <p><?php echo $value['d_address']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $value['d_fees']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo $value['email'] ?></p>
                                    </td>

                                    <td>
                                        <p><?php echo $value['spec']; ?></p>
                                    </td>
                                    <td>
                                        <p><?php $t = $value['status'];

                                            if ($t == 0) {
                                                echo "Active";
                                            } else {
                                                echo "Inactive";
                                            } ?></p>
                                    </td>
                                </tr>

                        <?php

                            }
                        }

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