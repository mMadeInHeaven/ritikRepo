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
	<title>Add Cash Payment</title>
    <?php $insert=false;

	require("navigations.php");

	require("dbconnectuser.php");
	

	// // Check if form was submitted
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//     // Get form data
	//     $member_id = $_POST["member_id"];
	//     $payment_date = $_POST["payment_date"];
	//     $amount = $_POST["amount"];

	//     // Insert payment record into database
	//     $sql = "INSERT INTO cash_payment (member_id, payment_date, amount)
	//             VALUES ('$member_id', '$payment_date', '$amount')";
	//     if (mysqli_query($conn, $sql)) {
	//         $insert=true;
            
	//     } else {
	//         echo "Error adding payment: " . mysqli_error($conn);
	//     }
	// }

	// // Close database connection
	// mysqli_close($conn);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Retrieve the member ID and payment amount from the form
		$memberID = $_POST['member_id'];
		$paymentAmount = $_POST['amount'];
	
		// Insert the payment record into the cash_payment table
		$sql = "INSERT INTO cash_payment (member_id, amount, payment_date) VALUES ('$memberID', '$paymentAmount', NOW())";
		if (mysqli_query($conn, $sql)) {
			echo "Payment recorded successfully.";
	
			// Update the days remaining for the member
			$updateSql = "UPDATE cash_payment cp
						  LEFT JOIN (
							  SELECT member_id, COUNT(DISTINCT date) AS attendance_count
							  FROM attendance
							  GROUP BY member_id
						  ) a ON cp.member_id = a.member_id
						  SET cp.days_remaining = FLOOR(cp.amount / 100) - a.attendance_count
						  WHERE cp.member_id = '$memberID'";
			if (mysqli_query($conn, $updateSql)) {
				echo "Days remaining updated successfully.";
			} else {
				echo "Error updating days remaining: " . mysqli_error($conn);
			}
		} else {
			echo "Error recording payment: " . mysqli_error($conn);
		}
	}
	


	?>
	<link rel="stylesheet" href="style2.css">
	
</head>
<body>
	<?php
if($insert){
	?><div class="alert alert-warning alert-dismissible fade show" role="alert" >
	<strong>Success</strong> Payment successfully done
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
 <?php 
}
?>
	

<div class="container mt-5">
  <h2>We gotta run this place!!</h2>
  <form class="form-outline p-5" action="add_cash_payment.php" method="post" style="border: 2px ; box-shadow: 0 0 10px black;">
    <div class="form-group">
      <label for="member_id">Member ID:</label>
      <input type="text" class="form-control" id="member_id" name="member_id" placeholder="Enter member ID" required>
    </div>
    <div class="form-group">
      <label for="payment_date">Payment Date:</label>
      <input type="date" class="form-control" id="payment_date" name="payment_date" required>
    </div>
    <div class="form-group">
      <label for="amount">Amount:</label>
      <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
    </div>
    <button type="submit" class="btn btn-primary" style="background-color: blue; border: none; border-radius: 5px; cursor: pointer; padding: 10px 20px;" >Add Payment</button>
  </form>
</div>


	



	<?php
	
	?>
</body>
</html>
