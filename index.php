<!-- 

<!DOCTYPE html>
<html>
  <head>
  <style>
      /* Style the form */
      form {
        max-width: 30%;
        margin: 0 auto;
        border: 2px solid black;
        box-shadow: 0 0 10px black;
        padding: 20px;
      }
      .signup-button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #f44336;
			color: #fff;
			text-decoration: none;
			border-radius: 5px;
		}
    </style>
    <title>Login</title>
  </head>
  <body>
  


    <div class="container">
      <form action="process_login.php" method="POST">
        <div class="form-group">
        <h1 class="blockquote">Login</h1>
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" value="">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" value="">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <div>
      <p>Don't have an account? <a href="signup.php" class="signup-button">Signup</a></p>
    </div>
    </div>
      </form>
      
  </body>
</html>
 -->


 <?php
include("bootstrap.php");
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    /* Style the form */
    form {
      max-width: 30%;
      margin: 0 auto;
      border: 2px solid black;
      box-shadow: 0 0 10px black;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 10px;
    }
    
    /* Style the form container */
    .container {
      background-image: url("gym-background.jpg"); /* Replace with the path to your gym-related background image */
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    /* Style the gym logo */
    .logo {
      text-align: center;
      margin-bottom: 30px;
    }
    
    /* Style the form inputs */
    .form-group label {
      color: #333;
      font-weight: bold;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    
    /* Style the login button */
    .btn-login {
      display: inline-block;
      padding: 10px 20px;
      background-color: #f44336;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }
    
    /* Style the signup link */
    .signup-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #333;
      font-weight: bold;
    }
  </style>
  <title>Gym Login</title>
</head>
<body>
  <div class="container">
    <form action="process_login.php" method="POST">
      <div class="logo">
        <img src="images/logo.jpg" alt="Gym Logo" width="150">
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" value="">
      </div>
      <button type="submit" class="btn btn-login">Login</button>
      <div class="signup-link">
        <p>Don't have an account? <a href="signup.php">Signup</a></p>
      </div>
    </form>
  </div>
</body>
</html>
