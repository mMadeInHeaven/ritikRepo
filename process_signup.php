<?php
// process_signup.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $org_name = $_POST['organization'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password=$_POST['confirmPassword'];
  // Validate the form data
  $errors = [];
  if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters long";
  }
  if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>.?\/~]/', $password)) {
    $errors[] = "Password must contain a special character";
  }
  if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match";
  }

  // If there are any validation errors, redirect back to the signup form with error messages
  if (count($errors) > 0) {
    session_start();
    $_SESSION['signup_errors'] = $errors;
    header('Location: signup.php');
    echo "$errors[0]";
    exit();
  }

 require("dbconnect.php");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Create a new database and tables for the user
  $user_dbname = $username . "_db";
  $sql = "CREATE DATABASE " . $user_dbname;
  if (mysqli_query($conn, $sql)) {
    // Successfully created database, so now create the user_info table
    $sql = "CREATE TABLE " . $user_dbname . ".user_info (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      org_name VARCHAR(255) NOT NULL,
      username VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL
    )";

    if (mysqli_query($conn, $sql)) {
      // Successfully created table, so now insert the user's info into the user_info table
      $sql = "INSERT INTO " . $user_dbname . ".user_info (org_name, username, password) VALUES ('$org_name', '$username', '" . password_hash($password, PASSWORD_DEFAULT) . "')";

      if (mysqli_query($conn, $sql)) {
        // Successfully inserted user info into table, so redirect to login page
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // $hashed_password = $password;
        $sql="INSERT INTO gym.users (username, password,user_dbname) 
        VALUES ('$username', '$hashed_password','$user_dbname');";
        $result=mysqli_query($conn,$sql);
        
      } else {
        // Error inserting user info into table
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      // Error creating table
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    // Error creating database
    echo "Error creating database: the username may already exist my bruv " . mysqli_error($conn);
  }


$sql1="CREATE TABLE $user_dbname.`membership` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `entry_date` date NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `image_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";
$sql2="CREATE TABLE $user_dbname.`attendance` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `membership` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";
$sql3="CREATE TABLE $user_dbname.`cash_payment` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int(6) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `cash_payment_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `membership` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";
if(mysqli_query($conn,$sql1)&& mysqli_query($conn,$sql2)&& mysqli_query($conn,$sql3))
{echo"table created";
  session_start();
  $_SESSION["dbname"]=$user_dbname;
  $_SESSION["username"]=$username;
  header('Location: index.php');
        exit();
}




  

  // Close the database connection
  mysqli_close($conn);
}
?>
