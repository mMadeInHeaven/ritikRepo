


<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gym Management System</title>
	<link rel="stylesheet" href="style.css">
	<style>
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background-color: #f1f1f1;
		}

		.main-content {
			background-color: white;
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			text-align: center;
		}

		.main-content h2 {
			font-size: 2.5rem;
			margin-bottom: 20px;
		}

		.main-content p {
			font-size: 1.2rem;
			margin-bottom: 20px;
		}

		.btn-primary {
			padding: 10px 30px;
			font-size: 1.5rem;
			border-radius: 30px;
			background-color: #ff4d00;
			border: none;
			color: white;
			transition: background-color 0.3s ease;
		}

		.btn-primary:hover {
			background-color: #ff3700;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="main-content">
			<h2>Welcome to the Gym Management System!</h2>
			<p>Please use the navigation menu above to access different sections of the system.</p>
			<p>Thank you for using the Gym Management System. If you have any questions or issues, please contact our support team for assistance.</p>
			<a href="membership.php" class="btn btn-primary">Get Started</a>
		</div>
	</div>
</body>
</html>
