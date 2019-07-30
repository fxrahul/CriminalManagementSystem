<?php
require 'conn.php';
if(isset($_POST['userName'])){
    $userID = $_POST['userID'];
    $userName = $_POST['userName'];
    $userAddress = $_POST['userAddress'];
    $userCity = $_POST['userCity'];
    $userState = $_POST['userState'];
    $userZip = $_POST['userZip'];
    $criminalName = $_POST['criminalName'];
    $complaintType = "Not Assigned By Admin Yet";
    $userComplaint = $_POST['userComplaint'];
    $action = "pending";
    $assignedEmployee = "No One";
    //store complaint

    $query = "INSERT INTO complaint  VALUES ('','$userID','$userName','$userAddress','$userCity','$userState','$userZip','$criminalName','$complaintType','$userComplaint','$action','$assignedEmployee') ";
    if($query_run = mysqli_query($mysql_connect, $query))
    {
      $num = "1";
      $numInt =(int) $num;
      $sql8 = "SELECT * FROM criminal_record WHERE `name` = '$criminalName' ";
      if($result8 = mysqli_query($mysql_connect,$sql8)){
      $result8 = mysqli_query($mysql_connect,$sql8);
      $results8 = mysqli_fetch_array($result8);
      $case = $results8['no_of_cases'];
      $casesInt = (int) $case;
      $cases = $casesInt + $numInt;
      $caseToConsider = (string) $cases;
      $sql7 = "UPDATE criminal_record SET `no_of_cases`= '$caseToConsider' ";
      $result7 = mysqli_query($mysql_connect,$sql7);
      }
      $msg6= "Succesffuly Registered your complaint, Soon Police Officer will take care of your complaint"; 
      echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$msg6');
        window.location.replace(\"login.php\");
    </SCRIPT>";
    }
    else
    {
        $msg1 =  'Sorry, we couldn\'t register your complaint at this time. Try again later.';
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
    <title>Register Complaint</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Register Your Complaint</h1></center>
    <form method="post" action="">
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">User ID</label>
      <input type="text" class="form-control" id="ID" name="userID" readOnly value=<?php if(isset($_GET['userID'])){ echo $_GET['userID']; } ?>>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">User Name</label>
      <input type="text" class="form-control" id="name" name="userName" placeholder="Name">
    </div>
  </div>
 
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="userAddress" placeholder="1234 Main St">
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control"  id="inputCity" name="userCity" placeholder="City">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" id="state" name = "userState" placeholder="State">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control"  id="inputZip" name = "userZip" placeholder="Zip">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="name">Criminal Name</label>
      <input type="text" class="form-control" id="c_name" name="criminalName" placeholder="Criminal Name">
    </div>

    
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Complaint</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name = "userComplaint" rows="5"></textarea>
  </div>

  
  <center><button type="submit" class="btn btn-primary">Submit</button></center>
</form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>