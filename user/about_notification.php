<?php
ob_start();
include('Head.php');
include("../assets/connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Instant Notifications - PURE FLOW.COM</title>
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
            <h1 class="display-2 text-white mb-4 animated slideInDown">Instant Notifications</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="user_dashboard.php">Home</a></li>
                    <li class="breadcrumb-item text-primary" aria-current="page">Instant Notifications</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Instant Notifications Section Start -->
    <div class="container-xxl instant-notifications mb-5" style="margin-top: 6rem;">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <img src="../assets/Template/Index/img/notification.png" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">Stay Updated in Real Time</p>
                        <h1 class="display-6 mb-4">Instant Notifications for You</h1>
                        <p class="mb-4">At PURE FLOW, we provide instant notifications and alerts to keep you informed about important updates, maintenance schedules, and more. Our notification system ensures you receive timely information in real time.</p>
                        <p class="mb-4">You can customize your notification preferences to receive alerts via email, or through our web site. Stay connected and stay updated with PURE FLOW.</p>
                        <div class="col-12">
                            <a href="user_notification.php" class="btn btn-primary rounded-pill py-3 px-5" type="button" name="submit">VIEW NOTIFICATIONS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instant Notifications Section End -->

    <!-- Add your existing footer section if needed -->

    <!-- Add your existing JavaScript links if needed -->

</body>
<?php
include('Foot.php');
ob_end_flush();
?>

</html>
