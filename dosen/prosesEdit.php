<?php
include '../koneksi.php';
// menyimpan data kedalam variabel

$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$jk        		= $_POST['jk'];
$alamat         = $_POST['alamat'];

// query SQL untuk insert data
$query = "UPDATE tb_dosen SET nip='$nip',nama_dosen='$nama',jk='$jk',alamat='$alamat' WHERE nip='$nip'";


mysqli_query($konek, $query);

// mengalihkan ke halaman index.php
header("location:tampilDosen.php");
?>