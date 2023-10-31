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
    <title>User-View bill</title><link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
    

    
<h3 class="text-center">Monthly Bill</h3>
	<form>
	  <table width="200" >
	    <tbody>
	      <tr>
	        <td>Bill id</td>
	        <td>Bill Date</td>
	        <td>Amount</td>
	        <td>Due date</td>
	        <td>usage</td>
			  <td>Status</td>
        <td>pay now</td>
          </tr>
	      <tr>
        <?php
         $sel="SELECT * FROM tbl_bill WHERE  user_id='".$_SESSION['uid']."' ";
        $result=$con->query($sel);
        while($data= $result->fetch_assoc())
        {
          
    ?>
	        <td><?php echo$data['bill_no']; ?></td>
	        <td><?php echo$data['bill_date']; ?></td>
	        <td><?php echo$data['bill_amount']; ?></td>
	        <td><?php echo$data['bill_due_date'] ;?></td>
          <td><?php echo$data['bill_reading'] ;?></td>
          <td><?php 
            $stat=$data['bill_status'];
            if($stat==1)
              echo"Payment pending "; 
            else if($stat==2)
              echo"Bill due";
            else
              echo "Paid bill";
              ?>
          </td> 
			  <td  >
          <?php
          if($data['bill_status']==3)
          {
            echo"Payment succesfull";
          }
          else
          {?>
            <a class="btn-pay" href="Payment.php?bid=<?php echo$data['bill_id'] ?>">Pay now</a><?php
          } ?></td>
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
