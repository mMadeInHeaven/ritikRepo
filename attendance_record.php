


<head>
<link rel="stylesheet" href="style2.css">
<style>
  .table-bordered,
  .table-bordered td,
  .table-bordered th {
    border-color: #00ccff !important;
  }
  
  .table-hover tbody tr:hover {
    background-color: #f5f5f5;
  }
  
  .table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
  }
</style>
</head>


<?php
    include("jquery.php");
	?>

<?php
// Connect to database
include("dbconnectuser.php");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get list of members and their attendance counts
$sql = "SELECT membership.id, membership.name, COUNT(DISTINCT attendance.date) AS attendance_count
        FROM membership LEFT JOIN attendance
        ON membership.id = attendance.member_id 
        GROUP BY membership.id
        ORDER BY membership.name
        ";
$result = mysqli_query($conn, $sql);
echo "<div class='container mt-5'>";
?>
 <div class="table-responsive" style="width: 40%; margin: 0 auto; border: 2px solid blue; box-shadow: 0 0 5px #00ccff;">
 <?php

if (mysqli_num_rows($result) > 0) {
    // Display table of attendance records
    ?>

    <table class="table table-hover table-bordered table-striped " class="myTableJ">
        <?php
    echo "<tr><th>ID</th><th>Name</th><th>Attendance Count</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
      $attendance_count = $row['attendance_count'];
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['attendance_count'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No attendance records found.";
}
echo "</div>";
// Close database connection
mysqli_close($conn);
?>

<?php

include("jquery.php");

?>