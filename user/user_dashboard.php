<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
$sel_note = "select * from tbl_notification ORDER BY note_id DESC";

$row = $con->query($sel_note);
$data = $row->fetch_assoc()
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/Style/style.css">

</head>

<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <marquee direction="left  "><strong> <mark> Notification :</mark> <?php echo $data['note_detail']; ?></strong> </marquee>
            </div>
        </div>
    </div>
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="../assets/Template/Index/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Welcome to
                                        <strong>PURE FLOW</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-4 animated slideInRight">Fluid Solutions for Effortless Water Management.</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="../assets/Template/Index/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInLeft">Welcome to <strong>PURE FLOW</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-5 animated slideInLeft">Water Services Made Simple, Payments Made Easy.</h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->




    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Our Services</p>
              
            </div>
            <div class="row g-4">
            <a href="user_b_redirect.php">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-5.png" alt="Icon">
                            </div>
                            
                            <h5 class="mb-3">Bill Payment</h4>
                            
                        </div>
                        
                    </div></a> 
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="user_serviceRequest.php">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-6.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Service Requests</h4>
                               
                        </div>
                        
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a href="user_notification.php">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-7.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Notificatins</h4>
                                
                        </div>
                        
                    </div>
                 
                    </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <div class="row">
            <div class=" d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class=" text-center">
                                <h5 class="card-title fw-semibold ">Latest Qulaity Report</h5>
                            </div>
                        </div>
                    </div>
                    
                    <table width="200" border="1">
                        <?php
                        $rep="SELECT * FROM tbl_report ORDER BY report_id DESC";
                        $repdata=$con->query($rep);
                        $reprow=$repdata->fetch_assoc();
                        ?>
                        <tbody>
                            <tr>
                                <td>Arsenic</td>
                                <td>Barium</td>
                                <td>Chromium</td>
                                <td>selenium</td>
                            </tr>
                            <tr>
                                <td><?php echo $reprow['Arsenic'];?></td>
                                <td><?php echo $reprow['Barium'];?></td>
                                <td><?php echo $reprow['Chromium'];?></td>
                                <td><?php echo $reprow['selenium'];?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center"><a href="report.php">Vie full report</a></div>
                    
                    <p>&nbsp;</p>

                </div>
            </div>
    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-1.gif" alt="Icon">
                            
                        </div>
                        <h5 class="mb-3">Billing Made Easy</h5>
                        <p class="mb-0">Experience the simplicity of paying your water bill online. Our secure payment portal ensures a seamless transaction process with just a few clicks.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-2.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Need Assistance</h5>
                        <p class="mb-0">Our intuitive service request feature allows you to submit requests for services or report issues with ease.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-3.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Fair Prices</h5>
                        <p class="mb-0"> system automatically calculates fair prices based on water usage, ensuring accurate and hassle-free billing for our customers' convenience and satisfaction.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="../assets/Template/Index/img/icon/icon-4.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="mb-0">We provide round-the-clock assistance, ensuring uninterrupted access to our services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-6">
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                  
                    <h1 class="display-5 mb-4">Need Our Expert Help? We're Here!</h1>
                    
                    <p class="mb-4"> Trust us to be your reliable partner in managing your water services. Your satisfaction is our priority, and we're just a message or call away from resolving any issues you may encounter. Let us help you today.</p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" >
                        <span class="btn-lg-square bg-primary" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </span>
                        <span class="fs-5 fw-medium mx-4">+91 985 9854 849</span>
                    </a>
                </div>
                <form action="" method="post" class="col-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                <div >
                    <br>
                    <h2 class="mb-4">Get in touch</h2><br><br>
                    <div class="row g-3">
                            
                        
                        <div class="col-12 text-center">
                            <br>
                            <a href="contact.php">
                                <button class="btn btn-primary w-100 py-3"  type="button" name="">Contact Now</button>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Quote Start -->

</body>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>