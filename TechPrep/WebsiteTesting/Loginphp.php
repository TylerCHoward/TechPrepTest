<?php

	// Starts the session for the user
	session_start();

	// Starts the login code when you click the submit button
	if (isset($_POST['submit'])) {

		// Connection to database
		include_once 'Connection.php';

		// Variables being entered to sign in
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// Checks to see if the fields are empty
		if (empty($username) || empty($password)) {
			header("Location: Login.php?login=error");
			exit();
		}else{

			// Checks to see if the username is valid
			$sql = "SELECT * FROM accounts WHERE userlogin = '$username'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) < 1) {
				header("Location: Login.php?login=error");
				exit();
			}else{

				// Looks at all the data that is associated with the username
				if ($entry = mysqli_fetch_assoc($result)) {

					// Dehashs the password
					$hashedPassword = password_verify($password, $entry['password']);

					// Checks to see if the password matches the one for the username
					if ($hashedPassword == false) {
						header("Location: Login.php?login=error");
						exit();
					}elseif ($hashedPassword == true) {

						// Log in user
						$_SESSION['userlogin'] = $entry['userlogin'];
						$_SESSION['firstName'] = $entry['firstName'];
						$_SESSION['lastName'] = $entry['lastName'];
						$_SESSION['email'] = $entry['email'];
						$_SESSION['admin'] = $entry['admin'];
						header("Location: index.php");
						exit();

					}
				}
			}
		}
	}else{
		exit();
	}

?>
