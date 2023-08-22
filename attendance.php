<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<style>
    .myTable {
  border: 2px solid #007bff;
  box-shadow: 0px 0px 15px black;
  transition: box-shadow 0.3s ease-in-out;
}
.myTable:hover {
  box-shadow: 0px 0px 25px purple;
}
</style>



<?php
	require("navigations.php");
	?>


<?php
// Connect to database
include("dbconnectuser.php");


// Get list of members
$sql = "SELECT id, name FROM membership";
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // Display form for marking attendance
//     echo "<form method='post' action='submit_attendance.php'>";
//     echo "<table class='myTable'>";
//     echo "<tr><th>ID</th><th>Name</th><th>Present</th></tr>";
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "<tr>";
//         echo "<td>" . $row['id'] . "</td>";
//         echo "<td>" . $row['name'] . "</td>";
//         echo "<td><input type='checkbox' name='attendance[]' value='" . $row['id'] . "'></td>";
//         echo "</tr>";
//     }
//     echo "</table>";
//     echo "<input type='submit' name='submit' value='Submit'>";
//     echo "</form>";
// } else {
//     echo "No members found.";
// }
?>
<?php
if (mysqli_num_rows($result) > 0) {
    // Display form for marking attendance
    echo "<form method='post' action='submit_attendance.php'>";
    echo "<div class='container my-5' style='max-width: 40%;'>";
    echo "<table class='table table-bordered table-hover table-responsive-lg myTable myTableJ'>";
    echo "<thead class='thead-dark'><tr><th>ID</th><th>Name</th><th>Present</th></tr></thead>";
    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td><input type='checkbox' name='attendance[]' value='" . $row['id'] . "'></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table></div>";
    echo "<div class='text-center'><button type='submit' name='submit' class='btn btn-primary mt-3'>Submit</button></div>";
    echo "</form>";
} else {
    echo "<p class='text-center'>No members found.</p>";
}
?>



<?php
// Close database connection
mysqli_close($conn);
?>


<?php

include("jquery.php");

?>