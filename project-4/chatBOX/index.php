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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script src="js/chat.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/Dictionary.js"></script>
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
    <div class="row text-center">
        <div class="col-lg-12">
            <h2>Welcome to ChatBOX</h2>
            <p>You are chatting in: <b> <?= $_GET['chatroom'] ?> </b></p>
            <p id="name-area">You are logged in as: <b> <?= $user->Email ?> </b></p>
            <div id="chat-wrap">
                <div id="chat-area">

                </div>
            </div>
            <form id="send-message-area">
                <textarea id="sendie" maxlength = "300" placeholder="Enter text here"></textarea>

            </form>
            <!-- <textarea id="auto-example" placeholder="Test auto completion here."></textarea> -->
        </div>
    </div>
</div>

<script>
  // kick off chat
  var chat =  new Chat();

  $(function() {
  
     chat.getState(); 
     
     // watch textarea for key presses
     $("#sendie").keydown(function(event) {  
     
         var key = event.which;  
   
         //all keys including return.  
         if (key >= 33) {
           
             var maxLength = $(this).attr("maxlength");  
             var length = this.value.length;  
             
             // don't allow new content if length is maxed out
             if (length >= maxLength) {  
                 event.preventDefault();  
             }  
         }  
                                                                                                     });
     // watch textarea for release of key press
     $('#sendie').keyup(function(e) {  
                
        if (e.keyCode == 13) { 
        
              var text = $(this).val();
              var maxLength = $(this).attr("maxlength");  
              var length = text.length; 
               
              // send 
              if (length <= maxLength + 1) { 
                chat.send(text);
                $(this).val("");
              } else {
                $(this).val(text.substring(0, maxLength));
              }  
        }
     });
  });
</script>

<script>
$("#sendie").autocomplete({
    source: dictionary
});
</script>
</body>
</html>