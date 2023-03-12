<?php

session_start();
require_once '../config.php';
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
                    <a href="viewdoctors.php" >
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
                    <a href="#"id="active--link">
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
                        <h3>ORDER MANAGE AND History</h3>

                        <form action="pdf_order.php" class="doctor--card" method="POST">
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
                            <th>Order ID</th>
                            <th>Product</th>
                            <th></th>
                            <th>Price/Unit</th>
                            <th>QTY</th>
                            <th>Purchase Amount</th>
                            <th>Bill Address</th>
                            <th>Purchase date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $con->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id` INNER JOIN `tbl_p1_purchase` ON `tbl_p_purchase`.`pay_id` = `tbl_p1_purchase`.`pay_id` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` INNER JOIN `tbl_login` ON `tbl_p_purchase`.`log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id`;")->fetch_all(MYSQLI_ASSOC);

                        if (!empty($result)) {

                            foreach ($result as $value) { ?>
                                <tr>
                                    <td><?= $value['r_pay_id'] ?></td>
                                    <td><img src="../images/products/<?= $value['image'] ?>" alt="" srcset=""></td>
                                    <td><b><?= $value['product_name'] ?></b></td>
                                    <td><?= $value['price'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td><?= $value['total_amount'] ?></td>
                                    <td>
                                        <address><?= $value['address'] . ", " . $value['pincode'] . " - " . $value['contact_no'] ?></address>
                                    </td>
                                    <td><?= date("Y-m-d", strtotime($value['date'])) ?></td>
                                    <td><?php if ($value['status'] == 0) { ?>
                                            <span class="badge badge-info">ORDER RECIVED</span>

                                        <?php } else if ($value['status'] == 1) { ?>
                                            <span class="badge badge-success">ORDER SHIPPED</span>
                                        <?php } else if ($value['status'] == 4) { ?>
                                            <span class="badge badge-warning">ORDER CANCELLED BY YOU</span>
                                        <?php } else if ($value['status'] == 5) { ?>
                                            <span class="badge badge-danger">ORDER CANCELLED BY ADMIN</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <a href="viewOrderDetails.php?pay_id=<?= $value['pay_id'] ?>" class="btn btn-large btn-info">VIEW</a>
                                        <?php if ($value['status'] == 0) { ?>   
                                            <button onclick="proccessOrder(<?= $value['pay_id'] ?>)" class="btn btn-large btn-success">COMPLETE</button>
                                            <button onclick="cancelPurchase(<?= $value['pay_id'] ?>)" class="btn btn-large btn-danger">X</button>
                                        <?php } ?>
                                    </td>

                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>
                                    No treatment bookings yet!!!</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </main>
    </section>
    <script>
        function cancelPurchase(pay_id) {
            data = {
                'pay_id': pay_id,
                'action': 3,
            }
            beginManagerRequest(data);
        }

        function proccessOrder(pay_id) {
            data = {
                'pay_id': pay_id,
                'action': 4,
            }
            beginManagerRequest(data);
        }

        function beginManagerRequest($data) {
            $.ajax({
                type: "POST",
                url: "../api/admin_api.php",
                data: data,
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

        function swal(tittle, text, icon) {
            Swal.fire({
                title: tittle,
                text: text,
                icon: icon,
            });
        }
    </script>
    <script src="js/script.js"></script>
</body>

</html>