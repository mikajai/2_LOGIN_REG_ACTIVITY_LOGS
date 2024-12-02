<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="container">

		<!-- to display the messages -->
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

		<h1>Login Now!</h1>
		<form action="core/handleForms.php" method="POST">
			<p>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" required>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" required>
			</p>
			<input type="submit" value="Log In" name="loginUserAccountBtn">
		</form>
		<p>Don't have an account yet? You may register <a href="register.php">here</a></p>
	</div>
</body>
</html>
