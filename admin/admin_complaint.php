<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

if(isset($_GET['cid']))
{
    $up="UPDATE `tbl_complaint` SET cmp_status=1 WHERE cmp_id='".$_GET['cid']."'";
    $con->query($up);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints List</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

<h2>COMPLAINTS</h2>

<form id="form2" name="form2" method="post" action="">
    <table width="700">
        <tr>
            <td width="50">Complaint ID</td>
            <td width="80">Date</td>
            <td width="100">Title</td>
            <td width="200">Detail</td>
    
            <td width="50">User ID</td>
            <td width="70">Action</td>
        </tr>

        <?php
        $selquery = "SELECT * FROM tbl_complaint";
        $result = $con->query($selquery);

        while($data = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $data["cmp_id"]?></td>
            <td><?php echo $data["cmp_date"]?></td>
            <td><?php echo $data["cmp_title"]?></td>
            <td><?php echo $data["cmp_detail"]?></td>
         
            <td><?php echo $data["user_id"]?></td>
            
            <td>
                <?php if ($data["cmp_status"]==0)
                {
                    ?><a href="admin_complaint.php ? cid=<?php echo $data["cmp_id"] ?>"><button type="button" class="btn btn-secondary m-1">UPDATE</button></a><?php
                }
                else
                {
                    echo"Action taken";
                }
?>
                    </td>
        </tr>
        <?php
        }
        ?>
    </table>
</form>

</body>

<?php
include('Foot.php');
ob_end_flush();
?>
</html>
