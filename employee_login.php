<?php
require 'conn.php';
if(isset($_POST['userEmail']) && isset($_POST['userPassword']))
{
	$email = $_POST['userEmail'];
  $password = $_POST['userPassword'];
  $msg3 = $email . " " . $password;
  // echo "<script type='text/javascript'>alert('$msg3');</script>";

	
	if(!empty($email) && !empty($password))
	{
		$password_hash = md5($password);
		$query = "SELECT id FROM `employee` WHERE email='".mysqli_real_escape_string($mysql_connect, $email)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
		if($query_run = mysqli_query($mysql_connect, $query))
		{
			$query_run = mysqli_query($mysql_connect, $query);
			
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
        $msg = 'Invalid username/password.';
        echo "<script type='text/javascript'>alert('$msg');</script>";

			}
			else if($query_num_rows==1)
			{
        $query = "SELECT id FROM `employee` WHERE email='".mysqli_real_escape_string($mysql_connect, $email)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
        $result = mysqli_query($mysql_connect, $query);
        $results = mysqli_fetch_array($result);
        $id = $results['id'];
				header('Location: employee_dashboard.php?id='.$id);
			}
		}
	}
	else
	{
    $msg1 =  'You must enter a username and password.';
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
    <title>Employee Login</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Employee Login</h1></center>
    <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name = "userEmail" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name = "userPassword" placeholder="Password">
  </div>
  
  <center>
  <button type="submit" class="btn btn-primary">Log In</button>
  </center>
</form>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>