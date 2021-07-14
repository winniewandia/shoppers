<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shoppers</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
		<h3>Register</h3>
	</div>

	<form method= "POST" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>>
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value= <?php echo $username;?>>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value=<?php echo $email;?>>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign In</a>
		</p>
	</form>
</body>
</html>



