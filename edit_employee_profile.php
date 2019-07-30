<?php
require 'conn.php';
if(isset($_POST['userEmail'])){
  $employeeID=$_GET['id'];
  $employeeEmail = $_POST['userEmail'];
  $employeePasswordWoHash = $_POST['userPassword'];
  $employeePassword = md5($employeePasswordWoHash);
  $employeeName = $_POST['userName'];

  $employeePhoto = $_FILES['Image']['name'];
  $Target="img/".basename($_FILES['Image']['name']);

  $employeeAddress = $_POST['userAddress'];

  $sql = "UPDATE employee set `email` = '$employeeEmail', `password` = '$employeePassword', `name` = '$employeeName', `photo` = '$employeePhoto', `address` = '$employeeAddress' WHERE id = '$employeeID' ";
  if($query_run = mysqli_query($mysql_connect, $sql))
    {
      move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
      $msg6= "Succesffuly Updated "; 
      echo ("<script type='text/javascript'>
        window.location.href = 'employee_dashboard.php?id=$employeeID';
        window.alert('$msg6');
    </script>");
    }
    else
    {
        $msg1 =  'Sorry, we couldn\'t update at this time. Try again later.';
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
    <title>Edit Profile</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Edit Profile</h1></center>
    <?php 
      require 'conn.php';
      if(isset($_GET['id'])){
        $employeeID=$_GET['id'];
      }
        $sql="SELECT * FROM employee WHERE id='$employeeID'";
        $result=mysqli_query($mysql_connect,$sql);
         while($results=mysqli_fetch_array($result)){
              $copyEmail = $results['email'];
              $copyPassword = $results['password'];
              $copyName = $results['name'];
              $copyPhoto = $results['photo'];
              $copyAddress = $results['address'];
              $copyRole = $results['role'];
              $copyAssignedComplaint = $results['assigned_complaint'];
                }
      ?> 
    <form method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  id="exampleInputEmail1" name="userEmail" value = "<?php echo $copyEmail ?>" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" name="userPassword"  placeholder="Password">
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">User Name</label>
      <input type="text" class="form-control" id="name" name="userName" value = "<?php echo $copyName ?>" placeholder="Name">
    </div>
  </div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="exampleFormControlFile1">Previous Employee Photograph</label>
    <img src="img/<?php echo $copyPhoto ?>" width=170px; height=50px >
  </div>
  <div class="form-group col-md-6">
    <label for="exampleFormControlFile1">New Employee Photograph</label>
    <input required type="file" class="form-control-file"  name="Image">
  </div>
</div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="userAddress" value = "<?php echo $copyAddress ?>" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputRole">Role</label>
    <input readonly type="text" class="form-control" id="inputRole"  name="userRole" value = "<?php echo $copyRole ?>">
  </div>
  <div class="form-group">
    <label for="inputAssigned">Assigned Case</label>
    <input readonly type="text" class="form-control" id="inputAssigned" name="employeeAssignedComplaint" value = "<?php echo $copyAssignedComplaint ?>">
  </div>
  <center> <button type="submit" class="btn btn-primary">Update</button>  </center>

  </form>
  
  
  
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>