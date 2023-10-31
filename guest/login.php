<?php
session_reset();
session_start();
include("../assets/connection/connection.php");
if(isset($_POST["submit"]))
{
	$sel="select * from tbl_admin where admin_email='".$_POST["email"]."' and  admin_password='".$_POST["password"]."'";
	$a_res=$con->query($sel);
	
	$sel="select * from tbl_user where user_email='".$_POST["email"]."' and  user_password='".$_POST["password"]."' and user_vstatus > 1";
	$u_res=$con->query($sel);
	
	$sel="select * from tbl_operator where operator_email='".$_POST["email"]."' and  operator_password='".$_POST["password"]."'";
	$o_res=$con->query($sel);
	
	if($a_res->num_rows>0)
	{
		$row=$a_res->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['name']=$row['admin_name'];
		$_SESSION['pwd']=$row['admin_password'];
		header("location: ../admin/admin_dashboard.php");
	}

	if($o_res->num_rows>0)
	{
		$row=$o_res->fetch_assoc();
		$_SESSION['oid']=$row['operator_id'];
		$_SESSION['name']=$row['operator_name'];
		$_SESSION['pwd']=$row['operator_password'];
		header("location: ../operator/operator_dashboard.php");
	}

	if($u_res->num_rows>0)
	{
		$row=$u_res->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['name']=$row['user_name'];
		$_SESSION['pwd']=$row['user_password'];
    $_SESSION['email']=$row['user_email'];
		header("location: ../user/user_dashboard.php");
	}
	else
	{
		echo "<script>alert('invalid username / password  or user not yet verified!!!');</script>";
	}
}

?>



        
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pure Flow - Login</title>
  <link rel="shortcut icon" type="image/png" href="../assets/Template/Admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/Template/Admin/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/Template/Admin/assets/images/logos/pf.png" width="180" alt="">
                </a>
                <p class="text-center">Fluid Solutions for Effortless Water Management</p>
                <form method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
					<input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" id="email" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
            
					<input type="password" class="form-control" placeholder="Enter password"name="password" id="password" required>

                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.php">Forgot Password ?</a>
                  </div>
				  <div class="d-flex align-items-center justify-content-center">
          <button type="submit" class="btn btn-primary m-1" name="submit" id="submit">
                  
        Sign in
      </button>
				  </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Pure Flow?</p>
                    <a class="text-primary fw-bold ms-2" href="newuser.php">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/Template/Admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/Template/Admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>