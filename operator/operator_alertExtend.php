<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
$aid = $_GET['alert_id'];

$sel = "SELECT * FROM tbl_alert where alert_id=$aid";
$row = $con->query($sel);
if (isset($_POST['submit'])) {
    $date=$_POST['extend_date'];
    $update = "UPDATE tbl_alert SET expected_end_date = '$date' WHERE alert_id = $aid";
    $con->query($update);
    header("Location: operator_alertUpdate.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Operator -Update Alert status</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>

  
    <form action="" method="post" onsubmit="return validateExtendedDate()">

        <table width="200" >
            <tbody>
                <tr>
                    <td>Alert id</td>
                    <td>Note</td>
                    <td>Start date</td>
                    <td>End date</td>
                    <td>Extend till</td>
                    <td>Action</td>
                </tr>
                <?php
                $data = $row->fetch_assoc()
                ?>
                <tr>

                    <td><?php echo $data['alert_id']; ?></td>
                    <td><?php echo $data['alert_note']; ?></td>

                    <td><?php echo $data['expected_start_date']; ?></td>
                    <td><?php echo $data['expected_end_date']; ?></td>
                    <td><input type="date" name="extend_date" id="extend_date" required></td>

                    <td>
                    <button type="submit" name="submit" class="btn btn-secondary m-1">Extend Date</button>  
                   </td>

                </tr>

            </tbody>
        </table>
    </form>


    <script>
        function validateExtendedDate() {
            var endDate = new Date("<?php echo $data['expected_end_date']; ?>");
            var extendDate = new Date(document.getElementById('extend_date').value);

            if (extendDate <= endDate) {
                alert("Extended date must be after the expected end date.");
                return false;
            }
            return true;
        }
    </script>


</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>