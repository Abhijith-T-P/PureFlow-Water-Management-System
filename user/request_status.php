<?php
include("../assets/connection/connection.php");
ob_start();
include('Head.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Request Status</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
  <br><br>
<h3 class="text-center">Service Bill</h3>
    <form method="post">
      <table width="1034" border="1" >
        <tbody>
          <tr>
            <td width="154">Si.no</td>
            
            <td>Type of request</td>
            <td width="168">expalination</td>
            <td height="22" >registered date</td>
            <td height="22" >Status</td>
          </tr>
          <tr>
            <?php
              $i=1;
              $sel="SELECT * FROM tbl_service_request ";
              $res=$con->query($sel);
              while($data=$res->fetch_assoc())
              {
              ?>
              <td><?php echo $i ?></td>
             
              <td>
              <?php 
              if($data['req_type']==0)
              {
                echo "repair";
              }
              if($data['req_type']==1)
              {
                echo "Service";
              }
              if($data['req_type']==2)
              {
                  echo "Other";
              }
              ?>
              </td>
              <td><?php echo $data["req_detail"]  ?></td>
              <td><?php echo $data["req_date"]  ?></td>
              <td>
              <?php 
              if($data['req_status']==0)
              {
                echo "Not Accepted";
              }
              if($data['req_status']==1)
              {
                echo "Request Accepted";
              }
              if($data['req_status']==2)
              {
                  echo "Out for service";
              }
              if($data['req_status']==3)
              {
                  echo "Visited";
              }
              if($data['req_status']==4)
              {
                 echo "Fixed"; 
              }
              if($data['req_status']==6)
              {
                 echo "waiting for Payment "; 
                 ?>
                 <a href="view_bill.php?req_id=<?php echo $data['req_id'] ?>"><button type="button" class="btn btn-info m-1">Bill</button></a>
                 <?php
              }
              
              if($data['req_status']==5)
              {
                  echo "Not solved";
              }
              if($data['req_status']==7)
              {
                 echo "Completed"; 
              }
          
              
              
              ?>
              </td>
            </tr>
          <?php
          $i++;
              }
          ?>
              
        </tbody>
      </table>
	</form>
              <div class="container text-center">
              <a href="user_complaint.php">Report complaint</a>
              </div>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>