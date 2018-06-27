<?php
include '../koneksi.php';
// menyimpan data kedalam variabel

$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jk        		= $_POST['jk'];
$angkatan  		= $_POST['angkatan'];
$alamat         = $_POST['alamat'];

// query SQL untuk insert data
$query = "UPDATE tb_mahasiswa SET nim='$nim',nama='$nama',jk='$jk',angkatan='$angkatan',alamat='$alamat' WHERE nim='$nim'";


mysqli_query($konek, $query);

// mengalihkan ke halaman index.php
header("location:tampilMahasiswa.php");
?>