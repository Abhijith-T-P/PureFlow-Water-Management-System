<?php
ob_start();
include('Head.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/phpMail/src/Exception.php';
require '../assets/phpMail/src/PHPMailer.php';
require '../assets/phpMail/src/SMTP.php';

include("../assets/connection/connection.php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Verification</title>
  <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>

  <h2>VERIFY REGISTERED USER</h2>

  <?php
  if (isset($_GET["aid"])) {
  ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
      </svg>
      <div>
        Accepted Succesfully
      </div>
    </div>
  <?php
  }
  ?>
  <form id="form2" name="form2" method="post" action="">
    <table width="380">
      <tr>
        <td width="46">Si.No</td>
        <td width="78">User Name</td>
        <td width="54">Address</td>
        <td width="54">Contact</td>
        <td>View id</td>
        <td colspan="2">Action</td>
      </tr>
      <?php
      $i = 0;
      $selquery = "select * from tbl_user where user_vstatus='0'";
      $result = $con->query($selquery);
      while ($data = $result->fetch_assoc()) {
        $i++;
        $email = $data['user_email'];
        $name = $data['user_name'];
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data["user_name"] ?></td>
          <td><?php echo $data["user_address"] ?></td>
          <td><?php echo $data["user_contact"] ?></td>

          <td>
            <a href="../assets/files/User/<?php echo $data['user_proof'] ?>" target="_blank"><img src="../assets/Template/id" alt="id img" width="100px"></a>

          </td>
          <td width="54"><a href="UserVerification.php ? aid=<?php echo $data["user_id"] ?>"><button type="button" class="btn btn-success m-1">Accept</button></a></td>
          <td width="54"><a href="UserVerification.php ? rid=<?php echo $data["user_id"] ?>"><button type="button" class="btn btn-danger m-1">Reject</button></a></td>
        <?php
      }
        ?>
        </tr>
    </table>
  </form>



  </div>
</body>


</body>

<?php
include('Foot.php');
ob_end_flush();
?>

</html>
<?php
if (isset($_GET["aid"])) {
  $id = $_GET["aid"];
  $update = "update tbl_user set user_vstatus = 2 where user_id='$id'";
  if ($con->query($update)) {

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pureflow.wms@gmail.com'; // Your gmail
    $mail->Password = 'tkjicgwsjvvsocen'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('pureflow.wms@gmail.com'); // Your gmail

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Account Verification Successful - You're Ready to Dive into PureFlow!";
    $mail->Body = "Dear" . " " . $name . " " . "<br>
        <br>

        We're thrilled to inform you that your account on PureFlow has been successfully verified!<br><br>

        You can now log in to your PureFlow account and start exploring our platform's exciting features.<br><br>
        
        If you have any questions or need assistance, please don't hesitate to reach out to our support team.<br><br>
        
        Thank you for choosing PureFlow!<br><br>
        
        Warm regards,<br>
        
        PureFlow Support Team
        ";
    if ($mail->send()) {
      echo "Sended";
    } else {
      echo "Failed";
    }
  }?>
  <script> window.location.href='UserVerification.php'</script>
  <?php
}

if (isset($_GET["rid"])) {
  $id = $_GET["rid"];
  $update = "update tbl_user set user_vstatus = 1 where user_id='$id'";
  if ($con->query($update)) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pureflow.wms@gmail.com'; // Your gmail
    $mail->Password = 'tkjicgwsjvvsocen'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('pureflow.wms@gmail.com'); // Your gmail

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = " Account Verification Status - Action Required";
    $mail->Body = "Dear" . " " . $name . " " . "<br>
        <br>

        We regret to inform you that your account verification on PureFlow has not been successful at this time.<br><br>

If you believe there has been a mistake or if you would like further clarification on the rejection, please contact our support team . They will be happy to assist you.<br><br>

Thank you for your understanding.<br><br>

Best regards,<br>

PureFlow Support Team
        ";
    if ($mail->send()) {
      echo "Sended";
    } else {
      echo "Failed";
    }
  }?>
  <script> window.location.href='UserVerification.php'</script>
  <?php
} ?>