<?php
include('SessionValidator.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PURE FLOW</title>
  <link rel="shortcut icon" type="image/png" href="../assets/Template/Admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/Template/Admin/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="admin_dashboard.php" class="text-nowrap logo-img">
            <img src="../assets/Template/Admin/assets/images/logos/pf.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">USER</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="User_list.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">User List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="UserVerification.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">User Verification</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="UserVerificationDelete.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Reject List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_complaint.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-octagon"></i>
                </span>
                <span class="hide-menu">Complaints</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">GUEST</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_contact.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-octagon"></i>
                </span>
                <span class="hide-menu">Enquiry</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">OPERATOR</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="operator_list.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Operator List</span>
              </a>
            </li>

            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="operator_reg.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="  report.php" aria-expanded="false">
                <span>
                <i class="ti ti-brand-drops fs-4"></i>
                </span>
                <span class="hide-menu">Quality Report </span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ADMIN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_edit.php" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Edit Password</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_reg.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">NOTIFICATIONS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_viewNotification.php" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">View</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="admin_notification.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-octagon"></i>
                </span>
                <span class="hide-menu">Send</span>
              </a>
            </li>
           
          </ul>

        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                              <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="admin_viewNotification.php">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">

            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <h1>Admin</h1>

              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/Template/Admin/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">


                    <a href="../Logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">