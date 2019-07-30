<?php
require 'conn.php';
if(isset($_POST['userEmail'])){
  $employeeEmail = $_POST['userEmail'];
  $employeePasswordWoHash = $_POST['userPassword'];
  $employeePassword = md5($employeePasswordWoHash);
  $employeeName = $_POST['userName'];

  $employeePhoto = $_FILES['Image']['name'];
  $Target="img/".basename($_FILES['Image']['name']);

  $employeeAddress = $_POST['userAddress'];
  $employeeRole = $_POST['userRole'];
  $employeeassignedComplaint = "None";

  
  $sql="INSERT into employee VALUES ('','$employeeEmail','$employeePassword','$employeeName','$employeePhoto','$employeeAddress','$employeeRole','$employeeassignedComplaint')";
  
  // $result=mysqli_query($mysql_connect,$sql);
  if($query_run = mysqli_query($mysql_connect, $sql))
    {
      move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
      $msg6= "Succesffuly Registered user"; 
      echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$msg6');
        window.location.replace(\"admin_dashboard.php\");
    </SCRIPT>";
    }
    else
    {
        $msg1 =  'Sorry, we couldn\'t register user at this time. Try again later.';
        echo "<script type='text/javascript'>alert('$msg1');</script>";
    }
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Create Employee</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Create Employee</h1></center>
    <form method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  id="exampleInputEmail1" name="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" name="userPassword" placeholder="Password">
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">User Name</label>
      <input type="text" class="form-control" id="name" name="userName" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Employee Photograph</label>
    <input type="file" class="form-control-file"  name="Image">
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="userAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
      <label for="inputRole">Select Role of Employee</label>
      <select id="inputRole"  class="form-control" name="userRole">
        <option disabled selected>Choose...</option>
        <option value="DGP">Director General of Police (DGP)</option>
        <option value = "IGP/SIGP">Inspector General Of Police/ Special Inspector General Of Police (IGP/SIGP)</option>
        <option value="SP/DCP">Superintendent of Police/Deputy Commissioner Of Police (SP/DCP)</option>
        <option value="DSP/ACP">Deputy Superintendent of Police/Assistant Commissioner Of Police (DSP/ACP) </option>
        <option value="PI">Police Inspector (P.I.)</option>
        <option value="PC">Police Constable (PC)</option>
      </select>
    </div>
  
    <center> <button type="submit" class="btn btn-primary">Create</button>  </center>

  </form>

  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>