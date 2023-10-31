<?php
ob_start();
include('Head.php');

include("../assets/connection/connection.php");

if (isset($_POST["btn_save"])) {
  $adminName = $_POST["admin_name"];
  $adminEmail = $_POST["admin_email"];
  $adminPassword = $_POST["admin_password"];


  $existingAdminQuery = "SELECT COUNT(*) as count FROM tbl_admin WHERE admin_email = '$adminEmail'";
  $result = $con->query($existingAdminQuery);
  $row = $result->fetch_assoc();
  $adminCount = $row['count'];

  if ($adminCount === '0') {

    $insertQuery = "INSERT INTO tbl_admin (admin_name, admin_email, admin_password) VALUES ('$adminName', '$adminEmail', '$adminPassword')";

    if ($con->query($insertQuery)) {
      echo "Signup successful !!!";
    } else {
      echo "Error: " . $con->error;
    }
  } else {
    echo "Admin with this email already exists!";
  }
}
?>

<!doctype html>
<html>

<head>
  <link rel="stylesheet" href="../assets/Style/style.css">

  <meta charset="utf-8">
  <title>Admin Register</title>
  <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>

  <h2>ADD NEW ADMIN</h2>


  <form id="form1" name="form1" method="post">
    <table width="200">
      <tbody>
        <tr>
          <td width="74">Name</td>
          <td width="110">
            <input type="text" name="admin_name" id="admin_name" placeholder="Admin name" reqiured>
          </td>
        </tr>
        <tr>
          <td>Email id</td>
          <td><input type="email" name="admin_email" id="admin_email" placeholder="Admin Email id" required></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="admin_password" id="admin_password" placeholder="Admin Password" required></td>
        </tr>
        <tr>
          <td height="48" colspan="2"> <button type="submit" class="btn btn-success m-1" name="btn_save" id="btn_save" value="Submit">Register</button>
            <button type="reset" class="btn btn-danger m-1" name="btn_reset" id="btn_reset" value="Reset">Danger</button>
          </td>
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