<?php
require '../vendor/autoload.php';
require '../db/config.php';
require '../db/session.contr.cls.php';

use Dompdf\Dompdf;

$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    // require 'header.php';
    if (isset($_GET['appo_id'])) {
        $data = $dbObj->connFnc()->query("SELECT `appoinment_tbl`.`symptom`,`appoinment_tbl`.`appo_id`,`tbl_doctor`.`d_name`,`tbl_doctor`.`d_address`,`tbl_doctor`.`spec`,`tbl_doctor`.`d_fees`,`appoinment_tbl`.`date`,`appoinment_tbl`.`token`,`appoinment_tbl`.`status`,`doctor_timing_tbl`.`start`,`doctor_timing_tbl`.`end`,`appoinment_tbl`.`prescription`,`appoinment_tbl`.`token`,`tbl_patient`.`u_name`,`tbl_patient`.`address`,`tbl_patient`.`city`,`tbl_patient`.`gender`,`tbl_patient`.`dob`,`tbl_patient`.`bloodgrp` FROM `appoinment_tbl` INNER JOIN `doctor_timing_tbl` ON `appoinment_tbl`.`time_id` = `doctor_timing_tbl`.`time_id` INNER JOIN `tbl_doctor` on `doctor_timing_tbl`.`l_id` = `tbl_doctor`.`l_id` INNER JOIN `tbl_patient` ON `appoinment_tbl`.`l_id` = `tbl_patient`.`l_id` WHERE `appoinment_tbl`.`appo_id` = '" . $_GET['appo_id'] . "';")->fetch_assoc();
        if (!empty($data)) {
            echo template($data);
        }
    }
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
function template(array $data)
{
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
                flex-basis: 8%
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
                    display: flex
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
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    
    <body>
        <div class="bee-page-container">
            <div class="bee-row bee-row-1">
                
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w4">
                        <div class="bee-block bee-block-1 bee-image"><img alt="" class="bee-center bee-fixedwidth"
                                src="http://localhost/jeevani/images/logo.png"
                                style="max-width:158px;" /></div>
                    </div>
                    <div class="bee-col bee-col-2 bee-col-w4">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h1
                                style="color:#555555;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">JEEVANI AYURVEDICS</span>
                            </h1>
                        </div>
                    </div>
                    <div class="bee-col bee-col-3 bee-col-w4">
                        <div class="bee-block bee-block-1 bee-spacer">
                            <div class="spacer" style="height:60px;"></div>
                        </div>
                        <div class="bee-block bee-block-2 bee-heading">
                            <h2
                                style="color:#555555;font-size:18px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:140%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Name : Dr.' . $data['d_name'] . ',' . $data['spec'] . '</span>
                            </h2>
                        </div>
                        <div class="bee-block bee-block-3 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Date : ' . date("Y-m-d", strtotime($data['date'])) . '</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-4 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">token : ' . $data['token'] . '</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-5 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:right;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Address : ' . $data['d_address'] . '</span>
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
                                <span class="tinyMce-placeholder">Patient Details</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-3">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w1"></div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Name: ' . $data['u_name'] . '​</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-2 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Address: ' . $data['address'] . ',' . $data['city'] . '​</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-3 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Gender: ' . $data['gender'] . '​</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-4 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Blood group: ' . $data['bloodgrp'] . '​</span>
                            </h3>
                        </div>
                        <div class="bee-block bee-block-5 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">DOB: ' . $data['dob'] . '​</span>
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
                                <span class="tinyMce-placeholder">Patient Symptoms</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bee-row bee-row-3">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w1"></div>
                    <div class="bee-col bee-col-2 bee-col-w11">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h3
                                style="color:#555555;font-size:16px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:left;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Symptom : ' . $data['symptom'] . '​</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bee-row bee-row-5">
                <div class="bee-row-content">
                    <div class="bee-col bee-col-1 bee-col-w12">
                        <div class="bee-block bee-block-1 bee-heading">
                            <h1
                                style="color:#ffffff;font-size:23px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:120%;text-align:center;direction:ltr;font-weight:700;letter-spacing:normal;margin-top:0;margin-bottom:0;">
                                <span class="tinyMce-placeholder">Description</span>
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
                    border-top: 4px solid #000;">
                        <div class="bee-block bee-block-1 bee-paragraph">
                            <p>' . $data['prescription'] . '</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    </html>';
    return $temp;
}
?>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<form id="downloadFrm" action="download.php?appo_id=<?php echo $_GET['appo_id'] ?>" method="post">
    <div class="bee-download">
        <button id="downloadPresBtn" name="downloadPresBtn" type="submit">Download</button>
    </div>
</form>
<script>
    $("#downloadPresBtn").click(() => {
        $('#downloadFrm').submit();
    })
</script>