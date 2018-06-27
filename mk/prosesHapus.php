<?php

include('../koneksi.php');  

$kd_mk = $_GET['kd_mk'];
$query = "DELETE FROM tb_mk WHERE kd_mk='$kd_mk'";
$sql1 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE kd_mk='$kd_mk'"));


if ($sql1 > 0) {
	echo '<script language="javascript">
              	alert ("Data tidak bisa dihapus karena data digunakan pada tabel transaksi");
              	window.location="tampilMk.php";
              </script>';
}
else {
	$hapus = mysqli_query($konek, $query);
	header('location:tampilMk.php');

}




?> 