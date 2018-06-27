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
<body onload="tampil()">

<!--Header-part-->
<div id="header">
  <h3 style="color: grey; padding: 10px 20px; font-family: Courier, monospace"> Tugas Praktikum Pemrograman Web - <b>Nur Ihsan</b></h3>
</div>
<!--close-Header-part--> 


<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a><ul>
    <li class="active"><a href="../index.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="../mahasiswa/tampilMahasiswa.php"><i class="icon icon-signal"></i> <span>Mahasiswa</span></a> </li>
    <li> <a href="tampilMk.php"><i class="icon icon-inbox"></i> <span>Matakuliah</span></a> </li>
    <li><a href="../dosen/tampilDosen.php"><i class="icon icon-th"></i> <span>Dosen</span></a></li>
    <li><a href="../tr/tampilTr.php"><i class="icon icon-list-alt"></i> <span>Transaksi</span></a></li> 
  </ul>
</div>
<div id="content">
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Matakuliah</a> </div>
    <h1>Matakuliah</h1>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Data Matakuliah</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>Jumlah SKS</th>
                  <th>Semester</th>
                  <th colspan="2">
                    <a href="tambahMk.php" class="btn btn-info"><i class="icon-plus"></i> Tambah</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include '../koneksi.php';

                  $sql = "SELECT * FROM tb_mk";
                  $data = $konek->query($sql);

                  while ($r = $data->fetch_array()) {
                ?>
                <tr class="gradeX">
                  <td><?php echo $r['kd_mk']; ?></td>
                  <td><?php echo $r['nama_mk']; ?></td>
                  <td><?php echo $r['sks']; ?></td>
                  <td><?php echo $r['semester']; ?></td>
                  <td style="text-align: center;">
                    <?php
                    echo "<a href='editMk.php?kd_mk=$r[kd_mk]' class='btn btn-warning'><i class='icon-edit'></i> Edit</a>";
                    ?>
                  </td>
                  <td style="text-align: center;">  
                    <?php
                    // echo "<a href='prosesHapus.php?kd_mk=$r[kd_mk]' class='btn btn-danger'><i class='icon-remove'></i> Hapus</a>";

                  echo '<button onClick="hapus(\''.$r['kd_mk'].'\')" class=\'btn btn-danger\'><i class=\'icon-remove\'></i> Hapus</button>';

                    ?>
                    
                  </td>
                  
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
  
      </div>
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
<div id="content">

</div>

<script type="text/javascript">
  function tampil()
    {
      $.ajax({
        type: "GET",
        url: "lihat-tampil.php",
        data: "",
        success: function(html){
          $("#content").html(html);
        }
      }
      );
    }

function hapus(kode) {
$.ajax({
      type: 'GET',
      url: 'prosesHapus.php',
      data: 'kd_mk='+kode,
      success: function(result) {
        tampil();
         }
      }
      );
    }
</script>
 

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
