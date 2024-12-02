<?php  
require_once 'dbConfig.php';


// to check if user exists
function checkIfUserAccountExists($pdo, $username) {
	$response = array();
	$sql = "SELECT * FROM accounts WHERE username = ?";
	$stmt = $pdo->prepare($sql);

	if ($stmt->execute([$username])) {

		$userInfoArray = $stmt->fetch();

		if ($stmt->rowCount() > 0) {
			$response = array(
				"result"=> true,
				"status" => "200",
				"userInfoArray" => $userInfoArray
			);
		}
		else {
			$response = array(
				"result"=> false,
				"status" => "400",
				"message"=> "User doesn't exist from the database"
			);
		}
	}

	return $response;
}


// inserting new user account
function insertNewUserAccount($pdo, $username, $user_firstname, $user_lastname, $password) {
	$response = array();
	$checkIfUserAccountExists = checkIfUserAccountExists($pdo, $username); 

	if (!$checkIfUserAccountExists['result']) {

		$sql = "INSERT INTO accounts (username, user_firstname, user_lastname, password) 
		VALUES (?,?,?,?)";

		$stmt = $pdo->prepare($sql);

		if ($stmt->execute([$username, $user_firstname, $user_lastname, $password])) {
			$response = array(
				"status" => "200",
				"message" => "User successfully inserted!"
			);
		}
		else {
			$response = array(
				"status" => "400",
				"message" => "An error occured with the query!"
			);
		}
	}
    else {
		$response = array(
			"status" => "400",
			"message" => "User already exists!"
		);
	}

	return $response;
}


// to insert data into action log in the database
function insertOnActionLog($pdo, $username, $action_made) {
    $sql = "INSERT INTO action_log (username, action_made) 
            VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$username, $action_made]);

    if ($executeQuery) {
        return true;
    }
}


// to display teacher's data
function getAllTeachersData($pdo) {
	$sql = "SELECT * FROM search_teacher_data 
			ORDER BY first_name ASC";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	
    if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

// accessing teacher's data by ID
function getTeacherByID($pdo, $id) {
	$sql = "SELECT * from search_teacher_data WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

// searching for teacher's data
function searchForATeacher($pdo, $searchQuery) {
	
	$sql = "SELECT * FROM search_teacher_data WHERE 
			CONCAT(first_name, last_name, email, gender,
				date_of_birth, phone_num, highest_educational_attainment, institution, year_graduated, licensed) 
			LIKE ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute(["%".$searchQuery."%"]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

// inserting a record
function insertTeacher($pdo, $first_name, $last_name, $email, $gender, $date_of_birth, 
    $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed) {

	$sql = "INSERT INTO search_teacher_data 
			(first_name,
		    last_name,
			email,
			gender,
			date_of_birth,
			phone_num,
			highest_educational_attainment,
			institution,
            year_graduated,
            licensed)
		    VALUES (?,?,?,?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $date_of_birth, 
                            $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed]);
	
        if ($executeQuery) {
			return ['message' => "A new Teacher's data is successfully inserted.",
					'statusCode' => 200];
		}
		else {
			return ['message' => "An error occurred",
			'statusCode' => 400];
		}
}

// editing of record
function editTeacher($pdo, $first_name, $last_name, $email, $gender, $date_of_birth, 
    $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed, $id) {

	$sql = "UPDATE search_teacher_data
				SET first_name = ?,
					last_name = ?,
					email = ?,
					gender = ?,
					date_of_birth = ?,
					phone_num = ?,
                    highest_educational_attainment = ?,
					institution = ?,
					year_graduated = ?,
					licensed = ?
				WHERE id = ? ";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $email, $gender, $date_of_birth, 
                            $phone_num, $highest_educational_attainment, $institution, $year_graduated, $licensed, $id]);

		if ($executeQuery) {
			return ['message' => "A Teacher's data is successfully edited.",
					'statusCode' => 200];
		}
		else {
			return ['message' => "An error occurred",
					'statusCode' => 400];
		}
}

// deletion of record
function deleteTeacher($pdo, $id) {
	$sql = "DELETE FROM search_teacher_data 
			WHERE id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$id]);

	if ($executeQuery) {
		return ['message' => "A Teacher's data is successfully deleted.",
				'statusCode' => 200];
	}
	else {
		return ['message' => "An error occurred",
		'statusCode' => 400];
	}
}
?>