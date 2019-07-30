<?php
require 'conn.php';
if(isset($_POST['action'])){
    $complaintID=$_GET['id'];
    $newAction = $_POST['action'];

$sql6 = "UPDATE `complaint` SET `action` = '$newAction' WHERE `id` = $complaintID ";
if($query_run = mysqli_query($mysql_connect, $sql6))
{   
   

  $msg6= "Succesffuly updated your complaint and Logged Out Successfully!"; 
  echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('$msg6');
    window.location.replace(\"employee_login.php\");
</SCRIPT>";
}
else
{
    $msg1 =  'Sorry, we couldn\'t update your complaint at this time. Try again later.';
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
    <title>Edit Complaint Employee</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Edit Complaint Employee</h1></center>
    <?php 
      require 'conn.php';
      if(isset($_GET['id'])){
        $complaintID=$_GET['id'];
      }
        $sql="SELECT * FROM complaint WHERE id='$complaintID'";
        $result=mysqli_query($mysql_connect,$sql);
         while($results=mysqli_fetch_array($result)){
                $tobeUpdatedAction = $results['action'];
                }
      ?> 
    <form method="post" action="">
  
    <div class="form-group">
      <label for="inputAction">Select Action on Complaint</label>
      <select id="inputAction"  class="form-control" name="action">
        <option selected disabled value = "<?php echo $tobeUpdatedAction; ?>">Previous Action was <?php echo $tobeUpdatedAction; ?></option>
        <option value="pending">pending</option>
        <option value="solved">solved</option>
      </select>
    </div>

  
  <button type="submit" class="btn btn-primary">Update</button>
  
</form>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>