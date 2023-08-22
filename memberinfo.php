<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<?php include("navigations.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .table-container {
            max-width: 60%;
            margin: 0 auto;
        }
        .table-container table {
            width: 100%;
        }
        .table-container th, .table-container td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <table class="myTableJ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Date of Entry</th>
                    <th>Contact Number</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("dbconnectuser.php");
                $query = "SELECT * FROM membership";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_array($result)) {
                    if (isset($_POST['submit']) && strpos(strtolower($row['name']), strtolower($search)) === false) {
                        continue; // Skip this row if it doesn't match the search query
                    }
                    // Display the row in the table
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['entry_date'] . "</td>";
                    echo "<td>" . $row['contact_number'] . "</td>";
                    echo "<td><img src='" . $row['image_url'] . "' width='50' height='50'></td>";
                    echo "<td><a href='remove_member.php?id=" . $row['id'] . "'>Remove</a></td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <?php require("attendance_record.php");
        include("dbconnectuser.php");
    //    $sql = "SELECT cp.member_id, MAX(cp.payment_date) AS last_payment_date, cp.amount FROM cash_payment cp GROUP BY cp.member_id";
    // $sql ="SELECT cp.member_id, MAX(cp.payment_date) AS last_payment_date, cp.amount, a.attendance_count
    // FROM cash_payment cp
    // LEFT JOIN (
    //     SELECT member_id, COUNT(DISTINCT date) AS attendance_count
    //     FROM attendance
    //     GROUP BY member_id
    // ) a ON cp.member_id = a.member_id
    // GROUP BY cp.member_id
    // ";
    $sql = "SELECT cp.member_id, MAX(cp.payment_date) AS last_payment_date, cp.amount, cp.days_remaining, a.attendance_count
    FROM cash_payment cp
    LEFT JOIN (
        SELECT member_id, COUNT(DISTINCT date) AS attendance_count
        FROM attendance
        GROUP BY member_id
    ) a ON cp.member_id = a.member_id
    GROUP BY cp.member_id
";

        
        $result2 = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result2) > 0) {
            // Display table of members and their last payment dates
            echo "<table class='myTableJ'>";
            echo "<thead><tr><th>ID</th><th>Last Payment Date</th><th>Amount</th><th>days remaining</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result2)) {
                echo "<tr>";
                echo "<td>" . $row['member_id'] . "</td>";
                echo "<td>" . ($row['last_payment_date'] ? date('Y-m-d', strtotime($row['last_payment_date'])) : 'N/A') . "</td>";
                echo "<td>" . ($row['amount'] ? $row['amount'] : 'N/A') . "</td>";


                

                // if ($row['amount']) {
                //     $daysRemaining = floor($row['amount'] / 100) - $row['attendance_count'];
                //     echo "<td>" . $daysRemaining . "</td>";
                // } else {
                //     echo "<td>N/A</td>";
                // }
                if ($row['amount']) {
                    $daysRemaining = $row['days_remaining'] - $row['attendance_count'];
                    echo "<td>" . $daysRemaining . "</td>";
                } else {
                    echo "<td>N/A</td>";
                }
                

                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No members found.";
        }
        mysqli_close($conn);
        ?>
    </div>

    <?php
    require("jquery.php");
    

   
    ?>

    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
