<?php
include_once('../config.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email, $password)
{
  require ("../PHPMailer/PHPMailer.php");
  require ("../PHPMailer/SMTP.php");
  require ("../PHPMailer/Exception.php");
  $mail = new PHPMailer(true);
  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jeevaniayurv@gmail.com';                     //SMTP username
    $mail->Password   = 'zfdgwsfearkfnrqe';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('jeevaniayurv@gmail.com', 'Jeevani');
    $mail->addAddress($email);    
 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = ' Jeevani Ayurvedics';
 $mail->Body    = "Welcome to be a part of Jeevani Ayurvedics.We look forward to ypur services.<br> 
	  					You can login to the portal using Email=$email Password=$password";
     $mail->send();
 return true;
} catch (Exception $e) {
 // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 return false;
}
}




session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:../user-login.php");
}
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
$email=$_POST['email'];
$password=rand();
// $pass=md5($_POST['$password']);
$pass=md5($password);



$duplicate=mysqli_query($con, "SELECT * from tbl_login WHERE email='$email'");
    
      if(mysqli_num_rows($duplicate)>0)
      {
        echo "<script> alert('Already Registered'); </script>";
		
      }
      else
      {
        $code=bin2hex(random_bytes(16));
        $sql="insert into tbl_login(email,password,verified,a_id) values('$email','$pass','1',2)";
		
        if($con->query($sql)=== TRUE)
        {
            $val="SELECT l_id from tbl_login where email='".$email."'";
            if($res=$con->query($val))
            {
              foreach($res as $data)
              {
                $l_id=$data['l_id'];
                $sql1="insert into tbl_doctor(a_id,l_id,d_name) values(2,'$l_id','$name')";
               

                if($con->query($sql1)=== TRUE && sendMail($email, $password))
                {
                  echo "<script> alert('Registered Successfully'); </script>";
				 
                }
              }
            }
    }
    }
  }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addoc.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js" ></script>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js" ></script>
 
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
                    <a  href="admin.php" id="#">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Admin Dashboard</span>
                    </a>
                </li>
                <li>
				<a href="addproduct.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Packages</span>
                    </a>
                </li>
                <li>
                    <a href="customPackages.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item"> Custom Packages</span>
                    </a>
                </li>
                <li>
                <a href="viewpatients.php" >
                        <span class="icon icon-3"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Patients</span>

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
                        <span class="sidebar--item">Treatment Bookings</span>
                    </a>
                </li>
                 <li>
                    <a href="adddoc.php" id="active--link">
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Doctor</span>
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
                    <span class="icon icon-4"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Manage Doctor</span>
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
			
                <div class="container">
                    <h2 style="color: #9f8e64;">ADD DOCTOR</h2><br>
                    <form method="POST" action="#"  onsubmit="return validate();">
                       <label>Email:</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label>Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter Name" >
                     
                        <span style="color: red; margin-left:250px; font-size:12px"></span><br>
                       
                        <input type="submit" name="submit" id="mysubmit" value="Submit">              
                    </form>
                </div>
           










			</main>
		</section>
	 	<script src="js/script.js"></script>
	</body>
</html>
<script type="text/javascript">
function validate() {
    if (document.getElementById('name').value.length == 0 || 
    document.getElementById('email').value.length == 0 ||
        document.getElementById('phone').value.length == 0 || 
        document.getElementById('cpassword').value.length == 0) {
        span[15].innerText = "Complete the registration";
        span[15].style.color = 'red';
        return false;
    }

}
let name = document.getElementById('name');
let span = document.getElementById('span');
let email = document.getElementById('email');
let phn = document.getElementById('phone');
let pass1 = document.getElementById('cpassword');
name.onkeyup = function() {
    var regex = /^([\.\_a-zA-Z+)([a-zA-Z0-9 ]+){1,30}$/;
    if (regex.test(name.value)) {
        span[12].innerText = "";
        span[12].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[12].innerText = "enter a valid name";
        span[12].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
email.onkeyup = function() {
    const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}$/;
    const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{0,10}$/;
    if (regex.test(email.value)) {
        span[13].innerText = "";
        span[13].style.color = '#28fc7a';
        document.getElementById('mysubmit').disabled = false;
    } else {
        span[13].innerText = "your email is invalid";
        span[13].style.color = 'red';
        document.getElementById('mysubmit').disabled = true;
    }
}
window.onscroll = function() {
    myFunction()
};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
</script>

