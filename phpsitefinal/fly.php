<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe
csc155 -->
<html>
<head>
<?php
session_start();
$product = "fly";

readfile("header.html"); ?><br />
<?php if(isset($_POST["buyfly"]))
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
<body> flys in cart<br />
This is where to buy flys.
<form method="POST">
<input type="number" name="<?php echo $product; ?>">
<input type="submit" value="Buy" name="buyfly"><br />
<?php readfile("footer.html"); ?>
</body>
</html>


