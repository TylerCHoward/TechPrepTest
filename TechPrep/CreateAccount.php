<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Account</title>
	</head>
	<body>
		<form action = "signUp.php" method = "POST">
			<input type = "text" name = "firstName" placeholder = "First Name"/><br>
			<input type = "text" name = "lastName" placeholder = "Last Name"/><br>
			<input type = "text" name = "email" placeholder = "E-mail"/><br>
			<input type = "text" name = "username" placeholder = "Username"/><br>
			<input type = "password" name = "password" placeholder = "Password"/><br>
			<button type = "submit" name = "submit">Create Account</button>
		</form>
	</body>
</html>
