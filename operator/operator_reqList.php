<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if(isset($_GET["rid"]))
{
	$rid=$_GET["rid"];
  $oid=$_SESSION['oid'];
    $reqStst=$data['req_status']+1;
	  echo $update="update tbl_service_request set req_status=$reqStst , operator_id='".$_SESSION['oid']."'  where req_id='$rid'";  
    $con->query($update);
    echo"Accepted Succesfully";
	  header("location:operator_reqList.php"); 
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Requests</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

    <form action="" method="post">
      <table width="666" >
        <tbody>
          <tr>
            <td width="29">Sl.No</td>
            <td width="61">User name</td>
            <td width="48">address</td>
            <td width="71">request date</td>
            <td width="85">type of request</td>
            <td width="35">detail</td>
            <td width="78">Current Staus</td>
            <td width="130">action</td>
          </tr>
          
			  <?php
	    $i=0;
      $selquery = "SELECT * FROM tbl_service_request s INNER JOIN tbl_user u ON s.user_id = u.user_id WHERE req_status = '0'";

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
            <td><?php echo $data["req_type"] ?></td>
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
              if($data['req_status']==4)
              {
                 echo "Fixed"; 
              }
              if($data['req_status']==5)
              {
                  echo "Not solved";
              }
              ?>
            </td>
            <td width="54"><a href="operator_reqList.php ? rid=<?php echo $data['req_id'] ?>">Accept</a></td>
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