<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
if (isset($_POST['submit'])) {
    $subject = $_POST['alert_subject'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $operator = $_SESSION['oid'];

    $ins = "INSERT INTO tbl_alert(`alert_note`, `operator_id`, `expected_start_date`, `expected_end_date`) VALUES ('$subject', '$operator', '$start_date','$end_date')";

    $con->query($ins);

    echo "<script>alert('Notification sent successfully');window.location.href = 'operator_dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Operator -Notification</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>

    
    <form action="" method="post" onsubmit="return validateDates()">
        <table>
            <tr>
                <td>Note</td>
                <td><textarea name="alert_subject" id="nt_subject" cols="80" rows="10" required></textarea></td>
            </tr>
            <tr>
                <td>Expected Start Date</td>
                <td><input type="date" name="start_date" id="start_date" required></td>
            </tr>
            <tr>
                <td>Expected End Date</td>
                <td><input type="date" name="end_date" id="end_date" required></td>
            </tr>
            <tr>
                <td colspan="2">
                <button type="submit" name="submit" class="btn btn-info m-1">Send</button>  
                </td>
            </tr>
        </table>
    </form>

    <script>
        function validateDates() {
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            if (endDate <= startDate) {
                alert("End date must be after start date");
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