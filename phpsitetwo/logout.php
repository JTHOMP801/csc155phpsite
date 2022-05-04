
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
        header("Location: login.php");
        }
?>

</head>
<body>
<?php readfile("header.html");?>
<h1> Goodbye </h1>
<?php
session_destroy();
header( "refresh:5;url=login.php" );
?>
</body>
</html>
