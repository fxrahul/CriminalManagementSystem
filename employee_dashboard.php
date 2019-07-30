<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Choose Operation</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Choose Operation</h1></center>
    <?php 
      require 'conn.php';
      if(isset($_GET['id'])){
        $employeeID=$_GET['id'];
      }
      ?>
  
  <center>
  <a href="edit_employee_profile.php?id=<?php echo $employeeID; ?>" class="btn btn-secondary btn-primary active" role="button" aria-pressed="true">Edit Profile</a>
  <a href="view_assigned_complaint_to_employee.php?id=<?php echo $employeeID; ?>" class="btn btn-secondary btn-primary active" role="button" aria-pressed="true">View Assigned Complaint</a>
  <a href="employee_login.php" class="btn btn-secondary btn-primary active" role="button" aria-pressed="true">Log Out</a>

</center>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>