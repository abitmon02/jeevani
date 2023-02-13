<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
    $result = $dbObj->connFnc()->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id`  INNER JOIN `tbl_login` ON `tbl_p_purchase`.`log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id` WHERE `tbl_p_purchase`.`pay_id` = '" . $_GET['pay_id'] . "';")->fetch_assoc();
?>

    <style>
        img {
            position: inherit !important;
            width: 50%;
            height: 50%;
            object-fit: cover;

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
    <!-- Page Content -->



    <section class="main-pd-wrapper" style="width: -webkit-fill-available;">
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

                            <form id="downloadFrm" action="download2.php?pay_id=<?php echo $_GET['pay_id'] ?>" method="post">
                                <div class="bee-download">
                                    <button id="downloadPresBtn" name="downloadPresBtn" class="btn btn-primary" type="submit">Download Invoice</button>
                                </div>
                            </form>
                            <h4 style="margin-top: 5px; margin-bottom: 5px">
                                Ship to
                            </h4>

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
                                <!-- <p style="margin-bottom: 5px">CIN: U52100DL2016PTC292777</p>
                                <p>FSSAI License No. 10819005000131</p> -->
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
                    $result1 = $dbObj->connFnc()->query("SELECT  `tbl_p1_purchase`.`item_id`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_p1_purchase` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_p1_purchase`.`pay_id` ='" . $_GET['pay_id'] . "';")->fetch_all(MYSQLI_ASSOC);
                    if (!empty($result)) {
                        foreach ($result1 as $temp) {
                    ?>
                <tr>
                    <td><?= $temp['item_id'] ?></td>
                    <td style="display: flex;flex-direction: column;align-items: center;"><?= $temp['product_name'] ?><img src="../images/products/<?= $temp['image'] ?>" alt="" srcset=""></td>
                    <td><?= $temp['qty'] ?></td>
                    <td><?= $temp['price'] ?></td>
                    <td><?= $temp['qty'] * $temp['price'] ?></td>
                </tr>
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

                    <p style="text-align: right"><b>ONLINE </b></p>

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




<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>
<script type="text/javascript">
    function cancelPurchase(pay_id) {
        if (pay_id != null) {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {

                    "pay_id": pay_id,
                    'action': 14,
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

    $("#downloadPresBtn").click(() => {
        $('#downloadFrm').submit();
    })
</script>