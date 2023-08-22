<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <script>
      function validateForm() {
        var password = document.forms["signupForm"]["password"].value;
        var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;
        if (password != confirmPassword) {
          alert("Password and Confirm Password do not match.");
          return false;
        }
      }
    </script>
  </head>
  <body>
    <h1>Signup</h1>
    <form name="signupForm" action="process_signup.php" method="POST" onsubmit="return validateForm()">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="organization">Organization Name:</label>
      <input type="text" id="organization" name="organization" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>
      <br>
      <input type="submit" value="Signup">
    </form>
  </body>
</html> -->







<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
      }

      h1 {
        color: #333;
        text-align: center;
      }

      form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      }

      label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
      }

      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
    <script>
      // Your validation script here
      function validateForm() {
        var password = document.forms["signupForm"]["password"].value;
        var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;
        if (password != confirmPassword) {
          alert("Password and Confirm Password do not match.");
          return false;
        }
      }
    </script>
  </head>
  <body>
    <h1>Signup</h1>
    <form name="signupForm" action="process_signup.php" method="POST" onsubmit="return validateForm()">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="organization">Organization Name:</label>
      <input type="text" id="organization" name="organization" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="confirmPassword" required>
      <br>
      <input type="submit" value="Signup">
    </form>
  </body>
</html>
