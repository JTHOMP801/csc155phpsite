<!DOCTYPE html>
<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Joe Thompson
Your section csc155-->
<html>
<head>
<h1> New User</h1>

</head>
<body>
<?php
$usersql = "jthompson182";
$conn = mysqli_connect("localhost",$usersql,$usersql,$usersql);
if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else {
  echo "Connect established";
  $checker = "";

        if (isset($_POST["submit"]) )
        {
		if ($_POST["pass"] != $_POST["passconfirm"])
		{
			echo "<h1>Password does not match Password COnfirmation</h1>";
		} 
		else if ($_POST["pass"] == $checker)
		{
			echo "<h1>Password cannot be nothing</h1>";		
		}
		else if ($_POST["user"] == $checker)
		{
			echo "<h1>Username cannot be nothing</h1>";
		}
		else 
		{
		echo "inserting into tables";
		$pass = crypt($_POST["pass"], "salt");	
		$passconfirm = crypt($_POST["passconfirm"], "salt");
                $stmt = $conn->prepare("INSERT INTO sitefour (user, pass, passconfirm, email, thegroup) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $user, $pass, $passconfirm, $email, $thegroup);
                        $user=htmlentities($_POST["user"]);
                        $email=htmlentities($_POST["email"]);
                        $thegroup=htmlentities($_POST["thegroup"]);
                        $stmt->execute();
		header("Location: login.php");
		}
	}else if(isset($_POST["cancel"]) )
	{
		header("Location: login.php");
	}
}
?>
<form method="POST">
	<label for="user">Username:</label>
	<input type="text" name="user"><br>
	<label for="pass">Password:</label>
	<input type="password" name="pass"><br>
	<label for="passconfirm">Password Confirm:</label>
	<input type="password" name="passconfirm"><br>
	<label for="email">Email:</label>
	<input type="text" name="email"><br>
	<label for="thegroup">Group</label>
	<input type="text" name="thegroup"><br>
	<input type="submit" value="Submit" name="submit">
	<input type="submit" value="Cancel" name="cancel">
	
</form>

</body>
</html>




