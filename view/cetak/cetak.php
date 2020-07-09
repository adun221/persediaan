<?php 
if (isset($_POST['laporan'])=='') {

}elseif ($_POST['laporan']=='1') {
  require 'cbarangmasuk.php';
}elseif ($_POST['laporan']=='2') {
  require 'cbarangkeluar.php';
}elseif ($_POST['laporan']=='3') {
  require 'cstok_tersedia.php';
}
?>