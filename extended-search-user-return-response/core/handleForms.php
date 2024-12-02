<?php  
require_once 'dbConfig.php';
require_once 'models.php';


// registering to the system
if (isset($_POST['insertNewUserAccountBtn'])) {
	$username = trim($_POST['username']);
	$user_firstname = trim($_POST['user_firstname']);
	$user_lastname = trim($_POST['user_lastname']);
	$password = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);

	if (!empty($username) && !empty($user_firstname) && !empty($user_lastname) && !empty($password) && !empty($confirm_password)) {

		if ($password == $confirm_password) {

			$insertQuery = insertNewUserAccount($pdo, $username, $user_firstname, $user_lastname, password_hash($password, PASSWORD_DEFAULT));
			$_SESSION['message'] = $insertQuery['message'];

			if ($insertQuery['status'] == '200') {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../login.php");
			}

			else {
				$_SESSION['message'] = $insertQuery['message'];
				$_SESSION['status'] = $insertQuery['status'];
				header("Location: ../register.php");
			}

		}
		else {
			$_SESSION['message'] = "Please make sure both passwords are equal";
			$_SESSION['status'] = '400';
			header("Location: ../register.php");
		}

	}

	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}


// logging in the system
if (isset($_POST['loginUserAccountBtn'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) && !empty($password)) {

		$loginQuery = checkIfUserAccountExists($pdo, $username);
		$userIDFromDB = $loginQuery['userInfoArray']['user_id'];
		$usernameFromDB = $loginQuery['userInfoArray']['username'];
		$passwordFromDB = $loginQuery['userInfoArray']['password'];

		if (password_verify($password, $passwordFromDB)) {
			$_SESSION['user_id'] = $userIDFromDB;
			$_SESSION['username'] = $usernameFromDB;
            insertOnActionLog($pdo, $_SESSION['username'], " has logged in the system.");
			header("Location: ../index.php");
		}
		else {
			$_SESSION['message'] = "Username/password invalid";
			$_SESSION['status'] = "400";
			header("Location: ../login.php");
		}
	}
	else {
		$_SESSION['message'] = "Please make sure there are no empty input fields";
		$_SESSION['status'] = '400';
		header("Location: ../register.php");
	}

}


// insertion of data
if (isset($_POST['insertTeacherBtn'])) {
	$insertTeacher = insertTeacher($pdo,$_POST['first_name'], $_POST['last_name'], $_POST['email'], 
	$_POST['gender'], $_POST['date_of_birth'], $_POST['phone_num'], $_POST['highest_educational_attainment'], $_POST['institution'], $_POST['year_graduated'], $_POST['licensed']);

	if ($insertTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $insertTeacher['message'];
        insertOnActionLog($pdo, $_SESSION['username'], " inserted a new teacher application data for {$_POST['first_name']} {$_POST['last_name']}");
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $insertTeacher['message'];
	}
}


// editing of data
if (isset($_POST['editTeacherBtn'])) {
	$editTeacher = editTeacher($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], 
	$_POST['gender'], $_POST['date_of_birth'], $_POST['phone_num'], $_POST['highest_educational_attainment'], $_POST['institution'], $_POST['year_graduated'], $_POST['licensed'], $_GET['id']);

	if ($editTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $editTeacher['message'];
        insertOnActionLog($pdo, $_SESSION['username'], " edited a teacher's data for {$_POST['first_name']} {$_POST['last_name']}");
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $editTeacher['message'];
	}
}


// deletion of data
if (isset($_POST['deleteTeacherBtn'])) {
	$deleteTeacher = deleteTeacher($pdo,$_GET['id']);

	if ($deleteTeacher['statusCode'] === 200) { //if status code is 200, it means that the action is successfully executed.
		$_SESSION['message'] = $deleteTeacher['message'];
        insertOnActionLog($pdo, $_SESSION['username'], " deleted a data");
		header("Location: ../index.php");
	}
	else { //else status code is 400, it means that the action is unsuccessfully executed or an error occurred.
		$_SESSION['message'] = $deleteTeacher['message'];
	}
}

// searching of data
if (isset($_GET['searchBtn'])) {
	$searchForATeacher = searchForATeacher($pdo, $_GET['searchInput']);
	foreach ($searchForATeacher as $row) {
		echo "<tr> 
				<td>{$row['id']}</td>
				<td>{$row['first_name']}</td>
				<td>{$row['last_name']}</td>
				<td>{$row['email']}</td>
				<td>{$row['gender']}</td>
				<td>{$row['date_of_birth']}</td>
				<td>{$row['phone_num']}</td>
				<td>{$row['highest_educational_attainment']}</td>
				<td>{$row['institution']}</td>
				<td>{$row['year_graduated']}</td>
				<td>{$row['licensed']}</td>
			  </tr>";
	}
}

?>