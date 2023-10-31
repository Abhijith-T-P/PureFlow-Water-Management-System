<?php

ob_start();
include('Head.php');
include("../assets/connection/connection.php");

if(isset($_GET["did"])) 
{
	$id=$_GET["did"];
	$del="delete from tbl_user where user_id='$id'"; 
	$con->query($del);
	header("location:User_list.php"); 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
	<link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
    
<h2>ACCEPTED USER LIST</h2>

<form id="form2" name="form2" method="post" action="">
  <table width="413" >
    <tr>
      <td width="26">User id</td>
	  <td width="26">Customer id</td>
      <td width="64">User Name</td>
      <td width="155">Address</td>
      <td width="87">Contact</td>
      <td colspan="2">Action</td>
    </tr>
	  <?php
	    $i=0;
		$selquery="select * from tbl_user where user_vstatus='2' ";
		$result=$con->query($selquery);
		while($data=$result->fetch_assoc())
		{
			$i++;
			?>
			<tr>
				<td><?php echo$data["user_id"]?></td>
				<td><?php echo$data["customer_id"]?></td>
      			<td><?php echo $data["user_name"] ?></td>
      			<td><?php echo $data["user_address"]?></td>
     			<td><?php echo $data["user_contact"] ?></td>

				<td width="45"><a href="User_list.php ? did=<?php echo $data["user_id"] ?>"><button type="button" class="btn btn-danger m-1">Delete</button></a></td>
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