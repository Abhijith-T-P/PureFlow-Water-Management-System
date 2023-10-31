<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

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
<br>
<h2 class="text-center">COMPLAINTS</h2>

<form id="form2" name="form2" method="post" action="">
    <table width="700">
        <tr>
            <td width="50">Complaint ID</td>
            <td width="80">Date</td>
            <td width="100">Title</td>
            <td width="200">Detail</td>
            <td width="50">Status</td>
          
        </tr>

        <?php
        $selquery = "SELECT * FROM tbl_complaint where user_id='".$_SESSION['uid']."' ";
        $result = $con->query($selquery);

        while($data = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $data["cmp_id"]?></td>
            <td><?php echo $data["cmp_date"]?></td>
            <td><?php echo $data["cmp_title"]?></td>
            <td><?php echo $data["cmp_detail"]?></td>
            <td><?php
            if($data["cmp_status"]==0) echo"Under Review";
            else echo"Solved"; ?></td>
        
            
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
