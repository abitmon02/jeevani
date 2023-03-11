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
                   <a href='http://localhost/verify.php?email=$email&code=$v_code'>Verify</a>";
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
						<!-- <input type="text" class="form-control" name="u_name" id="full_name" placeholder="Full Name" autocomplete="off" required> -->
						<input type="text" class="form-control" name="u_name" id="full_name" placeholder="Full Name" autocomplete="off" required onchange="validateFullName()">
							<span id="full_name_error" style="color: red;"></span>

					</div>
					<div class="form-group">
					
					<!-- <input type="text" class="form-control" name="address" id="address" onblur="validate_address()" placeholder="Address" autocomplete="off" required> -->
					<input type="text" class="form-control" name="address" id="address" placeholder="Address" autocomplete="off" required onchange="validateAddress()">
					<span id="address-error"style="color: red;"></span>	
				</div>
					<div class="form-group">
						<input type="text" class="form-control" onchange="validateCity()" name="city" id="city" placeholder="City" autocomplete="off" required>
						<span id="city-error"style="color: red;"></span>	
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
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" onchange="validateEmail()" autocomplete="off" required>
							<i class="fa fa-envelope"></i> 
						</span>
						<span id="email-error"style="color: red;"></span>	

					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" minlength="8" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password" onchange="validatePassword()" required>
							<i class="fa fa-lock"></i> </span>
							<span id="password-error"style="color: red;"></span>	
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" minlength="8" id="password_again" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password_again" placeholder="Re-type Password" onchange="validatePassword()" required>
							<i class="fa fa-lock"></i> </span>
							<span id="password-error"style="color: red;"></span>
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
	// Name validation
function validateFullName() {
  // Get the value of the full name input field
  var fullName = document.getElementById("full_name").value.trim();
  
  // Check if the full name contains at least one alphabetic part
  var regex = /^[A-Z][a-z]*(\s[A-Z][a-z]*)*$/;
  if (!regex.test(fullName)) {
    document.getElementById("full_name_error").innerHTML = "Please enter a valid full name (only alphabetic characters are allowed, and the first letter of each part should be capitalized)";
    document.getElementById("full_name").value = "";
    document.getElementById("full_name").focus();
  } else {
    document.getElementById("full_name_error").innerHTML = "";
  }
}

// Address validation
function validateAddress() {
  // Get the value of the address input field
  var address = document.getElementById("address").value.trim();

  // Check if the address starts with an uppercase letter and contains only alphabetic characters and spaces
  var regex = /^[A-Z][a-zA-Z\, ]*$/;
  if (!regex.test(address)) {
    document.getElementById("address-error").innerHTML = "Please enter a valid address (only alphabetic characters and spaces are allowed, and the first letter should be capitalized)";
    document.getElementById("address").value = "";
    document.getElementById("address").focus();
  } else {
    document.getElementById("address-error").innerHTML = "";
  }
}


//  validate city
function validateCity() {
  // Get the value of the city input field
  var city = document.getElementById("city").value.trim();
  
  // Check if the city meets the minimum length requirement
  if (city.length < 3) {
    document.getElementById("city-error").innerHTML = "Please enter a valid city (minimum 3 characters)";
    document.getElementById("city").focus();
  }
  // Check if the city starts with white space
  else if (/^\s/.test(city)) {
    document.getElementById("city-error").innerHTML = "Please enter a valid city (white space is not allowed at the beginning)";
    document.getElementById("city").focus();
  }
  // Check if the city contains any special characters
  else if (/[^a-zA-Z\s]/.test(city)) {
    document.getElementById("city-error").innerHTML = "Please enter a valid city (special characters are not allowed)";
    document.getElementById("city").focus();
  }
  // City is valid
  else {
    document.getElementById("city-error").innerHTML = "";
  }
}

//  email validation
function validateEmail() {
  // Get the value of the email input field
  var email = document.getElementById("email").value.trim();

  // Check if the email is valid
  var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!regex.test(email)) {
    document.getElementById("email-error").innerHTML = "Please enter a valid email address";
    document.getElementById("email").focus();
  } else {
    document.getElementById("email-error").innerHTML = "";
  }
}

function validatePassword() {
  // Get the value of the password input field
  var password = document.getElementById("password").value.trim();

  // Check if the password meets the requirements
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
  if (!regex.test(password)) {
    document.getElementById("password-error").innerHTML = "Please enter a valid password (minimum 8 characters with at least one uppercase letter, one lowercase letter, one number, and one special character)";
    document.getElementById("password").focus();
  } else {
    document.getElementById("password-error").innerHTML = "";
  }
}

	// function validate_password() {
	// 	var name = document.forms["registration"]["password"];
	// 	var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
	// 	if (name.value == "") {
	// 		var error = "Please enter your password";
	// 		document.getElementById("password").placeholder = error;
	// 		document.getElementById("password").classList.add("custom-warning");
	// 		document.form.password.focus();
	// 		return false;
	// 	} else if (name.value.match(pattern)) {
	// 		document.getElementById("password").innerHTML = "";
	// 		document.form.cpassword.focus();
	// 		return true;
	// 	} else {
	// 		document.getElementById("password").value = "";
	// 		document.getElementById("password").placeholder = "Invalid password";
	// 		document.form.password.focus();
	// 		return false;
	// 	}
	// }

	// function validate_confirm() {
	// 	var name1 = document.forms["registration"]["password_again"];
	// 	var name2 = document.forms["registration"]["password_again"];

	// 	if (name2.value == "") {
	// 		var error = "Please enter password";
	// 		document.getElementById("password_again").placeholder = error;
	// 		document.getElementById("password_again").classList.add("custom-warning");
	// 		document.form.cpassword.focus();
	// 		return false;
	// 	} else if (name1.value == name2.value) {
	// 		document.getElementById("password_again").innerHTML = "";
	// 		document.form.checkBox.focus();
	// 		return true;
	// 	} else {
	// 		document.getElementById("password_again").value = "";
	// 		document.getElementById("password_again").placeholder = "Password doesnot match";
	// 		document.form.cpassword.focus();
	// 		return false;
	// 	}
	// }


	// bootstrapValidate('#full_name', 'alpha:You can only input alphabetic characters');
</script>
</body>

</html>