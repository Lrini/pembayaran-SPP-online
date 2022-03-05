<?php
session_start ();
if(!isset($_SESSION['user'])){
  ?>
  <script type="text/javascript">
    alert('login dulu');window.location='../login.php';
  </script>
  <?php
}else{
include "header.php";
include "function.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Transaksi</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
          <form action="" method="get" enctype="multipart/form-data">
            <div class="form-group">
                <label>Dari Tanggal</label>
                <input type="date" name="daritanggal" autofocus="" required="" />
            </div>
            <div class="form-group">
                    <label>Sampai Tanggal</label>
                 <input type="date" name="sampaitanggal" required=""/>
            </div>
            <input type="submit" class="btn-primary" name="cari" value="cari">
          </form>
          <?php 
              if(isset($_GET['cari'])){
                  $tanggal1 = $_GET['daritanggal'];
                  $tanggal2 = $_GET['sampaitanggal'];
                 
                  echo '<br><a href ="cetaklaporan3.php?tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'"><i class="btn btn-primary btn-sm">Cetak</i></a>';
              }
          ?>
        </div>
        <?php 
          $koneksi = mysqli_connect("localhost","root","","sekolah");
           if(isset($_GET['cari'])){
            $tanggal1 = $_GET['daritanggal'];
            $tanggal2 = $_GET['sampaitanggal'];
              $data = mysqli_query($koneksi,"select spp.nis, siswa.nama,spp.tgl_bayar from siswa inner join spp on siswa.nis = spp.nis where spp.tgl_bayar between '$tanggal1' and '$tanggal2'"); 
      ?>
        <table id="dataTables" class="table table-bordered table-striped" >
                              <thead>
                                  <tr>
                                      <th>NO </th>
                                      <th>NIS</th>
                                      <th>Nama</th>
                                      <th>Tanggal bayar</th>
                                     
                                     
                                  </tr>
                              </thead>
                          
                          <tbody>
                            <?php
                            $conn = new mysqli("localhost", "root", "", "sekolah");
                            if ($conn->connect_errno) {
                              echo "Failed to connect to MySQL: " . $conn->connect_error;
                            }
                            
                            $no = 1;
                            $data = "select spp.nis, siswa.nama,spp.tgl_bayar from siswa inner join spp on siswa.nis = spp.nis where spp.tgl_bayar between '$tanggal1' and '$tanggal2'";
                            $res = $conn->query($data);
                            while($row = $res->fetch_assoc()){
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$row['nis'].'</td>
                                <td>'.$row['nama'].'</td>
                                <td>'.$row['tgl_bayar'].'</td>
                                
                               
                                
                              </tr>
                              ';
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
      <?php
           }
      ?>
          </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php
include "footer.php";
}
?>
