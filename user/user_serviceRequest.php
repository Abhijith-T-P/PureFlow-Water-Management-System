<?php
include("../assets/connection/connection.php");
ob_start();
include('Head.php');

if(isset($_POST["submit"]))
{
    $ins = "INSERT INTO tbl_service_request (req_type, req_detail, user_id) VALUES ('".$_POST["req_type"]."','".$_POST["req_detail"]."','".$_SESSION['uid']."')";

  $con->query($ins);

  echo "<script>alert('Request sucesful');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

    <form method="post">
      <table width="338" >
        <tbody>
          <tr>
            <td width="154">User name</td>
            <td width="168"><?php echo $_SESSION["name"] ?></td>
          </tr>
          <tr>
            <td>Type of request</td>
            <td><select name="req_type" id="req_type" required >
                <option value="0">repair</option>
                <option value="1">service</option>
                <option value="2">other..</option>
            </select></td>
          </tr>
          <tr>
            <td height="116">expalin</td>
            <td>
            <textarea name="req_detail" id="req_detail" cols="40" rows="7" required ></textarea></td>
          </tr>
          <tr>
            <td height="22" colspan="2"><input type="submit" name="submit" id="submit"  class="btn btn-success m-1" value="Submit"></td>
          </tr>
        </tbody>
      </table>
	</form>
  <div class="container">
    <a href="user_complaint.php">Report complaint</a>
  </div>
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>