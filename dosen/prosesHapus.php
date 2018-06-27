<?php

include('../koneksi.php');  

$nip = $_GET['nip'];
$query = "DELETE FROM tb_dosen WHERE nip='$nip'";
$sql1 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE nip='$nip'"));


if ($sql1 > 0) {
	echo '<script language="javascript">
              	alert ("Data tidak bisa dihapus karena data digunakan pada tabel transaksi");
              	window.location="tampilDosen.php";
              </script>';
}
else {
	$hapus = mysqli_query($konek, $query);
	header('location:tampilDosen.php');

}




?> 