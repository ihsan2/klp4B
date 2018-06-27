<?php
include '../koneksi.php';
// menyimpan data kedalam variabel

$id            	= $_POST['id'];
$nip           	= $_POST['nip'];
$nim        	= $_POST['nim'];
$kd_mk  		= $_POST['kd_mk'];


// query SQL untuk insert data
$query = "UPDATE tb_transaksi SET id='$id',nip='$nip',nim='$nim',kd_mk='$kd_mk' WHERE id='$id'";
$sql1 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE nim='$nim' AND nip='$nip'"));

	mysqli_query($konek, $query);
	header("location:tampilTr.php");

?>