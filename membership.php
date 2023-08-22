<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>


<style>
  .myTable {
  border: 10px ;
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


<!DOCTYPE html>
<html>
<head>
	<title>Gym Management System - Member Registration</title>
	<link rel="stylesheet" href="style2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault(); // Prevent form submission
        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(this);

        $.ajax({
          type: 'POST',
          url: url,
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            alert('Member added successfully!');
            form[0].reset(); // Reset the form fields
          },
          error: function(xhr, status, error) {
            alert('Error occurred. Please try again later.');
            console.log(error);
          }
        });
      });
    });
  </script>
</head>

<body>
	
	

<div class="container mt-5 , myTable">
  <h2>Addition?? have an awesome time</h2>
  <form method="post" action="process_member.php" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Age:</label>
      <input type="number" class="form-control" id="age" name="age" required>
    </div>
    <div class="mb-3">
      <label for="entry_date" class="form-label">Date of Entry:</label>
      <input type="date" class="form-control" id="entry_date" name="entry_date" required>
    </div>
    <div class="mb-3">
      <label for="contact_number" class="form-label">Contact Number:</label>
      <input type="text" class="form-control" id="contact_number" name="contact_number" required>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">PPsizephoto:</label>
      <input type="file" class="form-control" id="image" name="image" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



	

	
</body>
</html>
