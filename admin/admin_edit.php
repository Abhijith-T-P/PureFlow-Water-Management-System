<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
$selquery="select admin_password from tbl_admin where admin_id= '".$_SESSION['aid']."' ";
      $result=$con->query($selquery);
      while($data=$result->fetch_assoc())
      {
        $cpass=$data['admin_password'];
      } 
if(isset($_POST["submit"]))
{
	if($_POST["txt_current"]==$cpass)
	{
		if($_POST['txt_new1']==$_POST["txt_new2"])
		{
			$update="UPDATE tbl_admin SET admin_password = '".$_POST["txt_new1"]."' WHERE admin_id = '".$_SESSION['aid']."'";
			$con->query($update);
			echo("Update Succesfull");
      $cpass=$_POST['txt_new1'];
		}
		else
		{
			echo"New Password mismatch";
		}
	}
	else
	{
		echo"Current Password Mismatch ";
	}

}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Update</title>
<link rel="stylesheet" href="../assets/Style/style.css">
</head> 
<body>
    
<h2>EDIT PASSWORD</h2>

<form id="form1" name="form1" method="post">
	<table width="275" >
  <tbody>
    <tr>
      <td width="143">Current Password</td>
      <td width="116">
        <input type="text" name="txt_current" id="txt_current"></td>
    </tr>
    <tr>
      <td>New password</td>
      <td>
        <input type="password" name="txt_new1" id="txt_new1"></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td>
        <input type="password" name="txt_new2" id="txt_new2"></td>
    </tr>
	  <tr>
      <td colspan="2"><button type="submit" class="btn btn-success m-1" name="submit" id="submit">Submit</button></td>
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