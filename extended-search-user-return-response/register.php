<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/register.css">
</head>
<body>

	<div class="container">

		<!-- to display messages -->
		<div class="message">
			<?php 
			if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
				if ($_SESSION['status'] == "200") {
					echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
				} else {
					echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";
				}
			}
			unset($_SESSION['message']);
			unset($_SESSION['status']);
			?>
		</div>

		<h1>Register Here!</h1>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" required>
			</p>
			<p>
				<label for="user_firstname">First Name:</label>
				<input type="text" name="user_firstname" id="user_firstname" required>
			</p>
			<p>
				<label for="user_lastname">Last Name:</label>
				<input type="text" name="user_lastname" id="user_lastname" required>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" required>
			</p>
			<p>
				<label for="confirm_password">Confirm Password:</label>
				<input type="password" name="confirm_password" id="confirm_password" required>
			</p>
			<input type="submit" value="Register" name="insertNewUserAccountBtn">
		</form>
	</div>
</body>
</html>