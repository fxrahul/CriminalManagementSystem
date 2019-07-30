<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Complaints</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <center><h1>View Complaints</h1></center>
    <div class="table-responsive ">
    <table class="table table-bordered table-sm table-responsive">
        <thead>
          <tr>
              <th>No</th>
              <th>Compliant ID</th>
              <th>User ID</th>
              <th>User Name</th>
              <th>User Address</th>
              <th>User City</th>
              <th>User State</th>
              <th>User ZIP</th>
              <th>Criminal Name</th>
              <th>Complaint Type</th>
              <th>Complaint</th>
              <th>Action</th>
              <th>Assigned Employee</th>
              <th>Edit Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
              require 'conn.php';
              $sql="SELECT * from complaint ORDER BY `id` ";
              $result=mysqli_query($mysql_connect,$sql);
               $SrNo=0;
               
              while($results=mysqli_fetch_array($result)){
                $complaintID = $results['id'];
                $userID = $results['u_id'];
                $userName=$results['user_name'];
                $userAddress=$results['user_address'];
                $userCity=$results['user_city'];
                $userState=$results['user_state'];
                $userZip=$results['user_zip'];
                $criminalName=$results['criminal_name'];
                $complaintType=$results['complaint_type'];
                $usercomplaint=$results['complaint_text'];
                $action=$results['action'];
                $assignedEmployee=$results['assigned_to_employee'];

                 $SrNo++;
                ?>
                <tr>
                <td><?php echo $SrNo; ?></td>
                <td><?php echo $complaintID; ?></td>
                <td><?php echo $userID; ?></td>
                <td><?php echo $userName; ?></td>
                <td><?php echo $userAddress; ?></td>
                <td><?php echo $userCity; ?></td>
                <td><?php echo $userState; ?></td>
                <td><?php echo $userZip; ?></td>
                <td><?php echo $criminalName; ?></td>
                <td><?php echo $complaintType; ?></td>
                <td><?php echo $usercomplaint; ?></td>
                <td><?php echo $action; ?></td>
                <td><?php echo $assignedEmployee; ?></td>
                <td><a href="edit_complaint.php?id=<?php echo $complaintID; ?>" class="btn btn-secondary btn-primary active" role="button" aria-pressed="true">Edit</a></td>

                </tr>
            <?php } ?>
        </tbody>
      </table>
      </div>

  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>