<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<?php
include("dbconnectuser.php");

// Check if the id parameter is set
if (isset($_GET['id'])) {
    // Sanitize the id parameter to prevent SQL injection attacks
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Delete the member from the membership table
    $sql = "DELETE FROM membership WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Member removed successfully.";
        
    } else {$sql = "DELETE FROM attendance WHERE member_id = '$id'";
        if(mysqli_query($conn,$sql)){
            echo "Member attendance reoved successfully.";
            $sql="DELETE FROM cash_payment where member_id='$id' ";
            if(mysqli_query($conn,$sql)){
                echo"all payments destroyed";
            }
        }else{
            echo "member attrendance didnot get removed";
            echo "Error removing member: " . mysqli_error($conn);
        }
        
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>

<a href="membership.php">Members</a>
