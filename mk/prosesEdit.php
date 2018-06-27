<?php
include '../koneksi.php';
// menyimpan data kedalam variabel

$kd_mk            	= $_POST['kd_mk'];
$nama_mk           	= $_POST['nama_mk'];
$sks        		= $_POST['sks'];
$semester  			= $_POST['semester'];


// query SQL untuk insert data
$query = "UPDATE tb_mk SET kd_mk='$kd_mk',nama_mk='$nama_mk',sks='$sks',semester='$semester' WHERE kd_mk='$kd_mk'";


mysqli_query($konek, $query);

// mengalihkan ke halaman index.php
header("location:tampilMk.php");
?>