<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About Payment - PURE FLOW.COM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../assets/Template/Admin/assets/images/logos/favicon.png" />
</head>

<body>

    <!-- Add your existing navigation, header, and other sections if needed -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">About Payment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="user_dashboard.php">Home</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">About Payment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Payment Section Start -->
    <div class="container-xxl about-payment mb-5" style="margin-top: 6rem;">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <img src="../assets/Template/Index/img/payment.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">Convenient Payment Solutions</p>
                        <h1 class="display-6 mb-4">Simplify Your Payment Process</h1>
                        <p class="mb-4">At PURE FLOW, we believe in making your payment process as convenient as possible. We offer a range of payment options to suit your preferences.</p>
                        
                        <p class="mb-4">Our payment system is designed to provide you with a hassle-free experience. You can also set up automatic payments for added convenience.</p>
                        <div class="col-12"><a href="user_bill.php">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="button" name="submit">PAY BILL NOW</button>
                            </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Payment Section End -->

    <!-- Add your existing footer section if needed -->

    <!-- Add your existing JavaScript links if needed -->

</body>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>
