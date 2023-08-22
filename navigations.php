




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
  .navbar {
    background-color: black;
    font-family: Arial, sans-serif;
    transition: background-color 0.3s ease;
  }

  .navbar:not(:hover) {
    background-color: white;
  }

  .navbar-brand {
    color: #ffffff;
    font-weight: bold;
    font-size: 24px;
    transition: color 0.3s ease;
  }

  .navbar-nav .nav-link {
    color: #ffffff;
    font-size: 18px;
    margin-right: 15px;
    transition: color 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #c8cbcf;
  }

  .navbar:not(:hover) .navbar-nav .nav-link {
    color: #000000;
    transition: color 0.3s ease;
  }

  .navbar-toggler {
    border: none;
    outline: none;
  }

  .navbar-toggler-icon {
    background-color: #ffffff;
  }
  .navbar-logo {
  height: 40px; /* Adjust the height as per your requirement */
  width: auto; /* Allows the image to scale proportionally */
}
</style>



  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="images/logo.jpg" class="navbar-logo" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="membership.php">Member Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="attendance.php">Attendance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_cash_payment.php">Billings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="memberinfo.php">Member Info</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>
