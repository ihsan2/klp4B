<?php
include '../koneksi.php';

// menyimpan data kedalam variabel
$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$jk        		= $_POST['jk'];
$alamat         = $_POST['alamat'];

// query SQL untuk insert data
$query="INSERT INTO tb_dosen (nip, nama_dosen, jk, alamat) VALUES ('$nip', '$nama', '$jk', '$alamat')";

mysqli_query($konek, $query);
// mengalihkan ke halaman index.php
header("location:tampilDosen.php");
?>