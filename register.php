<?php
require 'conn.php';
  if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){
    

  
      $email= $_POST['userEmail'];
      $password_without_hash = $_POST['userPassword'];
      $password = md5($password_without_hash);
    //   $msg4 = $email.$password;
                        //    echo "<script type='text/javascript'>alert('$msg4');</script>";



      
      if(!empty($email)&&!empty($password))
      {
                
                  $query = "SELECT email FROM user WHERE email = '$email' ";
                  $query_run = mysqli_query($mysql_connect, $query);
                  $query_num_rows = mysqli_num_rows($query_run);
                  if($query_num_rows>=1)
                  {
                      $msg =  'The email already exists.';
                      echo "<script type='text/javascript'>alert('$msg');</script>";
                  }
                  else
                  {
                      $query = "INSERT INTO user VALUES ('', '$email', '$password')";
                      
                      if($query_run = mysqli_query($mysql_connect, $query))
                      {
                            
                            // echo "<script type='text/javascript'>alert('$userID');</script>";
                        header('Location: index.php');
                      }
                      else
                      {
                          $msg1 =  'Sorry, we couldn\'t register you at this time. Try again later.';
                          echo "<script type='text/javascript'>alert('$msg1');</script>";
                      }
                  }
              
          
      }
      else
      {
          $msg3 = 'All fields are required.';
          echo "<script type='text/javascript'>alert('$msg3');</script>";

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
    <title>User SignUp</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Sign Up</h1></center>
    <form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control"  id="exampleInputEmail1" name="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  id="exampleInputPassword1" name="userPassword" placeholder="Password">
  </div>
  
  <center>
  <button type="submit" class="btn btn-primary">Sign Up</button>
  </center>
</form>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>