<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Your name
Your section -->
<html>
<head>
<?php
session_start();
if (!isset($_SESSION['username'])){
	$user=" ";
	header("Location: login.php");
	}
else {
	$user=$_SESSION['username'];
}
readfile("header.html"); 
?>

</head>
<body>
<h1> WELCOME <?php echo $user; ?> </h1>
<h3><a href="ant.php">Buy Ants</a> | <a href="bee.php">Buy Bees</a> | <a href="spider.php">Buy Spiders</a> | <a href="fly.php">Buy Flys</a> | <a href="shoppingcart.php">Check Out</a> | <a href="userlist.php">User List</a> | <a href="adminpage.php">Admin Page</a> | <a href="messaging.php">Messages</a></h3>
<?php readfile("footer.html"); ?>
</body>
</html>

