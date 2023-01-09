<?php
session_start();
include('config.php');

$error = "Invalid Email or Password";
if (isset($_POST['submit'])) {
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	// echo $passwod;
	$res = $con->query("SELECT * FROM `tbl_login` WHERE `tbl_login`.`email` = '$email' AND `tbl_login`.`password` = '$password' AND `tbl_login`.`status` = 0;");
	// echo $passwors;

	if (mysqli_num_rows($res) > 0) {
		foreach ($res as $data) {
			$email = $data['email'];
			$password = $data['password'];
			$verified = $data['verified'];
			$type = $data['a_id'];
			$log_id = $data['l_id'];
		}
		$_SESSION['isLogged'] = TRUE;
		$_SESSION['type'] = $type;
		$_SESSION['email'] = $email;
		$_SESSION['auth_user'] = [
			'log_id' => $log_id,
			'email' => $email,
			'type' => $type,
			'password' => $password
		];
		if ($verified == '1') {
			if ($_SESSION['type'] == '3') {
				$_SESSION['message'] = "Welcome";
				header("location:user/index.php");
				exit(0);
			} elseif ($_SESSION['type'] == '2') {
				$_SESSION['message'] = "Welcome Doctor";
				header("location:doctor/index.php");
				exit(0);
			} elseif ($_SESSION['type'] == '1') {
				$_SESSION['message'] = "Welcome";
				header("location:admin/index.php");
				exit(0);
			}
		} else {
			echo "<script> alert('Please verify the email'); </script>";
		}
	} else {

		echo "<script> alert('Incorrect Password'); </script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<style>.error_form
{
top: 12px;
color: rgb(216, 15, 15);
    font-size: 15px;
font-weight:bold;
    font-family: Helvetica;
}</style>

<body>
	<form action="#" method="post">
		
		<div id='login-form' class='login-page'>
			<!---creating form box----->
			<div class="form-box">
				<br>
				<p>
					<center><b>LOGIN HERE</b></center>
				</p><br>
				<input type="text" placeholder="Enter your email id" class='input-field' name="email" required />

				<br><br>
				<input type="password" placeholder="Enter Password" class='input-field' name="password" required>
				<br>
				
					<center><div class="g-recaptcha" data-sitekey="6LdIVdEjAAAAAIYI1z9zk8WwkkwJK7clzhjsVu75"></div>
					<span class="error_form" id="captcha_message"></span>
				<p style="font-size:15px;float:right;margin-bottom:-10px;"><a href="forgot_password.php">Forgot password ?</a>
				<p>
					<center> <button id='submit' type='submit' class='submit-btn' style="margin-top:55px;" name="submit">Login</button></center>
					<center>
						<p style="font-size:15px">Don't have an account ?<a href="register.php">Signup</a>
						<p>
					</center>
					<br>
			</div>
		</div>
		</div>
		<script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		<script type="text/javascript">
 
  $(document).on('click','#submit',function()
  {  $("#captcha_message").hide();
 var response = grecaptcha.getResponse();
 if(response.length == 0)
 {
 $("#captcha_message").html("Please verify you are not a robot");
               $("#captcha_message").show();
 return false;
 }
 else{
 $("#captcha_message").hide();
 return true;
 }
  });
 
 
</script>

</body>

</html>
<script>
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
<script type="text/javascript">
	function preventBack() {
		window.history.forward();
	}
	setTimeout("preventBack()", 0);
	window.onunload = function() {
		null
	};
</script>