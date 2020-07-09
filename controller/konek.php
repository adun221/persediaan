<?php 
	$koneksi = mysqli_connect("localhost","root","","persediaan");// ("nama host", "user mysql" , "pass mysql", "nama database")

	if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
	}
	?>