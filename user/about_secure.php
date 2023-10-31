<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Secure Payment Gateway - PURE FLOW.COM</title>
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">Secure Payment Gateway</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="user_dashboard.php">Home</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Secure Payment Gateway</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Secure Payment Gateway Section Start -->
    <div class="container-xxl secure-payment-gateway mb-5" style="margin-top: 6rem;">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <img src="../assets/Template/Index/img/secure.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">Secure and Hassle-Free Payments</p>
                        <h1 class="display-6 mb-4">Experience a Safe Payment Process</h1>
                        <p class="mb-4">At PURE FLOW, we prioritize the security of your payments. Our payment gateway is designed to provide a safe and seamless transaction experience. You can trust that your financial information is protected.</p>
                        <p class="mb-4">We utilize advanced encryption protocols and adhere to industry standards to ensure that your payments are processed securely. Experience worry-free payments with PURE FLOW.</p>
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
