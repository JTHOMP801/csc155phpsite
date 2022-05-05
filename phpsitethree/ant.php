<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Your name
Your section -->
<html>
<head>
<?php
session_start();
$product = "ant";

readfile("header.html"); ?><br />
<?php if(isset($_POST["buyant"]))
{
	if (isset($_SESSION[$product])){
	$_SESSION[$product] += $_POST[$product];
	echo $_SESSION[$product];
	}else{
	$_SESSION[$product] = $_POST[$product];
	}
}
?>
</head>
<body> ants in cart<br />

This is where to buy ants.
<form method="POST">
<input type="number" name="<?php echo $product;?>">
<input type="submit" value="Buy" name="buyant"><br />
<?php readfile("footer.html"); ?> 
</body>
</html>

