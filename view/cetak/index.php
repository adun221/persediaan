<?php 
if (isset($_GET['l'])=='') {

}elseif ($_GET['l']=='1') {
	require 'rbarangmasuk.php';
}elseif ($_GET['l']=='2') {
	require 'rbarangkeluar.php';
}elseif ($_GET['l']=='3') {
	require 'rstok_tersedia.php';
}
?>