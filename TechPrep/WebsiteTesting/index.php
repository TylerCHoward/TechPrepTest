<!--

w3school.com
stackoverflow.com
dev.mysql.com
codeproject.com
php.net

-->

<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Home</title>
	</head>
	<body>
		<?php

			// Checks to see if the user is logged in
			if(isset($_SESSION['userlogin'])){
				// Checks to see if that login is an admin account
				if ($_SESSION['admin'] == "YES"){
					// If the account is admin, shows admin page
					echo '<form action = "logout.php" method = "POST">
									 <p>This is the admin home page</p><br>
									 <button type = "submit" name = "submit">Logout</button>
								</form>';
				}else{
					// If the account is normal, shows home page
					echo '<form action = "logout.php" method = "POST">
								 	<p>This is the home page</p><br>
								 	<button type = "submit" name = "submit">Logout</button>
								 </form>';
			}
		}
		?>
	</body>
</html>
