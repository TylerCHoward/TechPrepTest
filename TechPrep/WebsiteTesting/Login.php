<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form action = "Loginphp.php" method = "POST">
						<input type="text" name = "username" placeholder = "username"><br>
						<input type="password" name = "password" placeholder = "password"><br>
						<button type = "submit" name = "submit">Login</button>
					</form>
	</body>
</html>
