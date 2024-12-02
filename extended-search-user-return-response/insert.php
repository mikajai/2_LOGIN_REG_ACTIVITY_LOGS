<?php 
require_once 'core/handleForms.php';
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/insert.css">
</head>
<body>

	<h1>Inserting a new Teacher's data</h1>

	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="first_name">First Name</label> 
			<input type="text" name="first_name">
		</p>
		<p>
			<label for="last_name">Last Name</label> 
			<input type="text" name="last_name">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="text" name="email">
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" name="gender">
		</p>
		<p>
			<label for="date_of_birth">Date of Birth</label> 
			<input type="date" name="date_of_birth">
		</p>
		<p>
			<label for="phone_num">Phone Number</label> 
			<input type="text" name="phone_num">
		</p>
		<p>
			<label for="highest_educational_attainment">Highest Educational Attainment</label> 
            <select name="highest_educational_attainment" required>
                    <option value="Master’s Degree"> Master’s Degree </option>
                    <option value="Bachelor’s Degree"> Bachelor’s Degree </option>
                    <option value="Doctorate"> Doctorate </option>
            </select>
		</p>
        <p>
			<label for="institution">Institution</label> 
			<input type="text" name="institution">
		</p>
        <p>
			<label for="year_graduated">Year Graduated</label> 
			<input type="text" name="year_graduated">
		</p>
        <p>
			<label for="licensed">Licensed</label> 
            <select name="licensed" required>
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
            </select>
		</p>
		<p>
			<input type="submit" name="insertTeacherBtn" value="Save New Data">
		</p>
	</form>
    
</body>
</html>