<?php
ob_start();
include('Head.php');

include("../assets/connection/connection.php");
$sel = "SELECT * FROM tbl_alert";
$row = $con->query($sel);

$aid = isset($_GET['alert_id']) ? $_GET['alert_id'] : null;

if ($aid != null) {
  $update = "update tbl_alert set alert_status = 1 where alert_id = $aid";
  $con->query($update);
  header("Location: operator_alertUpdate.php");
  exit();
}

if (isset($_POST['extend_date'])) {
  header("Location: operator_alertExtend.php");
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

  <form action="" method="post" onsubmit="return validateDates()">
    <table width="200" >
      <tbody>
        <tr>
          <td>Alert id</td>
          <td>Note</td>
          <td>Status</td>
          <td>Start date</td>
          <td>End date</td>
          <td  >Action</td>
        </tr>
        <?php
        while ($data = $row->fetch_assoc()) {
        ?>
          <tr>

            <td><?php echo $data['alert_id'];
                $aid = $data['alert_id']; ?></td>
            <td><?php echo $data['alert_note']; ?></td>
            <td><?php
                $status = $data['alert_status'];
                if ($status == 0)
                  echo "Pending";
                else if ($status == 1)
                  echo "Maintanance done";
                ?>
            </td>
            <td><?php echo $data['expected_start_date']; ?></td>
            <td><?php echo $data['expected_end_date']; ?></td>
            <td>
              <?php
              if ($status == 0) {
              ?>
              <button type="button" class="btn btn-warning m-1"><a href="operator_alertExtend.php?alert_id=<?php echo $data['alert_id']; ?>">Extend Date</a></button>
              <button type="button" class="btn btn-success m-1"><a href="operator_alertUpdate.php?alert_id=<?php echo $data['alert_id']; ?>">Completed</a></button>
             
                
              <?php
              } else
                echo "Completed";
              ?>

            </td>

          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </form>




</body>
<?php
        include('Foot.php');
         ob_end_flush();
        ?>
</html>