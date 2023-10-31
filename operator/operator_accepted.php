<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

if(isset($_GET["req_id"]))
{
  $st_id=$_GET['st_id'];
	$req_id=$_GET["req_id"];
	$update="update tbl_service_request set req_status = '$st_id' where req_id='$req_id'";  
  $con->query($update);
	header("location:operator_accepted.php"); 
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Accepted Requests</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

    <form action="" method="post">
      <table width="666" >
        <tbody>
          <tr>
            <td >Sl.No</td>
            <td >User name</td>
            <td >address</td>
            <td >request date</td>
            <td >type of request</td>
            <td >detail</td>
            <td >Current Staus</td>
            <td >Update</td>
           
          </tr>
          
			  <?php
	    $i=0;
        $selquery = "SELECT * FROM tbl_service_request s INNER JOIN tbl_user u ON s.user_id = u.user_id WHERE operator_id='" . $_SESSION['oid'] . "'";


		$result=$con->query($selquery);
		while($data=$result->fetch_assoc())
		{
			$i++;
			?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data["user_name"] ?></td>
            <td><?php echo $data["user_address"] ?></td>
            <td><?php echo $data["req_date"] ?></td>
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
            <td><?php echo $data["req_detail"] ?></td>
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
              if($data['req_status']==4||7)
              {
                 echo "Fixed"; 
              }
              if($data['req_status']==6)
              {
                 echo "waiting for Payment"; 
              }
          
              if($data['req_status']==5)
              {
                  echo "Not solved";
              }
              
              
              ?>
            </td>
            <td >
              <?php 
              if($data['req_status']==1)
              {
                ?>
                <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=2">
                  <button type="button">Out For Visit</button>
                </a>
                <?php
              }
              if($data['req_status']==2)
              {
                ?>
                <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=3">
                  <button type="button">Visited</button>
                </a>
                <?php
              }
              if($data['req_status']==3)
              {
                ?>
                <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=4">
                  <button type="button">Solved</button>
                </a>
                <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=5">
                  <button type="button">Not solved</button>
                </a>
                <?php
              }
              if($data['req_status']==5)
              {
                ?>
                <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=4">
                  <button type="button">Solved</button>
                </a>
                <?php
              }
              if($data['req_status']==4)
              {
              ?>
                <a href="operator_repairBill.php?req_id=<?php echo $data['req_id'] ?>">
               
                <button type="button" class="btn btn-primary m-1">Bill</button>
                
              </a>
              <a href="operator_accepted.php?req_id=<?php echo $data['req_id'] ?>&st_id=7">
              <button type="button" class="btn btn-secondary m-1">No Bill</button>
                  
                </a>
                <?php
              }
            //payment need to update status to 7
              if($data['req_status']==6)
              {
                echo"Payment pending";
              }
              if($data['req_status']==7)
              {
                echo"Completed";
              }
              
              ?>
            </td>
            

          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
         
    </form>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>