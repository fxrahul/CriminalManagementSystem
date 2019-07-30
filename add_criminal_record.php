<?php 
require 'conn.php';
if(isset($_POST['userName'])){
    $criminalName = $_POST['userName'];
    $criminalCases = $_POST['cases'];

    $criminalPhoto = $_FILES['Image']['name'];
    $Target="img/".basename($_FILES['Image']['name']);

    $sql9 = "INSERT INTO criminal_record VALUES ('','$criminalName','$criminalCases','$criminalPhoto')";

    if($query_run = mysqli_query($mysql_connect, $sql9))
    {
      move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
      $msg6= "Succesffuly Added! "; 
      echo ("<script type='text/javascript'>
        window.location.href = 'admin_dashboard.php';
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
    <title>User Login</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>User Login</h1></center>
    <form method="post" action="" enctype="multipart/form-data">
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">Criminal Name</label>
      <input type="text" class="form-control" id="name" name="userName" placeholder="Name">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="cases">Number of Case</label>
      <input type="text" class="form-control" id="name" name="cases"  placeholder="No of Case">
    </div>
  </div>

  <div class="form-group col-md-12">
    <label for="exampleFormControlFile1">Criminal Photograph</label>
    <input required type="file" class="form-control-file"  name="Image">
  </div>
</div>
  
  <center>
  <button type="submit" class="btn btn-primary">Add</button>
  </center>
</form>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>