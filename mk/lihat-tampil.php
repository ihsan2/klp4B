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
                    
                    <?php
                    // echo "<a href='prosesHapus.php?kd_mk=$r[kd_mk]' class='btn btn-danger'><i class='icon-remove'></i> Hapus</a>";

                  echo '<td style="text-align: center;"><a onClick="hapus(\''.$r['kd_mk'].'\')" class="btn btn-danger"><i class="icon-remove"></i> Hapus</button></td>';

                    ?>
                    
                
                  
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