<?php
include("../assets/connection/connection.php");

ob_start();
include('Head.php');
$year = date("Y");
$user_id = $_SESSION["uid"];
$query = "SELECT * FROM tbl_user WHERE user_id = $user_id";
$result = $con->query($query);
if (!$result) {
  die("Error: " . $con->error);
}
$userData = $result->fetch_assoc();



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>User-View Profile</title>
  <link rel="stylesheet" href="../assets/Style/style.css">
</head>

<body>


  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-0 feature-row">

        <form method="post" action="">
          <table width="290">
            <tbody>
              <tr>
                <td width="143"><label for="txt_name">Name:</label></td>
                <td width="162"><?php echo $userData["user_name"] ?> </td>
              </tr>

              <tr>
                <td><label for="txt_tel2">Contact:</label></td>
                <td><?php echo $userData["user_contact"] ?></td>
              </tr>
              <tr>
                <td><br>
                  <label for="txt_email2">Email:</label>
                </td>
                <td><?php echo $userData["user_email"] ?></td>
              </tr>
              <tr>
                <td><label for="txt_address2">Address:</label></td>
                <td><?php echo $userData["user_address"]; ?></td>
              </tr>
            </tbody>
          </table>
        </form>
        <p class="edit_profile text-center"><a href="user_edit.php">Edit Profile</a></p>

      </div>
    </div>
  </div>
  <!-- Features End -->

  <?php
  $bill="SELECT * FROM `tbl_bill` Where user_id = $user_id order by bill_id desc ";
  $value=$con->query($bill);
  $am=$value->fetch_assoc();
  $amount=$am['bill_amount'];
  $reading=$am['bill_reading'];

  $ser="SELECT * FROM `tbl_service_request` Where user_id = $user_id order by req_id desc ";
  $rea=$con->query($ser);
  $service=$rea->fetch_assoc();
  $type=$service['req_type'];
  $detail=$service['req_detail'];
  $status=$service['req_status'];


  
  $anual = "SELECT SUM(bill_amount) AS annual_sum   FROM tbl_bill WHERE user_id = $user_id AND YEAR(bill_date) = $year";
  $result = $con->query($anual);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $annual_sum = $row['annual_sum'];
  } else {
    $annual_sum = 0;
  }

  ?>
    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
        <h3 class="text-center">Overview</h3>
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">                      
                        <div class="btn-square bg-light rounded-circle mb-4" >
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/tap.gif" alt="Icon">
                            
                        </div>
                        <h5 class="mb-3">Usage</h5>
                        <p class="mb-0">Latest month Bill : Rs <?php  echo$amount; ?>/-</p>
                        <p class="mb-0">Last Reading : <?php  echo$reading; ?>.ltrs</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" >
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/service.gif" alt="Icon">
                        </div>
                        <h5 class="mb-3">LAST SERVICE</h5>
                        <p class="mb-0"> Type :  <?php  if($status==0)
                         {
                           echo "repair";
                         }
                         if($status==1)
                         {
                           echo "Service";
                         }
                         if($status==2)
                         {
                             echo "Other";
                         } ?></p>
                        <p class="mb-0"> Detail :  <?php  echo$detail; ?></p>
                        <p class="mb-0"> Status :  <?php   
                         if($status==0)
                         {
                           echo "Not Accepted";
                         }
                         if($status==1)
                         {
                           echo "Request Accepted";
                         }
                         if($status==2)
                         {
                             echo "Out for service";
                         }
                         if($status==3)
                         {
                             echo "Visited";
                         }
                         if($status==4)
                         {
                            echo "Fixed"; 
                         }
                         if($status==6)
                         {
                            echo "waiting for Payment "; 
                           
                         }
                         
                         ?></p>
                    </div>
                </div>
                
                
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" >
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/year.gif" alt="Icon">
                        </div>
                        <h5 class="mb-3">Anual</h5>
                        <p class="mb-0"> Anual water Bill :RS  <?php  echo$annual_sum; ?>/-</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" ><a href="complaint.php">
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/opinions.gif" alt="Icon"></a>
                        </div>
                        <h5 class="mb-3">Complaint</h5>
                        <p class="mb-0"> <a href="complaint.php">Review Now</p></a>
                    </div>
                </div>
        </div>
    </div>
    <!-- Features End -->


</body>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>