

<?php

// process_login.php

session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the username and password from the form
  $loginusername = $_POST['username'];
  $loginpassword = $_POST['password'];

  // Connect to the database
  require("dbconnect.php");

  // Check if the connection was successful
  
  // Prepare the SQL statement
  $sql = "SELECT * FROM gym.users WHERE username='$loginusername'";

  // Execute the SQL statement
  $result = mysqli_query($conn, $sql);

  // Check if there is a row with the given username
  if (mysqli_num_rows($result) == 1) {
    // Fetch the row from the result set
    $row = mysqli_fetch_assoc($result);
    $hashed_password=$row['password'];
    // Verify the input password against the stored hashed password
    if (password_verify($loginpassword,$hashed_password)) {
      // The login information is correct, so set the session variable to indicate that the user is logged in
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $loginusername;
      $_SESSION['user_dbname'] = $row['user_dbname'];

      // Redirect the user to the membership page
      header('Location: home.php');
    } else {echo "$loginusername";
      echo "$loginpassword";
      echo "$hashed_password";

      // The input password is incorrect, so display an error message
      echo "Incorrect password. Please try again.1";
    }
  } else {
    // The username is not found in the database, so display an error message
    echo "Incorrect username. Please try again.";
  }

  // Close the database connection
  mysqli_close($conn);
}

?>
