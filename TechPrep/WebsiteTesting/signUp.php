<?php

  // Connection to database
  include_once 'Connection.php';

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


  // Starts the signup code when you click the submit button
  if(isset($_POST['submit'])) {

    // All variables getting put into the database
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Checks to see if any of the fields are empty
    if (empty($firstName) || empty($lastName) || empty($email) || empty($username) || empty($password)){
      header("Location: CreateAccount.php?signup=error1");
      exit();
    }else{

      // Checks to see if you are using valide characters
      if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName) || !preg_match("/^[a-zA-Z@.]*$/", $email) || !preg_match("/^[a-zA-Z]*$/", $username) || !preg_match("/^[a-zA-Z0-9]*$/", $password)){
        header("Location: CreateAccount.php?signup=error2");
        exit();
      }else{

        // Checks to see if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          header("Location: CreateAccount.php?signup=error3");
          exit();
        }else{

          // Checks to see if the username you entered is already taken
          $sql = "SELECT * FROM accounts WHERE userlogin = '$username'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0){
            header("Location: CreateAccount.php?signup=error4");
            exit();
          }else{

            // Hashes the password before sending it to the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO accounts(userlogin, firstname, lastname, email, password) VALUES('$username', '$firstName', '$lastName', '$email', '$hashedPassword')";

            //  Tells the user whether or not the accounts has been added to the database or not
            if ($conn->query($sql) === TRUE) {
              header("Location: Login.php");
            } else {
              header("Location: CreateAccount.php?signup=error5");
            }
          }
        }
      }
    }
  }
?>
