<?php
require '../vendor/autoload.php';
require '../db/config.php';
require '../db/session.contr.cls.php';

use Dompdf\Dompdf;

$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    if (isset($_GET['pay_id'])) {
        $data = $dbObj->connFnc()->query("SELECT `tbl_p_purchase`.`pay_id`,`tbl_p_purchase`.`log_id`,`tbl_p_purchase`.`bill_id`,`tbl_p_purchase`.`r_pay_id`,`tbl_p_purchase`.`r_order_id`,`tbl_p_purchase`.`total_amount`,`tbl_p_purchase`.`date`,`tbl_p_purchase`.`status`,`tbl_bill_address`.`contact_no`,`tbl_bill_address`.`address`,`tbl_bill_address`.`pincode`,`tbl_login`.`email`,`tbl_patient`.`u_name` FROM `tbl_p_purchase` INNER JOIN `tbl_bill_address` ON `tbl_p_purchase`.`bill_id` = `tbl_bill_address`.`address_id`  INNER JOIN `tbl_login` ON `tbl_p_purchase`.`log_id` = `tbl_login`.`l_id` INNER JOIN `tbl_patient` ON `tbl_login`.`l_id` = `tbl_patient`.`l_id` WHERE `tbl_p_purchase`.`pay_id` = '" . $_GET['pay_id'] . "';")->fetch_assoc();
        if (!empty($data)) {
           
            $dompdf = new Dompdf();
            $dompdf->loadHtml(template($data));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream();
        }
    }
} else {
    header("Location:../user-login.php");
}

function template(array $data)
{
    $dbObj = new Dbh;
    $temp = '<!DOCTYPE html>

    <html>
    
    <head>
    
        <style>
            .bee-page-container{
                margin-top: 20px;
            }
            .bee-row,
            .bee-row-content {
                position: relative
            }
    
            .bee-row-1 .bee-row-content,
            .bee-row-2 .bee-col-1,
            .bee-row-5 .bee-col-1 {
                border-bottom: 2px solid #000;
                border-left: 2px solid #000;
                border-right: 2px solid #000;
                border-top: 2px solid #000
            }
    
            .bee-row-1 .bee-col-2,
            .bee-row-1 .bee-col-3,
            .bee-row-3 .bee-col-1,
            .bee-row-3 .bee-col-2,
            .bee-row-4 .bee-col-1,
            .bee-row-6 .bee-col-1 {
                padding-bottom: 5px;
                padding-top: 5px
            }
    
            body {
                background-color: #fff;
                color: #000;
                font-family: Arial, Helvetica Neue, Helvetica, sans-serif
            }
    
            .bee-row-4 .bee-col-1 .bee-block-1 a,
            a {
                color: #0068a5
            }
    
            * {
                box-sizing: border-box
            }
    
            body,
            h1,
            h2,
            h3,
            p {
                margin: 0
            }
    
            .bee-row-content {
                max-width: 1090px;
                margin: 0 auto;
                display: flex
            }
    
            .bee-row-content .bee-col-w1 {
                flex-basis: 100%
            }
    
            .bee-row-content .bee-col-w4 {
                flex-basis: 33%
            }
    
            .bee-row-content .bee-col-w11 {
                flex-basis: 92%
            }
    
            .bee-row-content .bee-col-w12 {
                flex-basis: 100%
                
            }
    
            .bee-icon .bee-icon-label-right a {
                text-decoration: none
            }
    
            .bee-image {
                overflow: auto
            }
    
            .bee-image .bee-center {
                margin: 0 auto
            }
    
            .bee-row-1 .bee-col-1 .bee-block-1 {
                width: 100%
            }
    
            .bee-row-1 .bee-row-content,
            .bee-row-3 .bee-row-content {
                border-radius: 0;
                background-repeat: no-repeat;
                color: #000
                border-bottom: 2px solid #000;
                border-left: 2px solid #000;
                border-right: 2px solid #000;
                border-top: 2px solid #000;
                
                display: flex;
                justify-content: center;
                flex-direction: column;

            }
    
            .bee-icon {
                display: inline-block;
                vertical-align: middle
            }
    
            .bee-icon .bee-content {
                display: flex;
                align-items: center
            }
    
            .bee-image img {
                display: block;
                width: 100%
            }
    
            .bee-paragraph {
                overflow-wrap: anywhere
            }
    
            @media (max-width:768px) {
                .bee-row-content {
                    display: flex;
                    flex-wrap: nowrap;
                }
            }
    
            .bee-row-1,
            .bee-row-2,
            .bee-row-3,
            .bee-row-4,
            .bee-row-5,
            .bee-row-6 {
                background-repeat: no-repeat
            }
    
            .bee-row-1 .bee-col-1 {
                padding: 5px
            }
    
            .bee-row-1 .bee-col-2 .bee-block-1 {
                width: 100%;
                text-align: center;
                padding: 60px
            }
    
            .bee-row-1 .bee-col-3 {
                padding-right: 15px
            }
    
            .bee-row-1 .bee-col-3 .bee-block-2,
            .bee-row-1 .bee-col-3 .bee-block-3,
            .bee-row-1 .bee-col-3 .bee-block-4,
            .bee-row-1 .bee-col-3 .bee-block-5,
            .bee-row-2 .bee-col-1 .bee-block-1,
            .bee-row-3 .bee-col-2 .bee-block-1,
            .bee-row-3 .bee-col-2 .bee-block-2,
            .bee-row-3 .bee-col-2 .bee-block-3,
            .bee-row-3 .bee-col-2 .bee-block-4,
            .bee-row-5 .bee-col-1 .bee-block-1 {
                width: 100%;
                text-align: center
            }
    
            .bee-row-2 .bee-row-content,
            .bee-row-5 .bee-row-content {
                background-color: #23995d;
                color: #000;
                background-repeat: no-repeat;
                border-bottom: 2px solid #000;
                border-left: 2px solid #000;
                border-right: 2px solid #000;
                border-top: 2px solid #000;
            }
    
            .bee-row-2 .bee-col-1,
            .bee-row-5 .bee-col-1 {
                padding-bottom: 5px;
                padding-top: 5px
            }
    
            .bee-row-4 .bee-row-content,
            .bee-row-6 .bee-row-content {
                background-repeat: no-repeat;
                color: #000
            }
    
            .bee-row-4 .bee-col-1 .bee-block-1 {
                padding: 10px
            }
    
            .bee-row-6 .bee-col-1 .bee-block-1 {
                color: #9d9d9d;
                font-family: inherit;
                font-size: 15px;
                padding-bottom: 5px;
                padding-top: 5px;
                text-align: center
            }
    
            .bee-row-4 .bee-col-1 .bee-block-1 {
                color: #000;
                font-size: 14px;
                font-weight: 400;
                line-height: 120%;
                text-align: justify;
                direction: ltr;
                letter-spacing: 0
            }
    
            .bee-row-4 .bee-col-1 .bee-block-1 p:not(:last-child) {
                margin-bottom: 16px
            }
    
            .bee-row-6 .bee-col-1 .bee-block-1 .bee-icon-image {
                padding: 5px 6px 5px 5px
            }
    
            .bee-row-6 .bee-col-1 .bee-block-1 .bee-icon:not(.bee-icon-first) .bee-content {
                margin-left: 0
            }
    
            .bee-row-6 .bee-col-1 .bee-block-1 .bee-icon::not(.bee-icon-last) .bee-content {
                margin-right: 0
            }
            #downloadPresBtn{
                padding: 5px 10px;
                font-size: 15px;
                font-weight: 300;
                background-color: yellowgreen;
                color: white;
                border: none;
                cursor: pointer;
            }
            .bee-download{
                margin-top: 20px;
                margin-bottom: 20px;
                display: flex;
                justify-content: center;
            }
            @media only screen and (min-width: 992px) {
                .bee-page-container{
                    color:white;
                }
            }
        </style>
    </head>
    
    <body>
        <div class="bee-page-container">
            <div class="bee-row bee-row-1">
                
                <div class="bee-row-content">
                    
                    <div class="bee-col bee-col-3 bee-col-w4">
                        
                        <div class="bee-block bee-block-2 bee-heading">
                             <h1
                                style="color:#555555;font-size:23px;margin-bottom:20px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">JEEVANI.COM</span>
                            </h1>
                           
                        </div>
                        <div class="bee-block bee-block-3 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Tax Invoice</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-3 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">GST TIN : 06AAFCD6498P1ZT</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-4 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Toll Free No. : 1800-123-6477</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-2">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w12">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h1
                                style="color:#ffffff;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Billing Details</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-3">
                <div class="bee-row-content" style="
                flex-direction: row !important;
            ">
                    
                    <div class="bee-col bee-col-1 bee-col-w1" style="
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                ">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                 <span class="tinyMce-placeholder"> Order ID: ' . $data['r_order_id'] . '</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">  Purchase date: ' . date("Y-m-d", strtotime($data['date'])) . '</span>
                            </h3>
                        </div>
                        
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                 <span class="tinyMce-placeholder">Ship to : </span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-2 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                
                                <span class="tinyMce-placeholder">Address :' . $data['address'] . ", " . $data['pincode'] . '</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-3 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Phone : ' . $data['contact_no'] . '</span>
                            </h3>
                        </div>
                       
                    </div>
                </div>
            </div>
           
            <div class="bee-row bee-row-2">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w12">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h1
                                style="color:#ffffff;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Purchased items</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-3">
                <div class="bee-row-content" style="
                flex-direction: row !important;
            ">
                    <div class="bee-col bee-col-1 bee-col-w1">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">#</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-1 bee-col-w1">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Item Name</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Qty</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Unit Price</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Total Value</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>';

    $result1 = $dbObj->connFnc()->query("SELECT  `tbl_p1_purchase`.`item_id`,`tbl_p1_purchase`.`qty`,`tbl_p1_purchase`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`price`,`tbl_product`.`image` FROM `tbl_p1_purchase` INNER JOIN `tbl_product` ON `tbl_p1_purchase`.`product_id` = `tbl_product`.`product_id` WHERE `tbl_p1_purchase`.`pay_id` ='" . $_GET['pay_id'] . "';")->fetch_all(MYSQLI_ASSOC);
    if (!empty($result1)) {
        foreach ($result1 as $temp1) {
            $temp .= '<div class="bee-row bee-row-3">
                <div class="bee-row-content" style="
                flex-direction: row !important;
            ">
                    <div class="bee-col bee-col-1 bee-col-w1">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">' . $temp1['item_id'] . '</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-1 bee-col-w1">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">' . $temp1['product_name'] . '</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">' . $temp1['qty'] . '</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">' . $temp1['price'] . '</span>
                            </h3>
                        </div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">' .  $temp1['qty'] * $temp1['price'] . '</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    $temp .= '<div class="bee-row bee-row-5">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w12">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h1
                                style="color:#ffffff;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">INFO</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-4">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w12" style="
                    
                    border-bottom: 4px solid #000;
                    border-left: 4px solid #000;
                    border-right: 2px solid #000;
                    border-top: 4px solid #000;
                    align-items: center;
                    justify-content: center;
                    display: flex;
                    ">
                        <div class="bee-block bee-block-1 bee-paragraph">
                            <p>Payment Mode: : ONLINE</p>
                            <p>ORDER AMOUNT : ' . $data['total_amount'] . '</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    </html>';
    return $temp;
}
