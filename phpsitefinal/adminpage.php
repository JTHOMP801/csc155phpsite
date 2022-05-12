<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Your name 
Your section -->
<html>
<head>


</head>
<body>
<?php readfile("header.html"); ?><br>

<?php
session_start();
echo "User is:" .  $_SESSION['username'];

if (!isset($_SESSION['username'])){
	echo "session username is not set";
        header("Location: login.php");
	} 
else {
	if ($_SESSION['username'] !="ADMIN"){
		echo "<h1> YOU DO NOT HAVE ACCESS TO THIS PAGE </h1>";
		header("refresh:3;url=welcomescreen.php"); 
        } else {
		echo "<h1> Welcome ADMIN</h1>";
	}
}
$user = "jthompson182";
$conn = mysqli_connect("localhost",$user,$user,$user);
if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else {
	echo "Connect established";

	if ($_SESSION['username'] == "ADMIN"){
		$sql = "SELECT user FROM sitefour";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<h2>Users:<br>------------</h2>";
    			while($row = $result->fetch_assoc()) {
        			echo $row["user"]. "<br>";
    			}
		} else {
    			echo "0 results";
		}
	 $sql = "SELECT * FROM checkout";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                        echo "<h2>Orders:<br>------------</h2>";
                        while($row = $result->fetch_assoc()) {
                                echo "Ants:" . $row["antamount"] . " | Bees:" . $row["beeamount"] . " | Spiders:" . $row["spideramount"] . " | Flys:" . $row["flyamount"] . " | User:" . $row["from_user"] . " | Transaction Date:" . $row["checkout_date"] . " |<br><hr>";
                        }
                } else {
                        echo "0 results";
                }
	
	}

}

readfile("footer.html");

?>
<a href="welcomescreen.php">Back to Welcome Page</a>
</body>
</html>
