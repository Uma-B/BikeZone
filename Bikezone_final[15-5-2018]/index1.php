<html>
<head>
<title>Verify Gmail Address via SMTP</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
</head>
<body>
<?php

//included the smtp validate email class
include_once ('lib/smtp_validateEmail.class.php');
$SMTP_Validator = new SMTP_validateEmail();
?>

<div id="main">

<div id="login">

<form action="" method="POST">
<input type="text" name="val_check_email" class="email_box" placeholder="Username"/><label><b>@gmail.com</b></label>
<input type="submit" value="Check" id="submit"/>
</form>
</div>
<div id="note">
<?php
if (isset($_POST['val_check_email'])) {
$email = $_POST['val_check_email'];

if ($email != "") {
$email.="@gmail.com";
$results = $SMTP_Validator->validate(array($email));
echo "<p class='result'><b>RESULT : </b></p>";
if ($results[$email]) {
echo "<p><b>Congratulations!!!</b> The email address " . "<span class='success'><strong>" . $email . "</strong></span>" . " exists!</p>";
} else {
echo "<p><b>Sorry!!!</b> The email address " . "<span class='fail'><strong>" . $email . "</strong></span>" . " <strong>doesn't</strong> exists!<br>";
}
}
}
?>
</div>
</div>
<script>
jQuery(document).ready(function() {
jQuery("#submit").click(function() {
var val = jQuery('.email_box').val();
if (val == "") {
alert('Please enter an email.');
}
});
});
</script>
</body>
</html>