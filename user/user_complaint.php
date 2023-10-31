<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if(isset($_POST['submit']))
{
    $type=$_POST['nt_type'];
    $subject=$_POST['nt_subject'];
    $user=$_SESSION['uid'];
    $ins = "INSERT INTO `tbl_complaint`( `cmp_title`, `cmp_detail`, `user_id`) VALUES ('$type','$subject','$user')";
    $con->query($ins);
    echo "<script>alert('Notificatin send succesfuley');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User -Complaints</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
  
<form action="" method="post">
    <table>
        <tr>
            <td>complaint</td>
            <td>
                <input type="radio" name="nt_type" id="" value="1"><label for="n_t" default>Service related</label><br>
                <input type="radio" name="nt_type" id="" value="2"><label for="n_t">other</label>
            </td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><textarea name="nt_subject" id="nt_subject" cols="80" rows="10" required></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" name="submit" class="btn btn-success m-1">Send</button></td>
        </tr>
    </table>
</form>

</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>