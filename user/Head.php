<?php
include('SessionValidator.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PURE FLOW -Fluid Solutions for Effortless Water Management.</title>
    <link rel="shortcut icon" type="image/png" href="assets/Template/Admin/assets/images/logos/favicon.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/Template/Index/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/Template/Index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/Template/Index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/Template/Index/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/Template/Index/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/Template/Index/css/style.css" rel="stylesheet">
   
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <a href="index.php">
                    <h2 class="text-white fw-bold m-0">PURE FLOW WATER MANAGEMENT </h2>
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>DC, Pullikanam, Vagamon, IDUKKI.</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>pureflow@gmail.com</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+91 985 9854 849 </small>
                    <div class="ms-3 d-flex">                   
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="index.php" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">PURE FLOW</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="user_dashboard.php" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="report.php" class="nav-item nav-link">Water Report</a>
                        <a href="user_bill.php" class="nav-item nav-link">Bill</a>
                    </div>
                    
                </div>
                <a href="user_profile.php" class="nav-item nav-link">Profile</a>
                <div class="ms-auto d-none d-lg-block">
                        <a href="../Logout.php" class="btn btn-danger rounded-pill py-2 px-3">Log Out</a>
                    </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->