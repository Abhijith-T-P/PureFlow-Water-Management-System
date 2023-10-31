<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
$year = date("Y");
$month = date("m");

$anual = "SELECT SUM(bill_amount) AS annual_sum FROM tbl_bill WHERE YEAR(bill_date) = $year";
$result = $con->query($anual);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $annual_sum = $row['annual_sum'];
} else {
  $annual_sum = 0;
}

$monthly = "SELECT SUM(bill_amount) AS monthly_sum FROM tbl_bill WHERE YEAR(bill_date) = $year AND MONTH(bill_date) = $month";
$result = $con->query($monthly);
if ($result) {
  $row = mysqli_fetch_assoc($result);
  $monthly_sum = $row['monthly_sum'];
} else {
  $monthly_sum = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Operator Dashboard</title>
    <link rel="stylesheet" href="../assets/Style/style.css">
</head>

  <!--  Header End -->
  <div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
          
          <h5 class="card-title fw-semibold mb-4">ALERT</h5>
          <div class="card-body">
            <table class="table text-nowrap mb-0 align-middle">
              <tr>
                <td>
                  <h5 class="fw-semibold mb-0">Date</h5>
                </td>
                <td>
                  <h5 class="fw-semibold mb-0">Note</h5>
                </td>
              </tr>
              <?php
              $aler = " SELECT * FROM tbl_alert  ORDER BY alert_date DESC LIMIT 10";
              $row = $con->query($aler);
              while ($alert = $row->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $alert['alert_date']; ?>
                  </td>
                  <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $alert['alert_note']; ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
              </div>
              <br>
              <h5 class="card-title fw-semibold mb-4">NOTIFICATIONS</h5>
              <div class="card-body">
          
        
            <table class="table text-nowrap mb-0 align-middle">
              <tr>
                <td>
                  <h5 class="fw-semibold mb-0">Date</h5>
                </td>
                <td>
                  <h5 class="fw-semibold mb-0">Subject</h5>
                </td>
              </tr>
              <?php
              $not = " SELECT * FROM tbl_notification  ORDER BY note_id DESC LIMIT 10";
              $row = $con->query($not);
              while ($notification = $row->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $notification['note_date']; ?>
                  </td>
                  <td>
                    <h6 class="fw-normal mb-0"></h6><?php echo $notification['note_detail']; ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
              </div>
              </div>
              </div>
            </div>

</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>