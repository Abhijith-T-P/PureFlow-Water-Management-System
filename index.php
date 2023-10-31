<?php
session_start();
include("assets/connection/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpMail/src/Exception.php';
require 'assets/phpMail/src/PHPMailer.php';
require 'assets/phpMail/src/SMTP.php';

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email= $_POST['email'];
    $mobile= $_POST['mobile'];
    $sub=$_POST['subject'];
    $message=$_POST['message'];
    $ins="INSERT INTO tbl_contact(c_name, c_email,c_mobile, c_subject, c_message) VALUES ('$name','$email','$mobile','$sub','$message')";
    if($con->query($ins))
    {
        echo "<script>alert('Thank You for Contacting PureFlow');</script>";
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pureflow.wms@gmail.com'; // Your gmail
        $mail->Password = 'tkjicgwsjvvsocen'; // Your gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('pureflow.wms@gmail.com'); // Your gmail

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "Thank You for Contacting PureFlow";
        $mail->Body = "Dear" . " " . $name . " " . "<br><br>

        Thank you for reaching out to us. We have received your contact request and appreciate the opportunity to assist you.<br><br>

        Our team is currently reviewing your inquiry, and we will be in touch shortly. We aim to provide you with the best possible support and look forward to addressing your needs.<br><br>
        
        If you have any further questions or additional information to share, please feel free to reply to this email @pureflow.wms@gmail.com.<br><br>
        
        Thank you for considering PureFlow. We value your interest in our services.<br><br>
        
        Best regards,<br>
        
        PureFlow Support Team ";
        if ($mail->send()) {
          echo "Sended";
        } else {
          echo "Failed";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PURE FLOW -Fluid Solutions for Effortless Water Management.</title>
    <link rel="shortcut icon" type="image/png" href="assets/Template/Admin/assets/images/logos/favicon.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/Template/Index/img/favicon.ico" rel="icon">

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
    <link href="assets/Template/Index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/Template/Index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/Template/Index/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/Template/Index/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/Template/Index/css/style.css" rel="stylesheet">
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
               
                    <h2 class="text-white fw-bold m-0">PURE FLOW Water Managenent Service</h2>
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>DC, Pullikanam, Vagamon, IDUKKI.</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>pureflow@gmail.com</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+91 985 9854 849 </small>
                    
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
                <img src="../assets/Template/Admin/assets/images/logos/favicon.png" alt="logo">  <h1 class="fw-bold m-0">PURE FLOW</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="guest/about.html" class="nav-item nav-link">About</a>
                        <a href="guest/service.html" class="nav-item nav-link">Services</a>
                        <a href="guest/contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="guest/login.php" class="btn btn-primary rounded-pill py-2 px-3">Login Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/Template/Index/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    <p class="fs-4 text-white animated slideInRight">Join now at 
                                        <strong>PURE FLOW</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-4 animated slideInRight">Fluid Solutions for Effortless Water Management.</h1>
                                    <a href="guest/newuser.php"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Join Now
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/Template/Index/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    <p class="fs-4 text-white animated slideInLeft">Join now at  <strong>PURE FLOW</strong>
                                    </p>
                                    <h1 class="display-1 text-white mb-5 animated slideInLeft">Water Services Made Simple, Payments Made Easy.</h1>
                                    <a href="guest/newuser.php"
                                        class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Join Now</a>
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


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/Template/Index/img/icon/icon-1.gif" alt="Icon">
                            
                        </div>
                        <h5 class="mb-3">Billing Made Easy</h5>
                        <p class="mb-0">Experience the simplicity of paying your water bill online. Our secure payment portal ensures a seamless transaction process with just a few clicks.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/Template/Index/img/icon/icon-2.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Need Assistance</h5>
                        <p class="mb-0">Our intuitive service request feature allows you to submit requests for services or report issues with ease.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/Template/Index/img/icon/icon-3.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">Fair Prices</h5>
                        <p class="mb-0"> system automatically calculates fair prices based on water usage, ensuring accurate and hassle-free billing for our customers' convenience and satisfaction.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                            <img class="img-fluid" src="assets/Template/Index/img/icon/icon-4.png" alt="Icon">
                        </div>
                        <h5 class="mb-3">24/7 Support</h5>
                        <p class="mb-0">We provide round-the-clock assistance, ensuring uninterrupted access to our services.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Our Services</p>
                <h1 class="display-5 mb-5">Services that We Offer</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-5.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Bill Payment</h4>
                                <p class="mb-0">Easily pay your water bills online using our secure and convenient platform. Choose from various payment options and never miss a due date again.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-6.png" alt="Icon">
                            </div>x
                            <h5 class="mb-3">Service Requests</h4>
                                <p class="mb-0">Lodge service requests effortlessly through our user-friendly interface. Whether it's a repair, maintenance, or inquiry, our system ensures prompt attention to your needs.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-7.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Instant Notifications</h4>
                                <p class="mb-0">Receive real-time updates on the status of your service requests. Our notification system keeps you informed every step of the way, providing peace of mind.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-8.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Online Account Management</h4>
                                <p class="mb-0">Access your account anytime, anywhere. View billing history, update personal information, and monitor water usage trends, all from the comfort of your own device.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-9.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Usage History Insights</h4>
                                <p class="mb-0">Gain valuable insights into your water consumption patterns over time. Understand your usage trends to make informed decisions about conservation</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="assets/Template/Index/img/icon/icon-10.png" alt="Icon">
                            </div>
                            <h5 class="mb-3">Secure Payment Gateway</h4>
                                <p class="mb-0">Rest easy knowing that your payment information is protected by top-notch encryption technology, providing a secure and reliable transaction experience.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                  
                    <h1 class="display-5 mb-4">Need Our Expert Help? We're Here!</h1>
                    <p>Facing a water-related issue? We're here to assist you. Our dedicated support team is available around the clock to address your concerns and provide expert guidance.Whether it's a billing inquiry, service request, or simply seeking advice on water conservation, we're committed to ensuring your experience with us is seamless and worry-free. </p>
                    <p class="mb-4"> Trust us to be your reliable partner in managing your water services. Your satisfaction is our priority, and we're just a message or call away from resolving any issues you may encounter. Let us help you today.</p>
                    <a class="d-inline-flex align-items-center rounded overflow-hidden border border-primary" href="">
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
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" required   placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" required   placeholder="Your Email">
                                <label for="mail">Your Email</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="mobile"    placeholder="Your Mobile">
                                <label for="mobile">Your Mobile</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating">
                                <select class="form-select" required name="subject">
                                    <option selected>Get connection</option>
                                    <option value="price" >Know the price</option>
                                    <option value="service">Service related</option>
                                    <option value="other">Other..</option>
                                </select>
                                <label for="service">Choose A Service</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" required   placeholder="Leave a message here" name="message"
                                    style="height: 130px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <br>
                            <button class="btn btn-primary w-100 py-3"  type="submit" name="submit">Submit Now</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Quote Start -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>DC, Pullikanam, Vagamon, IDUKKI.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 985 9854 849 </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>pureflow@gmail.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
               
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Office Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Thank you for choosing PURE FLOW. Together, we're making a difference in the lives of our community members and the environment we all cherish.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="#">PUREFLOW</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    
                    PureFlow.inc 2023
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/Template/Index/lib/wow/wow.min.js"></script>
    <script src="assets/Template/Index/lib/easing/easing.min.js"></script>
    <script src="assets/Template/Index/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/Template/Index/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/Template/Index/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/Template/Index/js/main.js"></script>
</body>

</html>