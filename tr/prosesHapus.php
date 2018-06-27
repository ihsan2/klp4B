<?php

include('../koneksi.php');  

$id = $_GET['id'];
$hapus = mysqli_query($konek, "DELETE FROM tb_transaksi WHERE id='$id'");
header('location:tampilTr.php');


?> 