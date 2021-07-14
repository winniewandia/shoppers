<?php
session_start();

$username = $email = "";
$errors = array();

$conn= mysqli_connect('localhost','winniewandia', '0721229400www', 'registration');

if (!$conn) {
	die("connection failed" . mysqli_connect_error());
}

if (isset($_POST['reg_user'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  if (empty($username)) {array_push($errors,"Username is required");}
  if (empty($email)) {array_push($errors, "Email is required");}
  if (empty($password_1)) {array_push($errors, "Password is required");}
  if ($password_1 != $password_2) {
  	 array_push($errors, "The two paswords do not match");
  }



 $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
 $result = mysqli_query($conn, $user_check_query);



 
 if ($result) {

	 $user = mysqli_fetch_assoc($result);

	 if ($user['username'] === $username) {
		 array_push($errors, "User already exists");
	    }

    }

    if (count($errors) == 0) {
	     $password = md5($password_1);

	     $sql = "INSERT INTO users 
	         VALUES 
	         (NULL,'$username', '$email', '$password')";
	         $result2= mysqli_query($conn, $sql);
	         if ($result2) {
		      echo "You are now logged in";
	          }
	         
	             header('location: login.php');	   
	}else{
		echo 'kuna error';
	}
}

//login logic
if (isset($_POST['login_user'])) {
	$username= mysqli_real_escape_string($conn, $_POST['username']);
	$password= mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password= md5($password);
		$sql= "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result= mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}

	}
}




?>