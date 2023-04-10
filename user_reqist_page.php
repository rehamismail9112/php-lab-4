<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 20px;
		}
		input[type=text], input[type=email] {
			width: 250px;
			padding: 10px;
			margin-bottom: 20px;
			border: none;
			border-radius: 5px;
			box-shadow: 1px 1px 5px grey;
		}
		input[type=radio], input[type=checkbox] {
			margin-right: 10px;
		}
		input[type=submit], input[type=button] {
			padding: 10px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type=submit]:hover, input[type=button]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>

	<div class="registration-form">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<h1>User Registration Form</h1>
			<p>Please fill this form and submit to add user record to the database.</p>
			<label for="name">Name:</label> <br>
			<input type="text" name="name" required><br>

			<label for="email">Email:</label> <br>
			<input type="email" name="email" required><br>

			<label for="gender">Gender:</label> 
			<input type="radio" id="male" name="gender" value="male">
			<label for="male">Male</label>
			<input type="radio" id="female" name="gender" value="female">
			<label for="female">Female</label><br>

			<label for="mailstatus"  >Receive email from us: </label>
			<input type="checkbox"  value="on" name="mailstatus"><br>

			<input type="submit" name="submit" value="Submit">
			<br>
			<input type="button" value="Cancel" onclick="window.location.href='./index2.php'"> 
			<br>
		</form>
	</div>

	<?php
	// Check if form is submitted
	if (isset($_POST['submit'])) {
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db2";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		


		// Get form data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		//$mailstatus = isset($_POST['mailstatus']) ? yes : no;

		if(isset($_POST['mailstatus']) && $_POST['mailstatus'] == 'on') {
			$mailstatus = 'yes';
		  } else {
			$mailstatus = 'no';
		  }
		

		// Insert data into database
		$sql = "INSERT INTO  users (name, email, gender,mailstatus) VALUES ('$name', '$email', '$gender','$mailstatus')";

	
		
	

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	?>

</body>
</html>