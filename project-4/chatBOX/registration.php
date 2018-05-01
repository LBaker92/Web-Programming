<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Register</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chatbox.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- All the files that are required -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
	<!-- jQuery UI -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/background.js"></script>
</head>
<body>

<!-- Where all the magic happens -->
<?php

include 'db/db-config.php';
include 'includes/auto-inc.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$DomainControl = new DomainLayerCollections($PDOAdapter);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$valid = true;
	if (!empty($_POST['reg_username']) && !empty($_POST['reg_password']) && !empty($_POST['reg_password_confirm']) && !empty($_POST['reg_fullname']) && !empty($_POST['reg_agree'])) {
		$email = $pass = $name = null;

		if ($_POST['reg_password'] != $_POST['reg_password_confirm']) {
			$valid = false;
		}

		//Look for this email address in the database.
		$dbUser = $DomainControl->findAll();

		foreach ($dbUser as $user) {
			if ($user->Email == $_POST['reg_username']) {	// Name exists in the database already.
				error("That email address is already in use.");
				$valid = false;
			}
		}
		if ($valid) {	//If all information was verified
			$userInfo = array("Email" => $_POST['reg_username'], "Password" => $_POST['reg_password'], "Name" => $_POST['reg_fullname']);
			$user = new User($userInfo);
			$DomainControl->insertUser($user);
			header('Location: login.php?registration=success');
		}
	}
}

?>

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<!-- Main Form -->
	<div class="login-form-1">
        <div class="logo">register</div>    
		<form id="register-form" class="text-left" method="POST">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="reg_username" class="sr-only">Email address</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="email address">
					</div>
					<div class="form-group">
						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
					</div>
					
					<div class="form-group">
						<label for="reg_fullname" class="sr-only">Full Name</label>
						<input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name">
					</div>
				
					<div class="form-group login-group-checkbox">
						<input type="checkbox" class="" id="reg_agree" name="reg_agree">
						<label for="reg_agree">i agree with <a href="#">terms</a></label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="#">login here</a></p>
			</div>
		</form>
		<script> 
		$("#register-form").validate( {
			rules: {
				reg_username: {
					required: true,
					email: true
				},
				reg_password: {
					required: true,
				},
				reg_password_confirm: {
					required: true,
					equalTo: "#reg_password"
				},
				reg_fullname: {
					required: true
				},
				reg_agree: {
					required: true
				}
			},
			messages: {
				reg_username: {
					required: "<p style='color:red;font-size: 13px;font-weight: normal'>An email address is required.</p>",
					email: "<p style='color:red;font-size: 13px;font-weight: normal'>You must enter a valid email address."
						+
						   "<br>EX: user@gmail.com</p>"
				},
				reg_password: {
					required: "<p style='color:red;font-size: 13px;font-weight: normal'>You must enter a password.</p>"
				},
				reg_password_confirm: {
					required: "<p style='color:red;font-size: 13px;font-weight: normal'>Password confirmation is required.</p>",
					equalTo: "<p style='color:red;font-size: 13px;font-weight: normal'>Passwords do not match.</p>"
				},
				reg_fullname: {
					required: "<p style='color:red;font-size: 13px;font-weight: normal'>You must enter your name.</p>"
				},
				reg_agree: {
					required: "<p style='color:red;font-size: 13px;font-weight: normal'>You must agree to the Terms of Service.</p>"
				}
			}
		}); 
		</script>
	</div>
	<!-- end:Main Form -->
</div>

</body>
</html>