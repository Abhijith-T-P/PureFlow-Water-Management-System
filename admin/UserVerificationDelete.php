<?php
ob_start();
include('Head.php');

include("../assets/connection/connection.php");

if(isset($_GET["aid"])) 
{
	$id=$_GET["aid"];
	$update="update tbl_user set user_vstatus = 2 where user_id='$id'";  
    $con->query($update);
	header("location:UserVerificationDelete.php"); 
} 
if(isset($_GET["did"])) 
{
	$id=$_GET["did"];
	$del="delete from tbl_user where user_id='$id'"; 
	$con->query($del);
	header("location:UserVerificationDelete.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Reaccept/Delete</title>
	<link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
<h2>REJECTED USERS</h2>

<form id="form2" name="form2" method="post" action="">
  <table width="380" >
    <tr>
      <td width="46">Si.No</td>
      <td width="78">User Name</td>
      <td width="54">Address</td>
      <td width="54">Contact</td>
      <td colspan="2">Action</td>
    </tr>
	  <?php
	    $i=0;
		$selquery="select * from tbl_user where user_vstatus='1	'";
		$result=$con->query($selquery);
		while($data=$result->fetch_assoc())
		{
			$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
      			<td><?php echo $data["user_name"] ?></td>
      			<td><?php echo $data["user_address"]?></td>
     			<td><?php echo $data["user_contact"] ?></td>
     			<td width="54"><a href="UserVerificationDelete.php ? aid=<?php echo $data["user_id"] ?>"><button type="button" class="btn btn-success m-1">Accept</button></a></td>
	  			<td width="54"><a href="UserVerificationDelete.php ? did=<?php echo $data["user_id"] ?>"><button type="button" class="btn btn-danger m-1">Delete</button></a></td>
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