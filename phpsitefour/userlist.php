<html>
<head>
<h1> List of Users</h1>
</head>
<body>
<a href="welcomescreen.php">Back to Welcomescreen</a>
<?php
$usersql = "jthompson182";
$conn = mysqli_connect("localhost",$usersql,$usersql,$usersql);
if (mysqli_connect_errno()) {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else
{
        echo "Connect established";
	$users = "SELECT user from sitefour;";
	$result = $conn->query($users);
	if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
        		echo "<h3>" . $row["user"]. "</h3><br>";
    		}
	} else {
    		echo "0 results";
	}




}
?>




</body>
</head>
