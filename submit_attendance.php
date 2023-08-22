<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<?php
include("dbconnectuser.php");


// Get current date
$date = date("Y-m-d");

// Insert attendance records into database
if (isset($_POST['attendance'])) {
    foreach ($_POST['attendance'] as $member_id) {
        $sql = "INSERT INTO attendance (member_id, date) VALUES ('$member_id', '$date')";
        mysqli_query($conn, $sql);
    }
}

// Close database connection
mysqli_close($conn);

// Redirect back to attendance.php
header("Location: attendance.php");
exit;
?>
