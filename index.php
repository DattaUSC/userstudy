<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<!-- Bootstrap -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200' rel='stylesheet' type='text/css'>	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- Script -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/angular.min.js"></script>
	<script src="js/angular-custom.js"></script>
</head>
<body>

<?php

include('connect.php')

$sqlget = "SELECT * FROM people";
$sqldata = mysqli_query($dbcon, $sqlget) or die('error');

echo "<table">
echo "<tr><th>ID</th><th>Name</th>"

while($row = mysqli_fetch_array(sqldata, MYSQLI_ASSOC)) {
	echo "<tr><td>";
	echo $row['UserID'];
	echo "</td><td>";
	echo $row['UserName'];
	echo "</td></tr>";
}

echo "</table>";

?>

<h4>POST</h4>
<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<hr style="border:1px solid #999;">

<h4>GET:</h4>
<form action="welcome_get.php" method="get">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>