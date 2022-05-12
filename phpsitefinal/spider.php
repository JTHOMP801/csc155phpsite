<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe
csc155 -->
<html>
<head>
<?php
session_start();
$product = "spider";

readfile("header.html"); ?><br />
<?php if(isset($_POST["buyspider"]))
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
<body>
This is where to buy spiders.
<form method="POST">
<input type="number" name="<?php echo $product;?>">
<input type="submit" value="Buy" name="buyspider"><br />
<?php readfile ("footer.html"); ?>
</body>
</html>


