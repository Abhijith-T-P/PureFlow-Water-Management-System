<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/phpMail/src/Exception.php';
require '../assets/phpMail/src/PHPMailer.php';
require '../assets/phpMail/src/SMTP.php';

if(isset($_GET["did"])) 
{
	$id=$_GET["did"];
	$del="delete from tbl_operator where operator_id='$id'"; 
  $val="select * from tbl_operator where operator_id='$id'";
  $row=$con->query($val);
  $data=$row->fetch_assoc();
  $email=$data['operator_email'];
  $name=$data['operator_name'];
	if($con->query($del)){
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

    $mail->Subject = "Removal from Operator Position on PureFlow";
    $mail->Body = "Dear" . " " . $name . " " . "<br>
   
    
    I hope this message finds you well.<br><br>
    
    We regret to inform you that, you have been removed from your position as Operator on PureFlow.
    <br><br>
    We appreciate the contributions and efforts you have put into this role.<br><br>
    If you have any questions or would like further clarification regarding this decision, please do not hesitate to reach out to us at pureflow.wms@gmail.com.<br><br>
    
    We want to thank you for your time as an Operator and wish you all the best in your future endeavors.<br><br>
    
    Sincerely,
    
    <br>
    PureFlow Administration Team
     ";
    if ($mail->send()) {
      echo "Sended";
    } else {
      echo "Failed";
    }
  }
	header("location:operator_list.php"); 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>operator List</title>
	<link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
    
<h2>AVALIABLE OPERATORS</h2>

<form id="form2" name="form2" method="post" action="">
  <table width="413" >
    <tr>
      <td width="26">Si.No</td>
      <td width="64">Name</td>
      <td width="155">Address</td>
      <td width="87">Contact</td>
      <td width="87">Email</td> 
      <td colspan="2">Action</td>
    </tr>
	  <?php
	    $i=0;
		$selquery="select * from tbl_operator  ";
		$result=$con->query($selquery);
		while($data=$result->fetch_assoc())
		{
			$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
      			<td><?php echo $data["operator_name"] ?></td>
      			<td><?php echo $data["operator_address"]?></td>
            <td><?php echo $data["operator_contact"] ?></td>
            <td><?php echo $data["operator_email"] ?></td>

				<td width="45"><a href="operator_list.php ? did=<?php echo $data["operator_id"] ?>"><button type="button" class="btn btn-danger m-1">Delete</button></a></td>
	<?php		
	}
    ?>
    </tr>
  </table>
</form>
    
</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>