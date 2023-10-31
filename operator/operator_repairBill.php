<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if(isset($_POST['submit']))
{
    $photo=$_FILES['bill_img']['name'];
    $temp=$_FILES['bill_img']['tmp_name'];
    move_uploaded_file($temp,'../assets/files/operator/bills/'.$photo);
    $update="update tbl_service_request set req_bill='$photo', req_cost='".$_POST['bill_amount']."',req_status=6 where req_id='".$_GET['req_id']."'";
    $con->query($update);
    header('location:operator_accepted.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator-Repair Bill</title>
	  <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data">
      <table width="361" >
        <tbody>
            <?php
        $selquery = "SELECT * FROM tbl_service_request s INNER JOIN tbl_user u ON s.user_id = u.user_id WHERE operator_id='" . $_SESSION['oid'] . "' and req_id=".$_GET['req_id'];
        $result=$con->query($selquery);
        $data=$result->fetch_assoc()
        ?>
          <tr>
            <td width="129">User</td>
            <td width="216"><?php echo$data["user_name"] ?></td>
          </tr>
          <tr>
            <td>Type of request</td>
            <td><?php echo$data["req_type"] ?></td>
          </tr>
          <tr>
            <td>Description</td>
            <td><?php echo$data["req_detail"]?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td><?php echo$data["req_status"]?></td>
          </tr>
          <tr>
            <td>Billimage</td>
            <td>
            <input type="file" name="bill_img" id="bill_img"></td>
          </tr>
          <tr>
            <td>Bill Amount</td>
            <td><input type="number" name="bill_amount" id="bill_amount"></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
          </tr>
        </tbody>
      </table>
    </form>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>