<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if(isset($_POST['submit']))
{
    $type=$_POST['nt_type'];
    $subject=$_POST['nt_subject'];
    $admin=$_SESSION['aid'];
    echo $ins = "INSERT INTO tbl_notification(`note_title`, `note_detail`, `note_sender`) VALUES ('$type','$subject','$admin')";
    $con->query($ins);
    echo "<script>alert('Notificatin send succesfuley');window.location.href = 'admin_dashboard.php';</script>";

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin -Notification</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>
    
<h2>SEND NOTIFICATION</h2>
<form action="" method="post" >
    <table>
        <tr>
            <td>Notification Type</td>
            <td>
                <input type="radio" checked name="nt_type" id="" value="1"><label for="n_t" >Notice</label>
                <input type="radio" name="nt_type" id="" value="2"><label for="n_t">Warning</label>
            </td>
        </tr>
        <tr>
            <td>Subject</td>
            <td><textarea name="nt_subject" id="nt_subject" cols="80" rows="10" required></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
            <button " class="btn btn-success m-1"type="submit" name="submit">Send</button>    
            </td>
        </tr>
    </table>
</form>



</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>