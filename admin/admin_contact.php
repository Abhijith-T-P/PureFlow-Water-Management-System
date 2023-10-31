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
    <title>Contact List</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>
<body>

<h2>GUEST  ENQUIRY  LIST</h2>

<table width="700" border="1">
    <tr>
        <td>Contact ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Mobile</td>
        <td>Subject</td>
        <td>Message</td>
    </tr>

    <?php
    $selquery = "SELECT * FROM tbl_contact";
    $result = $con->query($selquery);

    while($data = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $data["c_id"]?></td>
        <td><?php echo $data["c_name"]?></td>
        <td><?php echo $data["c_email"]?></td>
        <td><?php echo $data["c_mobile"]?></td>
        <td><?php echo $data["c_subject"]?></td>
        <td><?php echo $data["c_message"]?></td>
    </tr>
    <?php
    }
    ?>
</table>

</body>

<?php
include('Foot.php');
ob_end_flush();
?>
</html>
