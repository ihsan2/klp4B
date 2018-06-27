<?php
include '../koneksi.php';

// menyimpan data kedalam variabel
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jk        		= $_POST['jk'];
$angkatan  		= $_POST['angkatan'];
$alamat         = $_POST['alamat'];

// query SQL untuk insert data
$query="INSERT INTO tb_mahasiswa (nim, nama, jk, angkatan, alamat) VALUES ('$nim', '$nama', '$jk', '$angkatan', '$alamat')";

mysqli_query($konek, $query);
// mengalihkan ke halaman index.php
header("location:tampilMahasiswa.php");
?>