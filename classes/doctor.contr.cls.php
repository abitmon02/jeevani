<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class DoctorCls extends DoctorModalcls
{

    protected function sendMail($email, $user_name, $link, $time)
    {
        require("../PHPMailer/PHPMailer.php");
        require("../PHPMailer/SMTP.php");
        require("../PHPMailer/Exception.php");
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVERs;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send throughs
            $mail->SMTPAuth   = true;                                   //Enable SMTP authenticationa
            $mail->Username   = 'jeevaniayurv@gmail.com';                     //SMTP username
            $mail->Password   = 'zfdgwsfearkfnrqe';                               //SMTP passworda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom('jeevaniayurv@gmail.com', 'Jeevani');
            $mail->addAddress($email);
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Dear ' . $user_name . ', Doctor Meeting Link From Jeevani Ayurvedics';
            $mail->Body    = "Please join appoinment on $time 
                   <a href=" . $link . ">Join</a>";
            $mail->send();
            return true;
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    public function zoomMeetLinkGen($appo_id)
    {
        if (is_numeric($appo_id)) {
            $data = $this->getCorrespondUserDB($appo_id);
            if (!empty($data)) {
                $link = "http://localhost/login.php";
                $time = Date('y:m:d', strtotime('+3 days'));
                if ($this->sendMail($data['email'], $data['u_name'], $link, $time)) {
                    $return_data = ['status' => 1, 'msg' => 'Successfully send meeting link to patient'];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Error: Failed to send user meeting link', 'code' => 0];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function createSheduler($start, $end, $log_id)
    {
        if ($this->checkLogidDB($log_id)) {
            if ($this->checkTimeSheduleDB($start, $end, $log_id)) {
                if ($this->insertTimeDB($start, $end, $log_id)) {
                    $return_data = ['status' => 1, 'msg' => 'Successfully created time shedule'];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to create time shedule.Db Error', 'code' => 1];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Sorry. unable to insert the time shedule. coz the shedule is alredy exist.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function deleteShedule($time_id)
    {
        if (is_numeric($time_id) && $this->checkTimeidDB($time_id)) {
            if ($this->deleteTimeSheduleDB($time_id)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully deleted the time shedule'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to delete selected time shedule. Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function changeStatus($time_id)
    {
        if (is_numeric($time_id) && $this->checkTimeidDB($time_id)) {
            $data = $this->getTImesheduleDataDB($time_id);
            if (!empty($data)) {
                if ($this->changeStatusDB($time_id, $data['status'] == 1 ? 0 : 1)) {
                    $return_data = ['status' => 1, 'msg' => 'Successfully updated the status'];
                } else {
                    $return_data = ['status' => 0, 'msg' => 'Failed to update status. Db error.', 'code' => 1];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function changeStatusdoc($appo_id, $userlog_id)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkAppidDB($appo_id)) {
            if ($this->updateAppoStatusDB($appo_id, $userlog_id)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully Cancelled the appoinment'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to cancell the update Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
    public function updateAppoDataDB($appo_id, $userlog_id, $presc, $symptom)
    {
        if (is_numeric($appo_id) && is_numeric($userlog_id) && $this->checkAppidDB($appo_id)) {
            if ($this->updateAppoStatusDB1($appo_id, $userlog_id, $presc, $symptom)) {
                $return_data = ['status' => 1, 'msg' => 'Successfully Completed the appoinment'];
            } else {
                $return_data = ['status' => 0, 'msg' => 'Failed to Complete the appoinment. Db error.', 'code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => 'Request denied.', 'code' => 0];
        }
        echo json_encode($return_data);
    }
}
