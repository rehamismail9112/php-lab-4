<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			color: #333;
			text-align: center;
			margin-top: 30px;
		}
		table {
			margin: 30px auto;
			border-collapse: collapse;
			width: 80%;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0,0,0,0.1);
		}
		th, td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: left;
		}
		th {
			background-color: #333;
			color: #fff;
		}
		a.btn {
			display: block;
			margin: 30px auto;
			padding: 10px 20px;
			background-color: blue;
			color: #fff;
			text-align: center;
			text-decoration: none;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
			transition: all 0.3s ease-in-out;
			width: 200px;
		}
		a.btn:hover {
			background-color: #fff;
			color: #333;
			border: 1px solid #333;
		}
	</style>
</head>
<body>
	<h1>User Details</h1>

	<a href="./user_reqist_page.php" class="btn">Add new user</a>

	<?php
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "db2";
		$conn = mysqli_connect($host, $user, $password, $database);

		if (isset($_POST['submit'])) {
			$user_id = $_POST['#'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$subscribe = [];
			$sql = "INSERT INTO users (user_id,name, email, gender) VALUES ('user_id','$name', '$email', '$gender')";

			if (mysqli_query($conn, $sql)) {
				echo "<p>Record added successfully.</p>";
			} else {
				echo "<p>Error: ". mysqli_error($conn) . "</p>";
			}
		}

		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<tr><th>#</th><tr><th>Name</th><th>Email</th><th>Gender</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row[''] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "<p>No results found.</p>";
		}

		mysqli_close($conn);
	?>

</body>
</html>