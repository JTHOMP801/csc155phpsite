<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Your name 
Your section -->
<html>
<head>
<?php
require("lib/phpfunctions.php");

session_start();

if(isset($_POST["login"]))
{
	if( rightlogin($_POST['user'], $_POST['pass']))
	{
	header("Location: welcomescreen.php");
	$_SESSION['username'] = $_POST['user'];
	}else{
	echo "<h1> INCORRECT LOGIN </h1>";
	}
}
?>

</head>
<body>
<?php readfile("header.html"); ?>
<form method='POST'>
<label for="user"> User:</label>
<input type="text" name="user" ><br>
<label for="pass"> Pass:</label>
<input type="password" name="pass">
<input type="submit" value="Log In" name="login">
</form>
Username: Password<br />
Password: Username<br />
<?php readfile("footer.html"); ?>
</body>
</body>
</html>
