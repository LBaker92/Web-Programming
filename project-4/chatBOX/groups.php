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

session_start();

if (!empty( $_SESSION['client'] )) {
	$user = $_SESSION['client'];
} else {
	//display_error("No user logged in.");
	header("Location: login.php");
}

?>
<div class="container">
  
	<div class="row text-center">
		<div class="chatbox-main-style">
			<h2>ChatBOX</h2>
			<h4>A better way to chat... with a box?</h4>
			<br>
			<h5>Logged in as: <a href="#"><?=$user->Email?></a></h5>
		</div>
	</div>

	<div class="row text-center">
		<div class="dropdown btn-group">
			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Groups <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<?php
					// Pull all groups from gateway with href to index.php and their groupid
					foreach ( $groups as $group ) {
						?>
						<li><a href="index.php?groupid=<?=$group->id?>"><?=$group->name?></a></li>
						<?php
					}
				?>
				<li class="divider"></li>
				<li><a href="#" data-toggle="modal" data-target="#newGroupModal">Other</a></li>
				<!--<button id="filterButton" class="btn btn-primary navbar-btn"  >Other</button>-->
			</ul>
		</div>
	</div>
</div>
</body>

</html>