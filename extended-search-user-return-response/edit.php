<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/edit.css">
</head>
<body>

    <?php 
		$getTeacherByID = getTeacherByID($pdo, $_GET['id']); 
	?>

	<h1> You are editing the information of this Teacher </h1>

	<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
    	<p>
			<label for="first_name">First Name</label> 
			<input type="text" name="first_name" value="<?php echo $getTeacherByID['first_name']; ?>">
		</p>
		<p>
			<label for="last_name">Last Name</label> 
			<input type="text" name="last_name" value="<?php echo $getTeacherByID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="text" name="email" value="<?php echo $getTeacherByID['email']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label> 
			<input type="text" name="gender" value="<?php echo $getTeacherByID['gender']; ?>">
		</p>
		<p>
			<label for="date_of_birth">Date of Birth</label> 
			<input type="date" name="date_of_birth" value="<?php echo $getTeacherByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="phone_num">Phone Number</label> 
			<input type="text" name="phone_num" value="<?php echo $getTeacherByID['phone_num']; ?>">
		</p>
		<p>
			<label for="highest_educational_attainment">Highest Educational Attainment</label> 
            <select name="highest_educational_attainment" required value="<?php echo $getTeacherByID['highest_educational_attainment']; ?>">
                    <option value="Master’s Degree"> Master’s Degree </option>
                    <option value="Bachelor’s Degree"> Bachelor’s Degree </option>
                    <option value="Doctorate"> Doctorate </option>
            </select>
		</p>
        <p>
			<label for="institution">Institution</label> 
			<input type="text" name="institution" value="<?php echo $getTeacherByID['institution']; ?>">
		</p>
        <p>
			<label for="year_graduated">Year Graduated</label> 
			<input type="text" name="year_graduated" value="<?php echo $getTeacherByID['year_graduated']; ?>">
		</p>
        <p>
			<label for="licensed">Licensed</label> 
            <select name="licensed" required value="<?php echo $getTeacherByID['licensed']; ?>">
                    <option value="Yes"> Yes </option>
                    <option value="No"> No </option>
            </select>
		</p>
        <p>
			<input type="submit" name="editTeacherBtn" value="Save Updated Data">
		</p>
	</form>
	
</body>
</html>