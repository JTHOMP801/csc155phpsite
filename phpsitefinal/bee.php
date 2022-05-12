<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe
csc155 -->
<html>
<head>
<?php
session_start();
$product = "bee";

readfile("header.html"); ?><br />
<?php if(isset($_POST["buybee"]))
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
<body> bees in cart <br />
This is where to buy bees.
<form method="POST">
<input type="number" name="<?php echo $product;?>">
<input type="submit" value="Buy" name="buybee"><br />
<?php readfile("footer.html"); ?>
</body>
</html>


