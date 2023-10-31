<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");

?>

<!DOCTYPE html>
<html>
<body>
    <h2 class="text-center">Bills</h2>
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
               
              
            </div>
            <div class="row g-4">
                <a href="user_bill.php">
                <div class=" col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-5.png" alt="Icon">
                            </div>                           
                            <h5 class="mb-3">Water bill</h4>                           
                        </div>                     
                    </div></a>
                </div>
                <div class=" col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="request_status.php">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-6.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Service bills</h4>                               
                        </div>                       
                    </div></a>
                </div>
                
                </div>
              
            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
</body>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>