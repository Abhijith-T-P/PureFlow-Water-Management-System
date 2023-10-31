<?php
ob_start();
include('Head.php');

include("../assets/connection/connection.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Operator -Pending</title>
</head>

<div class="container-fluid">

    <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          
                <h5 class="ctitle fw-semibold mb-4">PENDING BILL</h5>
                <table class="table text-nowrap mb-0 align-middle">
                    <tr>
                        <td>
                            <h5 class="fw-semibold mb-0">Bill No</h5>
                        </td>
                        <td>
                            <h5 class="fw-semibold mb-0">Status</h5>
                        </td>
                        <td>
                            <h5 class="fw-semibold mb-0">Date</h5>
                        </td>
                        <td>
                            <h5 class="fw-semibold mb-0">Amount</h5>
                        </td>
                    </tr>
                    <?php
                    $bill = "SELECT * FROM tbl_bill WHERE  bill_status=1";
                    $row = $con->query($bill);
                    while ($bills = $row->fetch_assoc()) {
                    ?>
                        <tr>
                            <td>
                                <h6 class="fw-normal mb-0"></h6><?php echo $bills['bill_no']; ?>
                            </td>
                            <td>
                                <h6 class="fw-normal mb-0"></h6><?php echo "Payment Pending"; ?>
                            </td>
                            <td>
                                <h6 class="fw-normal mb-0"></h6><?php echo $bills['bill_date']; ?>
                            </td>
                            <td>
                                <h6 class="fw-normal mb-0"></h6><?php echo $bills['bill_amount']; ?>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </table>
                <?php
                include('Foot.php');
                ob_end_flush();
                ?>

</html>