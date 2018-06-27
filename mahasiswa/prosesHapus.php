<?php

include('../koneksi.php');  

$nim = $_GET['nim'];
$query = "DELETE FROM tb_mahasiswa WHERE nim='$nim'";
$sql1 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE nim='$nim'"));


if ($sql1 > 0) {
	echo '<script language="javascript">
              	alert ("Data tidak bisa dihapus karena data digunakan pada tabel transaksi");
              	window.location="tampilMahasiswa.php";
              </script>';
}
else {
	$hapus = mysqli_query($konek, $query);
	header('location:tampilMahasiswa.php');

}




?> 