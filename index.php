<!DOCTYPE html>
<html lang="en">
<!-- <?php
	session_start();
	if (isset($_SESSION['status']) == "login") {
		header("Location: http://localhost/persediaan/view/main/index.php?h=dashboard");
	}
?> -->

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Sistem Informasi Pendataan Barang</title>

  <!-- Custom fonts for this template-->
  <link href="http://localhost/persediaan/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="http://localhost/persediaan/assets/vendor/jquery/jquery.min.js"></script>
  <link href="http://localhost/persediaan/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
	<?php 
	if(isset($_GET['err'])=='404'){
		echo "<script type='text/javascript'>alert('Username & Password Salah');</script>";
	}elseif(isset($_GET['err'])=='405'){
		echo "<script type='text/javascript'>alert('Password Salah');</script>";
	}
	?>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
			        <h1 class="h4 text-gray-900 mb-4">Sistem informasi Pendataan Barang</h1>
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form method="POST" action="controller/login.php" autocomplete="off">
                    <div class="form-group">
						<input type="text" class="form-control" id="user" name="user" placeholder="Username">
                    </div>
                    <div class="form-group">
						<input type="password" class="form-control" id="pass" name="pass" placeholder="password">
                    </div>
					<button type="submit" class="btn btn-primary btn-block">login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="http://localhost/persediaan/assets/vendor/jquery/jquery.min.js"></script>
  <script src="http://localhost/persediaan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/persediaan/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/persediaan/assets/js/sb-admin-2.min.js"></script>

</body>

</html>