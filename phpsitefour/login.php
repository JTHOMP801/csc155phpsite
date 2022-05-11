<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have 
followed all academic integrity guidelines for this work.
Your name 
Your section -->
<html>
<head>
<?php
require("lib/phpfunctions.php");
session_start();
$usersql = "jthompson182";
$conn = mysqli_connect("localhost",$usersql,$usersql,$usersql);
if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else 
{
	echo "Connect established";

	if(isset($_POST["login"]))
	{
		echo "about to do the sql query<BR>";
		$finduser = "SELECT * FROM sitefour WHERE user ='" . $_POST["usertry"] . "';";
		$resultuser = $conn->query($finduser);
		if ($resultuser && ($resultuser->num_rows > 0)) {
			echo "query is valid, numrows is:" . $resultuser->num_rows;
			$row = $resultuser->fetch_array();
			echo "I found this user in table:" . $row["user"] . "<BR>";
			echo "I found this password in table:" . $row["pass"] . "<BR>";
			$enc_passtry = crypt($_POST["passtry"], "salt");
			if ($enc_passtry == $row["pass"]) {
				$_SESSION["username"] = $_POST["usertry"];
				echo "correct password<BR>";
				header("Location: welcomescreen.php");

			} else {
				echo "incorrect password<BR>";
			}
		} else {
		    echo "Couldnt find user " . $_POST["usertry"] . "<BR>";
                }
	}
}
?>

</head>
<body>
<?php readfile("header.html"); ?>
<form method='POST'>
<label for="usertry"> User:</label>
<input type="text" name="usertry" ><br>
<label for="passtry"> Pass:</label>
<input type="password" name="passtry">
<input type="submit" value="Log In" name="login">
</form>
Username: Password<br />
Password: Username<br />
<a href="newuser.php">New User?</a>
<?php readfile("footer.html"); ?>
</body>
</body>
</html>
