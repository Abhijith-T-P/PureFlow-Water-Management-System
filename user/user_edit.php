<?php
include("../assets/connection/connection.php");

ob_start();
include('Head.php');

if (!isset($_SESSION["name"])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION["uid"];
$query = "SELECT * FROM tbl_user WHERE user_id = $user_id";
$result = $con->query($query);
if (!$result) {
    die("Error: " . $con->error);
}
$userData = $result->fetch_assoc();

if (isset($_POST["submit"])) {
    // Retrieve updated information from the form
    $name = $_POST["txt_name"];
    $contact = $_POST["txt_tel"];
    $email = $_POST["txt_email"];
    $address = $_POST["txt_address"];
    $password = $_POST["txt_password"];

    // Update the user's information in the database
    $updateQuery = "UPDATE tbl_user SET user_name = '$name', user_contact = '$contact', user_email = '$email', user_address = '$address', user_password = '$password' WHERE user_id = $user_id";

    if ($con->query($updateQuery) === TRUE) {
        
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "Error updating profile: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

    
    
    <form method="post" action="">
      <table width="290" >
        <tbody>
          <tr>
            <td width="143"><label for="txt_name">Name:</label></td>
            <td width="162"><input type="text" name="txt_name" id="txt_name" value="<?php echo $userData["user_name"]; ?>" required></td>
          </tr>
          <tr>
            <td><label for="txt_tel2">Contact:</label></td>
            <td><input type="text" name="txt_tel" id="txt_tel" value="<?php echo $userData["user_contact"]; ?>" required></td>
          </tr>
          <tr>
            <td><br>
            <label for="txt_email2">Email:</label></td>
            <td><input type="email" name="txt_email" id="txt_email" value="<?php echo $userData["user_email"]; ?>" required></td>
          </tr>
          <tr>
            <td><label for="txt_address2">Address:</label></td>
            <td><textarea name="txt_address" id="txt_address" cols="40" rows="10" required><?php echo $userData["user_address"]; ?></textarea></td>
          </tr>
          <tr>
            <td><label for="txt_password2">New Password:</label></td>
            <td><input type="password" name="txt_password" id="txt_password" value="<?php echo $userData["user_password"]; ?>" ></td>
          </tr>
          <tr>
            <td colspan="2">
          <input class="btn text-center" type="submit" name="submit" class="btn btn-success m-1" value="Save Changes">
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
