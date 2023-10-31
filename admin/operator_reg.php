<?php

ob_start();
include('Head.php');
include("../assets/connection/connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/phpMail/src/Exception.php';
require '../assets/phpMail/src/PHPMailer.php';
require '../assets/phpMail/src/SMTP.php';

if (isset($_POST["submit"])) {
    $proof = $_FILES['img_proof']['name'];
    $temp = $_FILES['img_proof']['tmp_name'];
    move_uploaded_file($temp, '../assets/files/operator/proof'.$proof);



    $photo = $_FILES['img_operator']['name'];
    $temp = $_FILES['img_operator']['tmp_name'];
    move_uploaded_file($temp, '../assets/files/operator/'.$photo);


    $name = $_POST["txt_name"];
    $contact = $_POST["txt_tel"];
    $email = $_POST["txt_email"];
    $address = $_POST["txt_address"];
    $password = $_POST["txt_password"];

    // Check if the user already exists based on email
    $existingUserQuery = "SELECT COUNT(*) as count FROM tbl_operator WHERE operator_email = '$email'";
    $result = $con->query($existingUserQuery);
    $row = $result->fetch_assoc();
    $userCount = $row['count'];

    if ($userCount === '0') {
        if ($_POST["txt_password"] == $_POST["txt_confirm"]) {

            $insertQuery = "INSERT INTO tbl_operator (operator_name, operator_contact, operator_email, operator_address, operator_photo, operator_proof,operator_password) VALUES ('$name', '$contact', '$email', '$address', '$photo','$proof', '$password')";

            if ($con->query($insertQuery) === TRUE) {
                echo "Operator registered successfully!";
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

        $mail->Subject = " Assignment as Operator on PureFlow";
        $mail->Body = "Dear" . " " . $name . " " . "<br>
        <br>

        We are pleased to inform you that you have been assigned the role of Operator on PureFlow. Congratulations!<br><br>

        As an Operator, you play a vital role in ensuring the smooth functioning of our platform. <br><br>
        
        Please take some time to familiarize yourself with the tools and resources available to you. If you have any questions or need further assistance, don't hesitate to reach out to our support team at pureflow.wms@gmail.com .<br><br>
        
        We have full confidence in your abilities and look forward to your contributions in making PureFlow an even better platform for our users.<br><br>
        
        Once again, welcome aboard!<br><br>
        
        Best regards,<br>
        
        PureFlow Administration Team";
        if ($mail->send()) {
          echo "Mail Sended";
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
        echo "User with this email already exists!";
    }
}
?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register Operator</title>
<link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
<h2>REGISTER NEW OPERATOR</h2>


<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="410" >
    <tbody>
      <tr>
        <td width="207">Name</td>
        <td width="191"><label for="txt_name"></label>
        <input name="txt_name" type="text" required id="txt_name"></td>
      </tr>
      <tr>
        <td>Contact</td>
        <td><label for="txt_tel"></label>
        <input name="txt_tel" type="text" required id="txt_tel"></td>
      </tr>
      <tr>
        <td height="26">Email</td>
        <td><label for="txt_email"></label>
        <input name="txt_email" type="email" required id="txt_email"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
        <textarea name="txt_address" cols="30" rows="5" required="required" id="textarea"></textarea></td>
      </tr>
      <tr>
        <td>Photo</td>
        <td><label for="img_operator"></label>
        <input name="img_operator" type="file" required id="img_operator" title="img_operator"></td>
      </tr>
      <tr>
        <td>ID Proof</td>
        <td><label for="img_proof"></label>
        <input name="img_proof" type="file" required id="img_proof" title="img_proof"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><label for="txt_confirm"></label>
        <input name="txt_password" type="password" id="txt_password" placeholder="PASSW*RD" title="txt_password" required></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><label for="txt_confirm"></label>
        <input name="txt_confirm" type="password" id="txt_confirm" placeholder="C*NFIRM" title="txt_confirm" required`1></td>
      </tr>
      <tr>
        <td colspan="2">
        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-success m-1">Register</button>
          
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
