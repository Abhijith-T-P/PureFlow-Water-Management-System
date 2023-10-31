<?php
ob_start();
include('Head.php');

include("../assets/connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedMonth = $_POST["selectedMonth"];
    $bill = "SELECT * FROM tbl_bill WHERE DATE_FORMAT(bill_date, '%m') = '$selectedMonth' ORDER BY bill_date DESC";
    $row = $con->query($bill);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Operator Dashboard</title>
</head>

<div class="container-fluid">
    <form method="post">
        <div class="row">
            <div class="col-lg-4">
                <label for="monthSelect" class="form-label">Select Month:</label>
                <select class="form-select" id="monthSelect" name="selectedMonth">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">USAGE</h5>
                        <table class="table text-nowrap mb-0 align-middle">
    <tr>
        <td>
            <h5 class="fw-semibold mb-0">Bill No</h5>
        </td>
        <td>
            <h5 class="fw-semibold mb-0">Status</h5>
        </td>
        <td>
            <h5 class="fw-semibold mb-0">Amount</h5>
        </td>
    </tr>
    <?php
    if (isset($row) && $row) {
        while ($bills = $row->fetch_assoc()) {
    ?>
            <tr>
                <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $bills['bill_no']; ?>
                </td>
                <td>
                    <h6 class="fw-normal mb-0"></h6><?php 
                    if($bills['bill_status']==1)
                    echo"Payment Pending";
                    else
                    echo"Paid ";
                    ?>
                    

                </td>
                <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $bills['bill_amount']; ?>
                </td>
            </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='3'>No bills found for the selected month.</td></tr>";
    }
    ?>
</table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <input type="submit" class="btn btn-primary" value="Filter Bills">
            </div>
        </div>
    </form>
</div>

<?php
include('Foot.php');
ob_end_flush();
?>

</html>
