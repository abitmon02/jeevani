<?php
include_once('config.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
{
	require("PHPMailer/PHPMailer.php");
	require("PHPMailer/SMTP.php");
	require("PHPMailer/Exception.php");
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
		$mail->Subject = 'Email Verification From Jeevani Ayurvedics';
		$mail->Body    = "Thanks for registering! Click the link to verify the email address
                   <a href='http://localhost/jeevani/verify.php?email=$email&code=$v_code'>Verify</a>";
		$mail->send();
		return true;
	} catch (Exception $e) {
		// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		return false;
	}
}



if (isset($_POST['submit'])) {
	$fname = $_POST['u_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$bloodgrp = $_POST['blg'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$duplicate = mysqli_query($con, "SELECT * from tbl_login WHERE email='$email'");

	if (mysqli_num_rows($duplicate) > 0) {
		echo "<script> alert('Already Registered'); </script>";
		// header('location:user-login.php');
	} else {
		$code = bin2hex(random_bytes(16));
		$sql = "insert into tbl_login(email,password,code,a_id) values('$email','$password','$code',3)";

		if ($con->query($sql) === TRUE) {
			$val = "SELECT l_id from tbl_login where email='" . $email . "'";
			if ($res = $con->query($val)) {
				foreach ($res as $data) {
					$l_id = $data['l_id'];
					$sql1 = "INSERT INTO tbl_patient(l_id,u_name,a_id,address,city,gender,dob,bloodgrp) values('$l_id','$fname',3,'$address','$city','$gender','$dob','$bloodgrp')";
					if ($con->query($sql1) === TRUE && sendMail($email, $code)) {
						echo "<script> alert('Verification link is send to registered email'); </script>";
						//header("location:user-login.php");
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
	<title>User Registration</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js"></script>

	<link rel="stylesheet" href="css/user_reg.css">
	<script type="text/javascript">
		function valid() {
			if (document.registration.password.value != document.registration.password_again.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
</head>




<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<br><br>

		<div class="box-register">
			<center>
				<h2>Patient Registration</h2>
			</center>
			<form name="registration" id="registration" method="post" onSubmit="return valid();">
				<fieldset>
					<legend>

					</legend>
					<p>
						Enter your personal details below:
					</p>
					<div class="form-group">
						<input type="text" class="form-control" name="u_name" id="full_name" placeholder="Full Name" autocomplete="off" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="address" id="address" onblur="validate_address()" placeholder="Address" autocomplete="off" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" onblur="validate_city()" name="city" id="city" placeholder="City" autocomplete="off" required>
					</div>
					<div class="form-group">
						Date of Birth: &nbsp;&nbsp;&nbsp;
						<input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" name="dob" placeholder="Date of Birth" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label class="block">
							Gender
						</label>
						<div class="clip-radio radio-primary">
							<input type="radio" id="rg-female" name="gender" value="female" checked required>
							<label for="rg-female">
								Female
							</label>
							<input type="radio" id="rg-male" name="gender" value="male" required>
							<label for="rg-male">
								Male
							</label>
						</div>
					</div>
					<div class="form-group">

						<label for="bloodgroup"> Choose a Blood Group: </label>
						<select name="blg" id="blood" class="form-control" required>
							<option value="" disabled selected hidden>Choose a blood group</option>
							<option value="A+ve">A+ve</option>
							<option value="B+ve">A-ve</option>
							<option value="AB+ve">B+ve</option>
							<option value="O+ve">B-ve</option>
							<option value="A-ve">AB+ve</option>
							<option value="B-ve">AB-ve</option>
							<option value="AB-ve">O+ve</option>
							<option value="AB-ve">O-ve</option>
						</select>
					</div>

					<p>
						Enter your account details below:
					</p>
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" onblur="validate_email()" autocomplete="off" required>
							<i class="fa fa-envelope"></i> </span>

					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" minlength="8" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password" onblur="validate_password()" required>
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" minlength="8" id="password_again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password_again" placeholder="Re-type Password" onblur="validate_confirm()" required>
							<i class="fa fa-lock"></i> </span>
					</div>

					<div class="form-actions">
						<p>
							Already have an account?
							<a href="user-login.php">
								Log-in
							</a>
						</p>
						<center>
							<button type="submit" class="btn btn-primary pull-center" id="submit" name="submit">
								Submit <i class="fa fa-arrow-circle-right"></i>
							</button>
						</center>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<script>
	function validate_name() {
		var name = document.forms["registration"]["full_name"];
		var pattern = /^[A-Za-z]+$/;
		if (name.value == "") {
			var error = "Please enter full_name";
			document.getElementById("full_name").placeholder = error;
			document.getElementById("full_name").classList.add("custom-warning");
			name.focus();
			return false;

		}
	}

	function validate_address() {
		var name = document.forms["registration"]["address"];
		var pattern = /^[A-Za-z]+$/;
		if (name.value == "") {
			var error = "Please enter your address";
			document.getElementById("address").placeholder = error;
			document.getElementById("address").classList.add("custom-warning");
			document.registration.address.focus();
			return false;
		}
	}

	function validate_city() {
		var name = document.forms["registration"]["city"];
		var pattern = /^[A-Za-z]+$/;
		if (name.value == "") {
			var error = "Please enter your city";
			document.getElementById("city").placeholder = error;
			document.getElementById("city").classList.add("custom-warning");
			document.registration.city.focus();
			return false;
		} else if (name.value.match(pattern)) {
			document.getElementById("city").innerHTML = "";
			document.form.phone.focus();
			return true;
		} else {
			document.getElementById("city").value = "";
			document.getElementById("city").placeholder = "Invalid place";
			document.registration.city.focus();
			return false;
		}
	}

	function ValidateEmail() {
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (inputText.value.match(mailformat)) {
			alert("Valid email address!");
			document.form1.text1.focus();
			return true;
		} else {
			alert("You have entered an invalid email address!");
			document.form1.text1.focus();
			return false;
		}
	}

	function validate_password() {
		var name = document.forms["registration"]["password"];
		var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
		if (name.value == "") {
			var error = "Please enter your password";
			document.getElementById("password").placeholder = error;
			document.getElementById("password").classList.add("custom-warning");
			document.form.password.focus();
			return false;
		} else if (name.value.match(pattern)) {
			document.getElementById("password").innerHTML = "";
			document.form.cpassword.focus();
			return true;
		} else {
			document.getElementById("password").value = "";
			document.getElementById("password").placeholder = "Invalid password";
			document.form.password.focus();
			return false;
		}
	}

	function validate_confirm() {
		var name1 = document.forms["registration"]["password_again"];
		var name2 = document.forms["registration"]["password_again"];

		if (name2.value == "") {
			var error = "Please enter password";
			document.getElementById("password_again").placeholder = error;
			document.getElementById("password_again").classList.add("custom-warning");
			document.form.cpassword.focus();
			return false;
		} else if (name1.value == name2.value) {
			document.getElementById("password_again").innerHTML = "";
			document.form.checkBox.focus();
			return true;
		} else {
			document.getElementById("password_again").value = "";
			document.getElementById("password_again").placeholder = "Password doesnot match";
			document.form.cpassword.focus();
			return false;
		}
	}


	bootstrapValidate('#full_name', 'alpha:You can only input alphabetic characters');
</script>
</body>

</html>