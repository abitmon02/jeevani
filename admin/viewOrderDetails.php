<?php

session_start();
require_once '../config.php';
if (!isset($_SESSION["email"]) && !isset($_GET['pay_id']) && !is_numeric($_GET['pay_id'])) {
    header("Location:../user-login.php");
}
$result = $con->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id`  INNER JOIN `tbl_login` ON `tbl_p_purchase`.`log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id` WHERE `tbl_p_purchase`.`pay_id` = '" . $_GET['pay_id'] . "';")->fetch_assoc();
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
    <style>
        img {
            width: 80%;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            word-break: break-all;
        }

        .h4-14 h4 {
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 5px;
        }

        .img {
            margin-left: "auto";
            margin-top: "auto";
            height: 30px;
        }

        pre,
        p {
            /* width: 99%; */
            /* overflow: auto; */
            /* bpicklist: 1px solid #aaa; */
            padding: 0;
            margin: 0;
        }

        table {
            font-family: arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
        }

        .hm-p p {
            text-align: left;
            padding: 1px;
            padding: 5px 4px;
        }

        td,
        th {
            text-align: left;
            padding: 8px 6px;
        }

        .table-b td,
        .table-b th {
            border: 1px solid #ddd;
        }

        th {
            /* background-color: #ddd; */
        }

        .hm-p td,
        .hm-p th {
            padding: 3px 0px;
        }

        .cropped {
            float: right;
            margin-bottom: 20px;
            height: 100px;
            /* height of container */
            overflow: hidden;
        }

        .cropped img {
            width: 400px;
            margin: 8px 0px 0px 80px;
        }

        .main-pd-wrapper {
            box-shadow: 0 0 10px #ddd;
            background-color: #fff;
            border-radius: 10px;

        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }
    </style>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Jee<span>vani</span></h2>
        </div>

    </section>
    <section>
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
        <section class="main-pd-wrapper" style="width: 1000px;">
            <div style="display: table-header-group">
                <h4 style="text-align: center; margin: 0">
                    <b>Tax Invoice</b>
                </h4>

                <table style="width: 100%; table-layout: fixed">
                    <tr>
                        <td style="border-left: 1px solid #ddd; border-right: 1px solid #ddd">
                            <div style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                ">
                                
                                <div class="bee-block bee-block-1 bee-image"><img alt="" class="bee-center bee-fixedwidth"
                                src="http://localhost/jeevani/images/logo.png"
                                style="max-width:158px;" /></div>
                                <p style="font-weight: bold; margin-top: 15px">
                                GST TIN : XXX XXX XXX
                                </p>
                                <p style="font-weight: bold">
                                    Toll Free No. :
                                    <a href="tel:018001236477" style="color: #00bb07">9999-999-999</a>
  </p>
                            </div>
                        </td>
                        <td align="right" style="
                text-align: right;
                padding-left: 50px;
                line-height: 1.5;
                color: #323232;
              ">
                            <div>
                                <h4 style="margin-top: 5px; margin-bottom: 5px">
                                    Ship to
                                </h4>
                                <!-- <p>NAME   :- {{ customer["name"]}}</p>
                        <p>ADDRESS:- {{customer['address']}}</p>
                        <p>MOBILE :- {{customer['mobile']}}</p>
                        <p>OrderID   :- {{customer['order_id']}}</p>  -->
                                <p style="font-size: 14px">
                                    <?= $result['address'] . ", " . $result['pincode'] ?><br />
                                    Tel:
                                    <a href="tel:01241234568" style="color: #00bb07"><?= $result['contact_no'] ?></a>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <table class="table table-bordered h4-14" style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px">
                <thead style="display: table-header-group">
                    <tr style="
              margin: 0;
              background: #fcbd021f;
              padding: 15px;
              padding-left: 20px;
              -webkit-print-color-adjust: exact;
            ">
                        <td colspan="4">
                            <h3>
                                Order ID: <?= $result['r_order_id'] ?></span>
                                <p style="
                    font-weight: 300;
                    font-size: 85%;
                    color: #626262;
                    margin-top: 7px;
                  ">
                                    Purchase date:
                                    <span style="color: #00bb07"><?= date("Y-m-d", strtotime($result['date'])) ?></span><br />
                                </p>
                            </h3>
                        </td>
                        <td colspan="5">
                            <p>Invoice  </p>
                            <p style="margin: 5px 0">Invoice Generated:- <?php echo date("d/m/Y")?></p>
                                 </td>
                        <td colspan="4" style="width: 300px">
                            <h4 style="margin: 0">Sold By:</h4>
                            <p>
                            Jeevani Ayurvedics<br />
 </p>
                        </td>
                    </tr>

                    <tr>
                        <th style="width: 50px">#</th>
                        <th style="width: 250px">
                            <h4>Item Name</h4>
                        </th>

                        <th style="width: 150px">
                            <h4>QTY</h4>
                        </th>

                        <th style="width: 150px">
                            <h4>
                                Unit<br />
                                Price
                            </h4>
                        </th>
                        <th style="width: 250px">
                            <h4>TOTAL Value</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $result1 = $con->query("SELECT  `tbl_p1_purchase`.`item_id`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_p1_purchase` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_p1_purchase`.`pay_id` ='" . $_GET['pay_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                        if (!empty($result)) {
                            foreach ($result1 as $temp) {
                        ?>
                                <td><?= $temp['item_id'] ?></td>
                                <td style="
    display: flex;
    flex-direction: column;
    align-items: center;
"><?= $temp['product_name'] ?><img src="../images/products/<?= $temp['image'] ?>" alt="" srcset=""></td>
                                <td><?= $temp['qty'] ?></td>
                                <td><?= $temp['price'] ?></td>
                                <td><?= $temp['qty'] * $temp['price'] ?></td>
                        <?php
                            }
                        }
                        ?>
                    </tr>
                </tbody>
                <tfoot></tfoot>
            </table>

            <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
               
                <tr>
                    <th style="vertical-align: top">ORDER AMOUNT</th>
                    <td style="vertical-align: top; color: #000;width:400px">
                        <b><?= $result['total_amount'] ?></b>
                    </td>
                </tr>
            </table>

            <table class="hm-p table-bordered" style="width: 100%; margin-top: 30px">
                <tr>
                    <th style="width: 400px">
                        <p>Payment Mode:</p>
                        
                    </th>
                    <td style="width: 100px; border-right: none">
                        
                        <p style="text-align: right"><b>ONLINE  </b></p>
                       
                    </td>
                    <td colspan="5" style="border-left: none"></td>
                </tr>
                <tr style="background: #fcbd02">
                    <th>Total Order Value</th>
                    <td style="width: 70px; text-align: right; border-right: none">
                    <b><?= $result['total_amount'] ?></b>
                    </td>
                    <td colspan="5" style="border-left: none"></td>
                </tr>
            </table>

        
        </section>
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