<?php
include("../assets/connection/connection.php");

ob_start();
include('Head.php');


$sel_note = "select * from tbl_notification";
$row = $con->query($sel_note);
$sel_alert = "select * from tbl_alert";
$rowa = $con->query($sel_alert);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-notifications </title>
  <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>
  
<h2>NOTIFICATIONS</h2>
    <table width="200" >
      <tbody>
        <tr>
          <td width="20%">Date</td>
          <td width="80%">Notificatin </td>
        </tr>
        <?php
        while ($data = $row->fetch_assoc()) {
        ?>
          <tr>


            <td><?php echo$data['note_date'];  ?></td>
            <td><?php echo$data['note_detail'];  ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </form>

  <h2>ALERTS</h2>
 
 <table width="200" >
   <tbody>
     <tr>
       <td width="20%">Date</td>
       <td >Alert </td>
       <td >Status</td>
     </tr>
     <?php
     while ($data = $rowa->fetch_assoc()) {
     ?>
       <tr>


         <td><?php echo$data['alert_date'];  ?></td>
         <td><?php echo$data['alert_note'];  ?></td>
         <td><?php
                $status = $data['alert_status'];
                if ($status == 0)
                  echo "Pending";
                else if ($status == 1)
                  echo "Maintanance done";
                ?></td>
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