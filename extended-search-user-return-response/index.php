<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<?php
// if no user is logged in, it will redirect it to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); 
}

if (isset($_GET['searchBtn']) && !empty($_GET['searchInput'])) {
    $searchTerm = $_GET['searchInput'];
    // Log the search query performed by the user
    insertOnActionLog($pdo, $_SESSION['username'], "searched for '$searchTerm'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>

   <!-- Navigation Bar -->
   <nav>
        <div>
            Logged in as: <strong><?php echo $_SESSION['username']; ?></strong>
        </div>
        <div>
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">

        <!-- Display Success Message -->
        <?php if (isset($_SESSION['message'])) { ?>
            <p class="message"><?php echo $_SESSION['message']; ?></p>
            <?php unset($_SESSION['message']); ?>
        <?php } ?>

        <!-- Search Form -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <input type="text" name="searchInput" placeholder="Search by name">
            <input type="submit" name="searchBtn" value="Search">
        </form>

        <p>
            <a href="index.php">Clear Search Query</a> |
            <a href="insert.php">Insert New User</a>
        </p>

	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Date of Birth</th>
			<th>Phone Number</th>
			<th>Highest Educational Attainment</th>
			<th>Institution</th>
            <th>Year Graduated</th>
            <th>Licensed</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>

        <?php if (!isset($_GET['searchBtn'])) { ?>
			<?php $getAllTeachersData = getAllTeachersData($pdo); ?>
				<?php foreach ($getAllTeachersData as $row) { ?>
					<tr>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['phone_num']; ?></td>
						<td><?php echo $row['highest_educational_attainment']; ?></td>
						<td><?php echo $row['institution']; ?></td>
                        <td><?php echo $row['year_graduated']; ?></td>
                        <td><?php echo $row['licensed']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
							<a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a>
						</td>
					</tr>
			<?php } ?>

            <?php } else { ?>
			<?php $searchForATeacher =  searchForATeacher($pdo, $_GET['searchInput']); ?>
				<?php foreach ($searchForATeacher as $row) { ?>
					<tr>
                    	<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['date_of_birth']; ?></td>
						<td><?php echo $row['phone_num']; ?></td>
						<td><?php echo $row['highest_educational_attainment']; ?></td>
						<td><?php echo $row['institution']; ?></td>
                        <td><?php echo $row['year_graduated']; ?></td>
                        <td><?php echo $row['licensed']; ?></td>
						<td><?php echo $row['date_added']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
							<a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a>
						</td>
					</tr>
				<?php } ?>
		<?php } ?>	
		
	</table>
</body>
</html>