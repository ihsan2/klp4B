<!DOCTYPE html>
<html lang="en">
<head>
<title>Tugas WEB</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/maruti-style.css" />
<link rel="stylesheet" href="../css/maruti-media.css" class="skin-color" />
</head>
<body>

<!--Header-part-->
<div id="header">
  <h3 style="color: grey; padding: 10px 20px; font-family: Courier, monospace"> Tugas Praktikum Pemrograman Web - <b>Nur Ihsan</b></h3>
</div>
<!--close-Header-part--> 


<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
    <li class="active"><a href="../index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="../mahasiswa/tampilMahasiswa.php"><i class="icon icon-signal"></i> <span>Mahasiswa</span></a> </li>
    <li> <a href="../mk/tampilMk.php"><i class="icon icon-inbox"></i> <span>Matakuliah</span></a> </li>
    <li><a href="../dosen/tampilDosen.php"><i class="icon icon-th"></i> <span>Dosen</span></a></li> 
    <li><a href="tampilTr.php"><i class="icon icon-list-alt"></i> <span>Transaksi</span></a></li>
  </ul>
</div>
<div id="content">
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaksi</a> <a href="#" class="current">Tambah Transaksi</a></div>
    <h1>Form Tambah Transaksi</h1>
  </div>  
  <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Tambah Data</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="prosesTambah.php" method="post" class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Id Transaksi :</label>
                <div class="controls">
                  <input type="text" name="id" class="span11" placeholder="Id Transaksi" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pilih Dosen :</label>
                <div class="controls">
                  <select name="nip" id="nip">
                      <?php             
                        include '../koneksi.php';

                        $sql = "SELECT * FROM tb_dosen";
                        $data = $konek->query($sql);

                        while ($r = $data->fetch_array()) {
                      ?>
                              <option value="<?php echo $r['nip']; ?>"><?php echo $r['nip'].' - '.$r['nama_dosen']; ?></option>
                              <?php
                                }
                              ?>
                  </select>
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Pilih Mahasiswa :</label>
                <div class="controls">
                  <select name="nim" id="nim">
                      <?php             
                        include '../koneksi.php';

                        $sql = "SELECT * FROM tb_mahasiswa";
                        $data = $konek->query($sql);

                        while ($r = $data->fetch_array()) {
                      ?>
                              <option value="<?php echo $r['nim']; ?>"><?php echo $r['nim'].' - '.$r['nama']; ?></option>
                              <?php
                                }
                              ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pilih Matakuliah :</label>
                <div class="controls">
                  <select name="kd_mk" id="kd_mk">
                      <?php             
                        include '../koneksi.php';

                        $sql = "SELECT * FROM tb_mk";
                        $data = $konek->query($sql);

                        while ($r = $data->fetch_array()) {
                      ?>
                              <option value="<?php echo $r['kd_mk']; ?>"><?php echo $r['kd_mk'].' - '.$r['nama_mk']; ?></option>
                              <?php
                                }
                              ?>
                  </select>
                </div>
              </div>
            
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="tampilTr.php" class="btn btn-danger">Kembali</a>
              </div>
            </form>
          </div>
        </div>
</div>
  

</div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"><a></a> </div>
</div>
<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/maruti.js"></script> 
<script src="../js/maruti.dashboard.js"></script> 
<script src="../js/maruti.chat.js"></script> 
 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
