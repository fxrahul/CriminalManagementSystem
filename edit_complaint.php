<?php
require 'conn.php';
if(isset($_POST['recordType'])){
    $complaintID=$_GET['id'];

    $sql3 = "SELECT * FROM complaint WHERE id = '$complaintID' ";
    $result = mysqli_query($mysql_connect,$sql3);
    $results = mysqli_fetch_array($result);
    $copyComplaintID = $results['id'];
    $copyCriminalName = $results['criminal_name'];
    $employeeCaseAssigned = $copyComplaintID."-".$copyCriminalName;

    $newComplaintType = $_POST['recordType'];
    $newAction = $_POST['action'];
    $newAssignedEmployee = $_POST['employeeAssigned'];
    $newEmployeeDetailsArray = explode('-', $newAssignedEmployee);
    $newEmployeeID = $newEmployeeDetailsArray[0];
    $newEmployeeName = $newEmployeeDetailsArray[1];
    $newEmployeeRole = $newEmployeeDetailsArray[2];
    $sql = "UPDATE `complaint` set `complaint_type` = '$newComplaintType', `action` = '$newAction', `assigned_to_employee` = '$newAssignedEmployee' WHERE id='$complaintID'";
    if($query_run = mysqli_query($mysql_connect, $sql))
    {   
        $sql1 = "UPDATE `employee` set assigned_complaint = '$employeeCaseAssigned' WHERE id = '$newEmployeeID' ";
        $result=mysqli_query($mysql_connect,$sql1);

      $msg6= "Succesffuly updated your complaint!"; 
      echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('$msg6');
        window.location.replace(\"view_complaints.php\");
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
    <title>Edit Complaint</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>Edit Complaint</h1></center>
    <?php 
      require 'conn.php';
      if(isset($_GET['id'])){
        $complaintID=$_GET['id'];
      }
        $sql="SELECT * FROM complaint WHERE id='$complaintID'";
        $result=mysqli_query($mysql_connect,$sql);
         while($results=mysqli_fetch_array($result)){
                $tobeUpdatedComplaintType = $results['complaint_type'];
                $tobeUpdatedAction = $results['action'];
                $tobeUpdatedAssignedToEmployee = $results['assigned_to_employee'];
                }
      ?> 

      <form method="post" action ="">
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputRecordType">Select Record Type</label>
      <select id="inputRecordType"  class="form-control" name="recordType">
        
        <option selected disabled value = "<?php echo $tobeUpdatedComplaintType; ?>">Previous Record Type was <?php echo $tobeUpdatedComplaintType; ?></option>
        <option value="FIR">FIR</option>
        <option value="CD">CD</option>
        <option value="CCD">CCD</option>
        <option value="CS">CS</option>
        </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputAction">Select Action on Complaint</label>
      <select id="inputAction"  class="form-control" name="action">
        <option selected disabled value = "<?php echo $tobeUpdatedAction; ?>">Previous Action was <?php echo $tobeUpdatedAction; ?></option>
        <option value="pending">pending</option>
        <option value="solved">solved</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputAction">Select Employee to Solve Case</label>
      <select id="inputAction"  class="form-control" name="employeeAssigned">
      <option disabled selected value = "<?php echo $tobeUpdatedAssignedToEmployee; ?>" >Previous Assigned Employee was <?php echo $tobeUpdatedAssignedToEmployee; ?> </option>
      <?php
          require 'conn.php';
            $sql="SELECT * from employee";
            $result=mysqli_query($mysql_connect,$sql);
           
            while($results=mysqli_fetch_array($result)){
                $employeeID = $results['id'];
              $employeeName=$results['name'];
              $employeeRole = $results['role'];
              $employee = $employeeID."-".$employeeName."-".$employeeRole;
          ?>
        <option ><?php echo $employee; ?></option>

        <?php } ?>
       
      </select>
    </div>
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