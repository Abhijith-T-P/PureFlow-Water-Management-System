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
>
    
<form id="form1" name="form1" method="post"><table width="240" >
  <tbody>
    <?php
        $sel="SELECT * FROM tbl_service_request s INNER JOIN tbl_operator u ON s.operator_id = u.operator_id WHERE  req_id='".$_GET['req_id']."' ";
        $result=$con->query($sel);
        $data= $result->fetch_assoc();
    ?>
    <tr>
      <td >Operator Name</td>
      <td ><?php echo$data['operator_name'] ?></td>
    </tr>
    <tr>
      <td>Type of service</td>
      <td><?php echo$data['req_type'] ?></td>
    </tr>
    <tr>
      <td>Detail</td>
      <td><?php echo$data['req_detail'] ?></td>
    </tr>
    <tr>
      <td>Bill amount</td>
      <td><?php echo$data['req_cost']?></td>
    </tr>
    <tr>
      <td>View bill</td>
      <td>
        <!-- <a href="../assets/files/operator/bills/<?php echo $data['req_bill']?>" target="_blank"><img src="" alt="bill img"></a> -->
        <button type="button" onclick="openPopup()">view bill</button>
      </td>
    </tr>
    <td colspan="2">
    <p align="center">
        
        <a class="btn-pay" href="Payment.php?rid=<?php echo$data['req_id'] ?>">Pay now</a>
      </p>
    </td>
   
  </tbody>
</table>

</form>
<div class="bill-view" id="bill-view">
  <div class="close-btn " onclick="closePopup()">X</div>
  <h3 style='text-align: center;'>BILL DETAILS</h3>
  <img src="../assets/files/operator/bills/<?php echo $data['req_bill']?>" width='300px'/>
</div>
</body>
<script>
  // JavaScript functions to show and hide the popup
  function openPopup() {
    document.getElementById('bill-view').style.display = 'block';
    document.addEventListener('keydown', handleEscPress);
  }

  function closePopup() {
    document.getElementById('bill-view').style.display = 'none';
    document.removeEventListener('keydown', handleEscPress);
  }

  function handleEscPress(event) {
    if (event.key === 'Escape') {
      closePopup();
    }
  }
</script>
<?php
include('Foot.php');
ob_end_flush();
?>
</html>
