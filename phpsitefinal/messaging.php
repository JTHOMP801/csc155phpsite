<!-- I  honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe
csc155-cgi -->
<html>
<head>
</head>
<body>
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
        echo "Connect established<br>";
	if (!isset($_SESSION['username'])){
               header("Location: login.php");
        }else if(isset($_POST["send"])) {
		$sql = "INSERT INTO message SET ";
                $sql = $sql . "created_date='" . date("Y-m-d h:i:sa") . "', ";
                $sql = $sql . "to_user='" . $_POST["to_user"] . "', ";
                $sql = $sql . "from_user='" . $_SESSION["username"] . "', ";
                $sql = $sql . "message='" . $_POST["message"] . "'; ";
                echo "iam working " . $sql . "<br> ";
                $result = $conn->query($sql);
                $_POST["to_user"]="";
                $_POST["message"]="";
	
	}else if(!isset($_POST["send"])) {
		$_POST["to_user"]="";
                $_POST["message"]="";
	
	}
	$sql = 'SELECT * FROM message WHERE to_user="' . $_SESSION["username"] . '";';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                        echo "<h2>Messages Recieved:<br>------------</h2>";
                        while($row = $result->fetch_assoc()) {
                                echo "From:" . $row["from_user"] . " | To:" . $row["to_user"] . " | Date:" . $row["created_date"] . " <br> Message:" . $row["message"] . "<br><hr>";
			      }
                } else {
                        echo "No Messages";
                }
	
}
?>
<h2>Send Message</h2>
<?php 
 		$sql = 'SELECT user FROM sitefour;';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                        echo "<h3>All Users:<br>------------</h3>";
                        while($row = $result->fetch_assoc()) {
                                echo $row["user"] . "<br>";
                              }
		echo "<br>";
                } else {
                        echo "No users";
                }

?>
<form method="POST">
<label for="to_user"> Send to User:</label>
<input type="text" name="to_user" value="<?php echo $_POST["to_user"]; ?>"><br>
<label for="message"> Message:</label>
<input type="textarea" name="message" value="<?php echo $_POST["message"]; ?>" maxlength="255" size="51" rows="4" cols="50" ><br>
<input type="submit" name="send" value="Send"><br>
</form>

<?php readfile("footer.html"); ?>




</body>
</html>



