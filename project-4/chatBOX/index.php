<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Now chatting in: <?= $_GET['chatroom'] ?></title>
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
<?php

include 'db/db-config.php';
include 'includes/auto-inc.php';

$PDOAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
$domainControl = new DomainLayerCollections($PDOAdapter);

session_start();

if (!empty( $_SESSION['client'] )) {
	$user = $_SESSION['client'];
}
else {
    header("login.php");
}

?>
<div class="container-fluid">
<a href="login.php?logout=logout"<button type="button" class="btn btn-primary">Logout</button></a>
    <div class="row text-center">
        <div class="chatbox-main-style">

            <h2>ChatBOX</h2>
            
            <!--<div class="row">-->
                <p class="display-name-p">You are: <a href="#">@<?=$user->name?></a></p>
                <p>[Group: <a href="groups.php">@<?=$group->name?></a>]</p>
            <!--</div>-->
        
        </div>
    </div>

    <div class="row">
            
        <div id="auto-box" class="col-md-3" style="">
        </div>
        
        <div class="col-md-6">
        
            <div id="message-container" class="container-fluid message-area-index">
                <!--<?php
                //for ($i = 0; $i < 30; ++ $i) {
                ?>
                
                <div class="container-fluid individual-message-box">
                    <p class="individual-name">@Username </p>
                    <p class="individual-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                
                <?php
                //}
                ?>-->
            </div>

        </div>
                
        <div class="col-md-3">
        </div>
            
    </div>

    <div class="row">
        <div class="col-md-3">
        </div>
        
        <div class="col-md-6 ui-widget">
            <!--<form id="send-message-area">-->
                <textarea  id="actual-text-box" class="textarea-index form-control" maxlength='300'></textarea>
                <!--<div class="pull-right" style="">
                
                    <!--<input class="chatbox-send-button" type="submit" value="Send">-->
                    
                    <!--<label for="file-upload" class="custom-file-upload">
                        <span id="file-label" class="glyphicon glyphicon-paperclip"></span>
                    </label>-->
                <!--</div>
                
                <input id="file-upload" class="" type="file" value="Attach">
                
            </form>-->
        </div>
        
        <div class="col-md-3">
        </div>
    </div>

</div>
</body>
</html>