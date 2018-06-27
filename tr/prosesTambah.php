<?php
include '../koneksi.php';

// menyimpan data kedalam variabel
$id            	= $_POST['id'];
$nip           	= $_POST['nip'];
$nim        	= $_POST['nim'];
$kd_mk  		= $_POST['kd_mk'];


// query SQL untuk insert data
$query="INSERT INTO tb_transaksi (id, nip, nim, kd_mk) VALUES ('$id', '$nip', '$nim', '$kd_mk')";

$sql1 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE nim='$nim' AND nip='$nip' AND kd_mk='$kd_mk'"));


if ( ($sql1 > 0)) {
		echo '<script language="javascript">
              	alert ("Sudah Ada Data Yang Sama... Silahkan Input Ulang");
              	window.location="tambahTr.php";
              </script>';
	}
	else {
	mysqli_query($konek, $query);
	header("location:tampilTR.php");
}





?>