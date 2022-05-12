<!-- I  honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe
csc155-cgi -->
<html>
<head>
<?php readfile("header.html"); ?><br>
<?php
require("lib/phpfunctions.php"); 
session_start();
$usersql = "jthompson182";
$conn = mysqli_connect("localhost",$usersql,$usersql,$usersql);
if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else {
	echo "Connect established";


        if (!isset($_SESSION['username'])){
                header("Location: login.php");
                }
        if (!isset($_POST["option"])){
        }
        else if ($_POST["option"] == "Buy"){
        	echo "You have been charged<br />";
//		$stmt = $conn->prepare("INSERT INTO checkout (checkout_date, antamount, passconfirm, email, thegroup) VALUES (?, ?, ?, ?, ?)");
 //               $stmt->bind_param("sssss", $user, $pass, $passconfirm, $email, $thegroup);
                        //$user=htmlentities($_POST["user"]);
                        //$email=htmlentities($_POST["email"]);
                        //$thegroup=htmlentities($_POST["thegroup"]);
                        //$stmt->execute();
		$sql = "INSERT INTO checkout SET ";
		$sql = $sql . "checkout_date='" . date("Y-m-d h:i:sa") . "', ";
		$sql = $sql . "antamount='" . $_SESSION["ant"] . "', ";
		$sql = $sql . "beeamount='" . $_SESSION["bee"] . "', ";
		$sql = $sql . "spideramount='" . $_SESSION["spider"] . "', ";
		$sql = $sql . "flyamount='" . $_SESSION["fly"] . "', ";
		$sql = $sql . "from_user='" . $_SESSION["username"] . "';";
		echo "iam working " . $sql . "<br> ";
		$result = $conn->query($sql);



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
