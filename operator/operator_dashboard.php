<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

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
      <div class="col-lg-12 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">NOTIFICATIONS</h5>
            <table class="table text-nowrap mb-0 align-middle"  >
              <tr>
                <td>
                  <h5 class="fw-semibold mb-0">Date</h5>
                </td>
                <td>
                  <h5 class="fw-semibold mb-0">Subject</h5>
                </td>
              </tr>
              <?php
              $not = " SELECT * FROM tbl_notification  ORDER BY note_id DESC LIMIT 2";
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
            <h5 class="card-title fw-semibold mb-4">ALERT</h5>
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
              $aler = " SELECT * FROM tbl_alert  ORDER BY alert_date DESC LIMIT 2";
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
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
           
            </div>
          </div>
        </div>
      </div>
    </div>
    
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle" width=80%>
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Id</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Date</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Name</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Usage</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Amount</h6>
                    </th>
                  </tr>
                </thead>




                <tbody>
                  <?php
                   $select = "SELECT * FROM tbl_bill b INNER JOIN tbl_user u ON b.user_id = u.user_id WHERE b.bill_status = 3 ORDER BY b.pay_date DESC LIMIT 5";
                   

                  $row=$con->query($select);
                  $i=0;
                  $i++;
                  while($recent_payment=$row->fetch_assoc()) {
                    ?>
                  <tr>
                    <td class="border-bottom-0">
                      <h6 class="fw-normal mb-0"><?php echo $recent_payment['bill_no']; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class=" mb-0 fw-normal"><?php echo $recent_payment['pay_date']; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class=" mb-1 fw-normal"><?php echo $recent_payment['user_name']; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php 
                      $pre=$recent_payment['bill_reading'];
                      $cur=$recent_payment['bill_pre_reading'];
                      $am=$pre-$cur;
                      echo $am; ?>
                      
                    </p>
                    </td>
                    
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4"><?php echo $recent_payment['bill_amount']; ?></h6>
                    </td>
                  </tr>
                 <?php } ?>
                </tbody>
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