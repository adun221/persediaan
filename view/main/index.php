<?php 
	session_start();
	if (isset($_SESSION['status']) == "login") {
	}else{
		header("Location: http://localhost/persediaan");
	}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="in" xml:lang="in">
<?php 
	$baseurl = "http://localhost/persediaan/";
	$urlcontroller = "http://localhost/persediaan/controller";
	$urlview = "http://localhost/persediaan/view";
	include '../../controller/konek.php';
	include '../_assets/head.php'; // mengambil halaman head 
?>

<script src="http://localhost/persediaan/assets/vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost/persediaan/assets/bundles/select2/dist/css/select2.min.css">

<script src="http://localhost/persediaan/assets/bundles/select2/dist/js/select2.full.min.js"></script>

  <link href="http://localhost/persediaan/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<body id="page-top">

  <div id="wrapper">

<?php 
	include '../_assets/sidebar.php'; // mengambil halaman sidebar 
?>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <?php 
			include '../_assets/topbar.php';

			if (isset($_GET['h'])) { // cek kondisi halaman
				if ($_GET['h']=='') {
					include '../_assets/default.php';
				}else{
					include $_GET['h'].".php";
				}
			}else{ 
				include '../_assets/default.php'; // mengambil halaman default 
			}
		?>

      </div>

        <?php 
			include '../_assets/footer.php'; // mengambil halaman footer 
		?>

		      <!-- Bootstrap core JavaScript-->
  <!-- <script src="http://localhost/persediaan/assets/vendor/jquery/jquery.min.js"></script> -->
  <script src="http://localhost/persediaan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="http://localhost/persediaan/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="http://localhost/persediaan/assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="http://localhost/persediaan/assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="http://localhost/persediaan/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="http://localhost/persediaan/assets/js/demo/datatables-demo.js"></script>
  <script src="http://localhost/persediaan/assets/vendor/chart.js/Chart.min.js"></script>
  <!-- <script src="http://localhost/persediaan/assets/js/demo/chart-area-demo.js"></script> -->
  
</body>
</html>