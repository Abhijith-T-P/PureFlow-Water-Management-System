<?php
include("../assets/connection/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/phpMail/src/Exception.php';
require '../assets/phpMail/src/PHPMailer.php';
require '../assets/phpMail/src/SMTP.php';
function generateUniqueID($length = 8)
{
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomString = '';

  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
  }

  return $randomString;
}

$uniqueID = generateUniqueID();

if (isset($_POST["submit"])) {
  $photo = $_FILES['img_user']['name'];
  $temp = $_FILES['img_user']['tmp_name'];
  move_uploaded_file($temp, '../assets/files/User/' . $photo);

  $name = $_POST["txt_name"];
  $contact = $_POST["txt_tel"];
  $email = $_POST["txt_email"];
  $address = $_POST["txt_address"];
  $password = $_POST["txt_password"];

  // Check if the user already exists based on email
  $existingUserQuery = "SELECT COUNT(*) as count FROM tbl_user WHERE user_email = '$email'";
  $result = $con->query($existingUserQuery);
  $row = $result->fetch_assoc();
  $userCount = $row['count'];

  if ($userCount === '0') {
    if ($_POST["txt_password"] == $_POST["txt_confirm"]) {

      $insertQuery = "INSERT INTO tbl_user (user_name, user_contact, user_email, user_address, user_proof, user_password,customer_id) VALUES ('$name', '$contact', '$email', '$address', '$photo', '$password','$uniqueID')";

      if ($con->query($insertQuery) === TRUE) {
        echo "<script>alert('User registered successfully!');</script>";
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

        $mail->Subject = "Successful Account Registration - PureFlow";
        $mail->Body = "Dear" . " " . $name . " " . "<br>
        <br>

We are pleased to inform you that your account registration on PureFlow  was successful!<br><br>

To ensure the security of your account, we require a brief verification process before you can log in. This additional step helps us maintain a safe and trustworthy environment for all our users.<br><br>

Please be patient as we work to complete the verification process. You will receive an email notification once it's complete and you can log in to your account.<br><br>

Thank you for your cooperation.<br><br>

Best regards,<br>

PureFlow Support Team ";
        if ($mail->send()) {
          echo "Sended";
        } else {
          echo "Failed";
        }
      } else {
        echo "Error: " . $con->error;
      }
    } else {
      echo "Password mismatch !!!";
    }
  } else {
    echo "<script>alert('User with this email already exists!');</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PURE FLOW</title>
  <link rel="shortcut icon" type="image/png" href="../assets/Template/Admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/Template/Admin/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/Template/Admin/assets/images/logos/pf.png" width="180" alt="">
                </a>
                <p class="text-center">Savor the Convenience of Effortless Water Management.</p>
                <form method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input name="txt_name" type="text" class="form-control" required id="txt_name" placeholder="Name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Contact</label>
                    <input name="txt_tel" type="text" class="form-control" required id="txt_tel" pattern="(\+91-)?\d{10}" data-mask="000 0000 000" placeholder="Contact Number">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input name="txt_email" type="email" class="form-control" required id="txt_email" placeholder="Email id">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <textarea name="txt_address" class="form-control" cols="30" rows="5" required="required" id="textarea" placeholder="Adderess"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ID Proof</label>
                    <input name="img_user" type="file" class="form-control" required id="img_user" title="img_user"></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="txt_password" type="password" class="form-control" id="txt_password" placeholder="PASSWORD" title="txt_password" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input name="txt_confirm" type="password" class="form-control" id="txt_confirm" placeholder="CONFIRM" title="txt_confirm" required>
                  </div>

                  <button type="submit" class="btn btn-primary m-1" name="submit">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="login.php">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/Template/Admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/Template/Admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>