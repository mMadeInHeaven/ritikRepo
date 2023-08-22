<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<?php

include("dbconnectuser.php");

$name = $_POST['name'];
$age = $_POST['age'];
$entry_date = $_POST['entry_date'];
$contact_number = $_POST['contact_number'];
$image_url = '';



if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
	// code to upload the file and set $image_url
	$temp_name = $_FILES['image']['tmp_name'];
  $image_name = $_FILES['image']['name'];
  $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
  $image_url = 'images/' . uniqid() . '.' . $image_extension;
  move_uploaded_file($temp_name, $image_url);
  } 
  
  








// Insert the data into the database
$sql = "INSERT INTO membership ( name, age, entry_date, contact_number,image_url) VALUES ( '$name', '$age', '$entry_date', '$contact_number','$image_url')";
if (mysqli_query($conn, $sql)) {
	echo "Member added successfully!";
	echo $image_url;
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>

<a href="membership.php">Members</a>