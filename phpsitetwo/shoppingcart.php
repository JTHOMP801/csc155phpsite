<!-- I  honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Your name
Your section -->
<html>
<head>
<?php readfile("header.html"); ?><br>
<?php
require("lib/phpfunctions.php"); 
session_start();
if (!isset($_SESSION['username'])){
        header("Location: login.php");
        }
if (!isset($_POST["option"])){
}
else if ($_POST["option"] == "Buy"){
	echo "You have been charged<br />";
	$_SESSION["ant"]=0;
	$_SESSION["bee"]=0;
	$_SESSION["fly"]=0;
	$_SESSION["spider"]=0;
}
else if ($_POST["option"] == "Remove"){
	$_SESSION["ant"]=0;
        $_SESSION["bee"]=0;
        $_SESSION["fly"]=0;
        $_SESSION["spider"]=0;
}
?>
</head>
<body>
Listing of items: <br>
Ants: <?php echoSession("ant") ?> <br>
Bees: <?php echoSession("bee") ?> <br>
Flys: <?php echoSession("fly") ?> <br>
Spiders: <?php echoSession("spider") ?> <br>
<form method="POST">
<input type="submit" name="option" value="Buy">
<input type="submit" name="option" value="Remove">
</form><br>
<?php readfile("footer.html"); ?>



</body>

<html>
