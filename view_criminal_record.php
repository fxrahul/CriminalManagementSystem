<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>View Criminal Record</title>

    <!--script -->
    <script src="js/main.js"></script>
  </head>
  <body>
    <h1>View Criminal Record</h1>
    
    <div id="criminalTable" class="table-responsive ">
    <table class="table table-bordered table-sm table-responsive">
        <thead>
          <tr>
              <th>No</th>
              <th>Criminal ID</th>
              <th>Criminal Name</th>
              <th> Criminal Cases </th>
             <th> Criminal Photo </th>
          </tr>
        </thead>
        <tbody>

        <?php
              require 'conn.php';
              $sql0="SELECT * from criminal_record ORDER BY `id` ";
              $result4=mysqli_query($mysql_connect,$sql0);
               $SrNo=0;
               
              while($results4=mysqli_fetch_array($result4)){
                    $criminalID = $results4['id'];
                    $criminalName = $results4['name'];
                    $criminalCases = $results4['no_of_cases'];
                    $criminalPhoto = $results4['photograph'];

                    $SrNo++;
                    ?>

                <tr>
                <td><?php echo $SrNo; ?></td>
                <td><?php echo $criminalID; ?></td>
                <td><?php echo $criminalName; ?></td>
                <td><?php echo $criminalCases; ?></td>
                <td><img src="img/<?php echo $criminalPhoto; ?>" width="120px"; height="50px"></td>

                </tr>
            <?php } ?>
        </tbody>
      </table>
      </div>

              
  
  
  
</form>
  
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>